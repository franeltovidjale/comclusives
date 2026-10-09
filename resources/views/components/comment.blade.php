@php
$colors = ['#0d9488','#6366f1','#f59e0b','#ec4899','#10b981'];
$h = 0; foreach(str_split($comment->author_name) as $c) $h = ($h*31+ord($c)) % count($colors);
$color = $colors[$h];
$initials = strtoupper(implode('', array_map(fn($w) => $w[0], array_slice(explode(' ', $comment->author_name), 0, 2))));
@endphp
<div class="flex gap-3 py-3 border-b border-border/50">
    <div class="h-9 w-9 rounded-full shrink-0 flex items-center justify-center text-white font-bold text-sm" style="background:{{ $color }}">{{ $initials }}</div>
    <div class="flex-1 min-w-0">
        <div class="flex items-baseline gap-2 mb-1">
            <span class="font-semibold text-sm">{{ $comment->author_name }}</span>
            <span class="text-xs text-muted-foreground">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-sm text-foreground/80 leading-relaxed">{{ $comment->body }}</p>
        <div class="flex items-center gap-1 mt-2 -ml-1.5">
            <button class="like-btn flex items-center gap-1 px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition" data-id="{{ $comment->id }}" data-count="{{ $comment->likes }}">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z"/><path d="M7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"/></svg>
                <span>{{ $comment->likes ?: '' }}</span>
            </button>
            <button class="dislike-btn flex items-center px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 15v4a3 3 0 003 3l4-9V2H5.72a2 2 0 00-2 1.7l-1.38 9a2 2 0 002 2.3H10z"/><path d="M17 2h2.67A2.31 2.31 0 0122 4v7a2.31 2.31 0 01-2.33 2H17"/></svg>
            </button>
            <button class="reply-btn px-2 py-1 rounded-full text-xs font-semibold text-muted-foreground hover:bg-soft hover:text-primary transition ml-1">RÉPONDRE</button>
        </div>
        @foreach($comment->replies as $reply)
        <div class="mt-3 pl-4 border-l-2 border-border/40">
            @include('components.comment', ['comment' => $reply])
        </div>
        @endforeach
    </div>
</div>
