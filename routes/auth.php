<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate(['email'=>'required|email','password'=>'required']);
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }
            return redirect()->intended(route('home'));
        }
        return back()->withErrors(['email' => 'Identifiants incorrects.'])->onlyInput('email');
    })->name('login.store');

    // Mot de passe oublié
    Route::get('/forgot-password', fn() => view('auth.forgot-password'))->name('password.request');
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    // Réinitialisation
    Route::get('/reset-password/{token}', function (string $token, Request $request) {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    })->name('password.reset');
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset($request->only('email','password','password_confirmation','token'),
            function ($user, $password) {
                $user->forceFill(['password' => bcrypt($password)])
                     ->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    })->name('password.update');

    // Inscription utilisateur
    Route::get('/inscription', fn() => view('auth.register'))->name('register');

    // Étape 1 : envoyer OTP de vérification email
    Route::post('/inscription/send-otp', function (Request $request) {
        $data = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        ]);
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $key = 'register_otp_' . md5($data['email']);
        \Illuminate\Support\Facades\Cache::put($key, [
            'otp'      => $otp,
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ], now()->addMinutes(10));
        \Illuminate\Support\Facades\Mail::to($data['email'])->send(new \App\Mail\CommentOtpMail($otp, $data['name']));
        return response()->json(['sent' => true]);
    })->name('register.send-otp');

    // Étape 2 : valider OTP et créer le compte
    Route::post('/inscription', function (Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|string|size:6',
        ]);
        $key = 'register_otp_' . md5($data['email']);
        $cached = \Illuminate\Support\Facades\Cache::get($key);
        if (!$cached || $cached['otp'] !== $data['otp']) {
            return response()->json(['message' => 'Code incorrect ou expiré.'], 422);
        }
        if (\App\Models\User::where('email', $cached['email'])->exists()) {
            return response()->json(['message' => 'Cette adresse e-mail est déjà utilisée.'], 422);
        }
        \Illuminate\Support\Facades\Cache::forget($key);
        $user = \App\Models\User::create([
            'name'     => $cached['name'],
            'email'    => $cached['email'],
            'password' => $cached['password'],
            'role'     => 'user',
        ]);
        Auth::login($user);
        return response()->json(['ok' => true]);
    })->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});
