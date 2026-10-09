<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update($request->only('name', 'email'));
        return back()->with('success', 'Profil mis à jour.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => ['required', 'confirmed', Password::min(8)],
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mot de passe actuel incorrect.'])->withFragment('password');
        }

        Auth::user()->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Mot de passe mis à jour.')->withFragment('password');
    }
}
