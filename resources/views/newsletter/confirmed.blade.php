@extends('layouts.app')

@section('title', 'Abonnement confirmé – Comclusives')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-4">
    <div class="text-center max-w-md">
        <div style="height:6px;width:60px;border-radius:3px;background:#0d9488;margin:0 auto 32px;"></div>
        <h1 class="text-3xl font-bold mb-3">Abonnement confirmé</h1>
        <p class="text-gray-500 mb-8">Vous recevrez nos prochains articles directement dans votre boîte mail.</p>
        <a href="{{ route('blog.index') }}" class="btn-primary px-8 py-3 text-sm font-semibold">Lire le blog</a>
    </div>
</div>
@endsection
