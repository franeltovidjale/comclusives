<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Connexion – Comclusives Admin</title>
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #0f1923 0%, #0a6b63 100%); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-sm">

        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 justify-center">
                <img src="{{ asset('images/logo-icon.png') }}" alt="Comclusives" class="h-12 w-12 rounded-2xl object-cover shadow-lg">
                <span class="text-2xl font-bold text-white tracking-tight" style="font-family:Outfit,sans-serif">Com<span style="color:#14b89e">clusives</span></span>
            </a>
            <p class="text-white/60 text-sm mt-3">Espace d'administration</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <h1 class="text-xl font-bold mb-1" style="font-family:Outfit,sans-serif">Connexion</h1>
            <p class="text-sm text-gray-500 mb-6">Accédez à votre tableau de bord</p>

            @if($errors->any())
            <div class="mb-5 p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-sm flex items-center gap-2">
                <span>⚠</span> {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">Adresse e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition"
                        placeholder="admin@comclusives.com">
                </div>
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-sm font-semibold text-gray-700">Mot de passe</label>
                        <a href="{{ route('password.request') }}" class="text-xs text-primary hover:underline">Mot de passe oublié ?</a>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition pr-11"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePwd()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="rounded text-primary w-4 h-4">
                    <label for="remember" class="text-sm text-gray-600">Se souvenir de moi</label>
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-sm hover:opacity-90 active:scale-95 transition healing-gradient shadow-sm">
                    Se connecter →
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-white/40 mt-6">
            <a href="{{ route('home') }}" class="hover:text-white transition">← Retour au site</a>
        </p>
    </div>
    <script>
        function togglePwd() {
            const i = document.getElementById('passwordInput');
            i.type = i.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
