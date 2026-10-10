@extends('layouts.app')
@section('title', 'Hors ligne')
@section('content')
<div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-4">
    <div class="w-20 h-20 rounded-full flex items-center justify-center mb-6" style="background:#e6f4f3">
        <svg class="w-10 h-10" style="color:#0a6b63" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636a9 9 0 010 12.728M5.636 5.636a9 9 0 000 12.728M12 12h.01M8.464 8.464a5 5 0 000 7.072M15.536 8.464a5 5 0 010 7.072"/>
        </svg>
    </div>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Vous êtes hors ligne</h1>
    <p class="text-gray-500 max-w-md mb-8">Vérifiez votre connexion internet et réessayez. Les pages déjà visitées sont disponibles en cache.</p>
    <a href="/" onclick="location.reload()" class="px-6 py-3 rounded-xl text-white font-semibold healing-gradient hover:opacity-90 transition">
        Réessayer
    </a>
</div>
@endsection
