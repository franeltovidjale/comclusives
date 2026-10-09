@extends('layouts.admin')
@section('title','Commentaires')
@section('page-title','Modération des commentaires')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
        <div class="flex gap-2">
            <a href="{{ request()->is('*') && !request('status') ? '#' : route('admin.comments.index') }}"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition
               {{ !request('status') ? 'healing-gradient text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                Tous ({{ $comments->total() }})
            </a>
            <a href="{{ route('admin.comments.index', ['status'=>'pending']) }}"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition
               {{ request('status')==='pending' ? 'healing-gradient text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                En attente ({{ \App\Models\Comment::where('approved',false)->count() }})
            </a>
            <a href="{{ route('admin.comments.index', ['status'=>'approved']) }}"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition
               {{ request('status')==='approved' ? 'healing-gradient text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                Approuvés
            </a>
        </div>
    </div>

    <div class="divide-y divide-gray-50">
        @forelse($comments as $comment)
        <div class="px-6 py-5 hover:bg-gray-50/50 transition {{ !$comment->approved ? 'border-l-4 border-amber-400' : '' }}">
            <div class="flex items-start gap-4">
                <div class="h-10 w-10 rounded-full healing-gradient flex items-center justify-center text-white font-bold text-sm shrink-0">
                    {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex flex-wrap items-center gap-2 mb-1">
                        <span class="font-semibold text-sm text-gray-900">{{ $comment->author_name }}</span>
                        @if($comment->author_email)
                        <span class="text-xs text-gray-400">{{ $comment->author_email }}</span>
                        @endif
                        <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold
                            {{ $comment->approved ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                            {{ $comment->approved ? 'Approuvé' : 'En attente' }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $comment->body }}</p>
                    @if($comment->article)
                    <p class="text-xs text-gray-400 mt-2">
                        Sur :
                        <a href="{{ route('blog.show', $comment->article->slug) }}" target="_blank"
                           class="text-primary hover:underline">
                            {{ $comment->article->title }}
                        </a>
                    </p>
                    @endif
                </div>
                <div class="flex gap-2 shrink-0">
                    @if(!$comment->approved)
                    <form method="POST" action="{{ route('admin.comments.approve', $comment) }}">
                        @csrf @method('PATCH')
                        <button class="px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-semibold hover:bg-emerald-100 transition inline-flex items-center gap-1">
                            <i data-lucide="check" class="h-3 w-3"></i> Approuver
                        </button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.comments.approve', $comment) }}">
                        @csrf @method('PATCH')
                        <button class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 text-xs font-semibold hover:bg-gray-200 transition inline-flex items-center gap-1">
                            <i data-lucide="eye-off" class="h-3 w-3"></i> Désapprouver
                        </button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}"
                          onsubmit="return confirm('Supprimer ce commentaire ?')">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100 transition inline-flex items-center gap-1">
                            <i data-lucide="trash-2" class="h-3 w-3"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="px-6 py-16 text-center">
            <i data-lucide="message-square" class="h-10 w-10 mx-auto mb-3 text-gray-200"></i>
            <p class="text-gray-400 text-sm">Aucun commentaire</p>
        </div>
        @endforelse
    </div>

    @if($comments->hasPages())
    <div class="px-6 py-4 border-t border-gray-50">
        {{ $comments->links() }}
    </div>
    @endif
</div>
@endsection
