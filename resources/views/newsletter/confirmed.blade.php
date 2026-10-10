@extends('layouts.app')

@section('title', 'Abonnement confirmé – Comclusives')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center px-4 mt-20">
    <div class="text-center max-w-md">
        <h1 class="text-3xl font-bold mb-3">Abonnement confirmé</h1>
        <p class="text-gray-500 mb-8">Vous recevrez nos prochains articles directement dans votre boîte mail.</p>
        <a href="{{ route('blog.index') }}" class="btn-primary px-8 py-3 text-sm font-semibold">Lire le blog</a>
    </div>
</div>
@endsection
