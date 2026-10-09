@extends('layouts.admin')
@section('title','Mon profil')
@section('page-title','Mon profil')
@section('content')

<div class="max-w-2xl mx-auto space-y-6">

    {{-- Avatar + nom --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 flex items-center gap-5">
        <div class="h-16 w-16 rounded-2xl healing-gradient flex items-center justify-center text-white text-2xl font-bold shrink-0" style="font-family:Outfit,sans-serif">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <p class="text-lg font-bold" style="font-family:Outfit,sans-serif">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
            <span class="inline-flex items-center gap-1 mt-1 text-xs px-2 py-0.5 rounded-full bg-green-100 text-green-700 font-semibold">
                <i data-lucide="shield-check" class="h-3 w-3"></i> Administrateur
            </span>
        </div>
    </div>

    @if(session('success'))
    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-2">
        <i data-lucide="check-circle" class="h-4 w-4 shrink-0"></i> {{ session('success') }}
    </div>
    @endif

    {{-- Infos générales --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h2 class="text-base font-bold mb-5 flex items-center gap-2" style="font-family:Outfit,sans-serif">
            <i data-lucide="user" class="h-4 w-4 text-primary"></i> Informations générales
        </h2>
        <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-4">
            @csrf @method('PATCH')
            <div>
                <label class="block text-sm font-semibold mb-1.5 text-gray-700">Nom complet</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition">
                @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5 text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition">
                @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition">
                    <i data-lucide="save" class="h-4 w-4"></i> Enregistrer
                </button>
            </div>
        </form>
    </div>

    {{-- Mot de passe --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6" id="password">
        <h2 class="text-base font-bold mb-5 flex items-center gap-2" style="font-family:Outfit,sans-serif">
            <i data-lucide="lock" class="h-4 w-4 text-primary"></i> Changer le mot de passe
        </h2>
        <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-4">
            @csrf @method('PATCH')
            <div>
                <label class="block text-sm font-semibold mb-1.5 text-gray-700">Mot de passe actuel</label>
                <div class="relative">
                    <input type="password" name="current_password" id="cp" required
                        class="w-full px-4 py-2.5 pr-10 rounded-xl border {{ $errors->has('current_password') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition">
                    <button type="button" onclick="tog('cp')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i data-lucide="eye" class="h-4 w-4"></i>
                    </button>
                </div>
                @error('current_password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5 text-gray-700">Nouveau mot de passe</label>
                <div class="relative">
                    <input type="password" name="password" id="np" required minlength="8"
                        class="w-full px-4 py-2.5 pr-10 rounded-xl border {{ $errors->has('password') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition"
                        placeholder="Min. 8 caractères">
                    <button type="button" onclick="tog('np')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i data-lucide="eye" class="h-4 w-4"></i>
                    </button>
                </div>
                @error('password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1.5 text-gray-700">Confirmer le mot de passe</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" id="npc" required minlength="8"
                        class="w-full px-4 py-2.5 pr-10 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition">
                    <button type="button" onclick="tog('npc')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i data-lucide="eye" class="h-4 w-4"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition">
                    <i data-lucide="lock" class="h-4 w-4"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>

</div>

@push('scripts')
<script>
function tog(id) {
    const el = document.getElementById(id);
    el.type = el.type === 'password' ? 'text' : 'password';
}
</script>
@endpush
@endsection
