@extends('layouts.app')

@section('title', 'Abonnement confirmé – Comclusives')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-4">
    <div class="text-center max-w-md">
        <div style="height:80px;width:80px;border-radius:50%;background:#e6f7f5;display:inline-flex;align-items:center;justify-content:center;margin-bottom:24px;">
            <svg style="height:40px;width:40px;color:#0d9488" fill="none" stroke="#0d9488" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h1 class="text-3xl font-bold mb-3">Abonnement confirmé</h1>
        <p class="text-gray-500 mb-8">Vous recevrez nos prochains articles directement dans votre boîte mail.</p>
        <a href="{{ route('blog.index') }}" class="btn-primary px-8 py-3 text-sm font-semibold">Lire le blog</a>
    </div>
</div>
@endsection
