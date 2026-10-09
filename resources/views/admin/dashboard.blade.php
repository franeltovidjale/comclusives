@extends('layouts.admin')
@section('title','Tableau de bord')
@section('page-title','Tableau de bord')

@section('topbar-actions')
<a href="{{ route('admin.articles.create') }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-white text-sm font-semibold healing-gradient hover:opacity-90 transition shadow-sm">
    <i data-lucide="plus" class="h-4 w-4"></i> Nouvel article
</a>
@endsection

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

    <div class="stat-card">
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-gray-500 font-medium">Articles publiés</span>
            <span class="h-9 w-9 rounded-xl flex items-center justify-center" style="background:rgba(10,107,99,.08)">
                <i data-lucide="file-check" class="h-4 w-4" style="color:#0a6b63"></i>
            </span>
        </div>
        <p class="text-3xl font-bold" style="font-family:Outfit,sans-serif;color:#0a6b63">{{ $stats['published'] }}</p>
        <p class="text-xs text-gray-400 mt-1">articles en ligne</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-gray-500 font-medium">Brouillons</span>
            <span class="h-9 w-9 rounded-xl flex items-center justify-center" style="background:rgba(10,107,99,.08)">
                <i data-lucide="file-edit" class="h-4 w-4" style="color:#0a6b63"></i>
            </span>
        </div>
        <p class="text-3xl font-bold" style="font-family:Outfit,sans-serif;color:#0a6b63">{{ $stats['drafts'] }}</p>
        <p class="text-xs text-gray-400 mt-1">en cours de rédaction</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-gray-500 font-medium">Commentaires</span>
            <span class="h-9 w-9 rounded-xl flex items-center justify-center" style="background:rgba(10,107,99,.08)">
                <i data-lucide="message-square" class="h-4 w-4" style="color:#0a6b63"></i>
            </span>
        </div>
        <p class="text-3xl font-bold" style="font-family:Outfit,sans-serif;color:#0a6b63">{{ $stats['pending_comments'] }}</p>
        <p class="text-xs text-gray-400 mt-1">en attente de modération</p>
    </div>

    <div class="stat-card">
        <div class="flex items-center justify-between mb-4">
            <span class="text-sm text-gray-500 font-medium">Abonnés newsletter</span>
            <span class="h-9 w-9 rounded-xl flex items-center justify-center" style="background:rgba(10,107,99,.08)">
                <i data-lucide="users" class="h-4 w-4" style="color:#0a6b63"></i>
            </span>
        </div>
        <p class="text-3xl font-bold" style="font-family:Outfit,sans-serif;color:#0a6b63">{{ $stats['subscribers'] }}</p>
        <p class="text-xs text-gray-400 mt-1">confirmés</p>
    </div>

</div>

{{-- Vues totales --}}
<div class="stat-card mb-6 flex items-center gap-5">
    <div class="h-13 w-13 rounded-2xl healing-gradient flex items-center justify-center shrink-0 p-3">
        <i data-lucide="eye" class="h-5 w-5 text-white"></i>
    </div>
    <div>
        <p class="text-sm text-gray-500 font-medium">Vues totales</p>
        <p class="text-3xl font-bold" style="font-family:Outfit,sans-serif;color:#0a6b63">{{ number_format($stats['total_views']) }}</p>
    </div>
    <div class="ml-auto text-right hidden sm:block">
        <p class="text-xs text-gray-400">Mis à jour en temps réel</p>
        <p class="text-xs text-gray-300">{{ now()->format('d/m/Y H:i') }}</p>
    </div>
</div>

{{-- Articles récents + Commentaires --}}
<div class="grid lg:grid-cols-2 gap-6">

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
            <h2 class="font-bold text-base" style="font-family:Outfit,sans-serif">Articles récents</h2>
            <a href="{{ route('admin.articles.create') }}"
               class="text-xs font-semibold px-3 py-1.5 rounded-lg text-white healing-gradient hover:opacity-90 transition inline-flex items-center gap-1">
                <i data-lucide="plus" class="h-3 w-3"></i> Nouvel article
            </a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentArticles as $article)
            <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50/50 transition">
                @if($article->cover_image)
                <img src="{{ $article->cover_url }}" alt="" class="h-12 w-12 rounded-xl object-cover shrink-0">
                @else
                <div class="h-12 w-12 rounded-xl healing-gradient flex items-center justify-center shrink-0">
                    <i data-lucide="image" class="h-5 w-5 text-white"></i>
                </div>
                @endif
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-semibold truncate">{{ $article->title }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">{{ $article->created_at->diffForHumans() }}</p>
                </div>
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold shrink-0
                    {{ $article->status === 'published' ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $article->status === 'published' ? 'Publié' : 'Brouillon' }}
                </span>
            </div>
            @empty
            <div class="px-6 py-10 text-center">
                <i data-lucide="file-plus" class="h-8 w-8 mx-auto mb-2 text-gray-200"></i>
                <p class="text-sm text-gray-400">Aucun article pour l'instant</p>
                <a href="{{ route('admin.articles.create') }}" class="text-sm font-medium mt-1 inline-block" style="color:#0a6b63">Créer le premier</a>
            </div>
            @endforelse
        </div>
        @if($recentArticles->count())
        <div class="px-6 py-3 border-t border-gray-50">
            <a href="{{ route('admin.articles.index') }}" class="text-xs font-semibold hover:underline" style="color:#0a6b63">Voir tous les articles</a>
        </div>
        @endif
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
            <h2 class="font-bold text-base" style="font-family:Outfit,sans-serif">Commentaires à modérer</h2>
            <a href="{{ route('admin.comments.index') }}" class="text-xs font-semibold hover:underline" style="color:#0a6b63">Voir tout</a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($pendingComments as $comment)
            <div class="px-6 py-4">
                <div class="flex items-start gap-3">
                    <div class="h-8 w-8 rounded-full healing-gradient flex items-center justify-center text-white text-xs font-bold shrink-0">
                        {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-semibold">{{ $comment->author_name }}</span>
                            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-gray-600 line-clamp-2">{{ $comment->body }}</p>
                        <p class="text-xs text-gray-400 mt-1">Sur : {{ $comment->article->title ?? '-' }}</p>
                    </div>
                </div>
                <div class="flex gap-2 mt-3 ml-11">
                    <form method="POST" action="{{ route('admin.comments.approve', $comment) }}">
                        @csrf @method('PATCH')
                        <button class="px-3 py-1 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-semibold hover:bg-emerald-100 transition">
                            Approuver
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 rounded-lg bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100 transition">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="px-6 py-10 text-center">
                <i data-lucide="check-circle" class="h-8 w-8 mx-auto mb-2 text-gray-200"></i>
                <p class="text-sm text-gray-400">Aucun commentaire en attente</p>
            </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
