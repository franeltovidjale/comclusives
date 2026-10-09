<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mot de passe oublié – Comclusives Admin</title>
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <div class="flex items-center justify-center w-14 h-14 rounded-2xl healing-gradient mx-auto mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <h1 class="text-xl font-bold mb-1 text-center" style="font-family:Outfit,sans-serif">Mot de passe oublié</h1>
            <p class="text-sm text-gray-500 mb-6 text-center">Entrez votre e-mail, nous vous enverrons un lien de réinitialisation.</p>

            @if(session('status'))
            <div class="mb-5 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-2">
                <span>✓</span> {{ session('status') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-5 p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-sm flex items-center gap-2">
                <span>⚠</span> {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2 text-gray-700">Adresse e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition"
                        placeholder="admin@comclusives.com">
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-xl text-white font-semibold text-sm hover:opacity-90 active:scale-95 transition healing-gradient shadow-sm">
                    Envoyer le lien →
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-white/40 mt-6">
            <a href="{{ route('login') }}" class="hover:text-white transition">← Retour à la connexion</a>
        </p>
    </div>
</body>
</html>
