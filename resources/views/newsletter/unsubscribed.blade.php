@extends('layouts.app')

@section('title', 'Désabonnement – Comclusives')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-4 mt-20">
    <div class="text-center max-w-md">
        <div class="h-20 w-20 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-6">
            <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <h1 class="text-3xl font-bold mb-3">Vous êtes désabonné</h1>
        <p class="text-gray-500 mb-8">Vous ne recevrez plus nos emails. Vous pouvez vous réabonner à tout moment depuis le site.</p>
        <a href="{{ route('home') }}" class="btn-primary px-8 py-3 text-sm font-semibold">Retour à l'accueil</a>
    </div>
</div>
@endsection
