@extends('layouts.admin')
@section('title','Commentaires')
@section('page-title','Modération des commentaires')

@section('content')
<div id="toastMsg" class="hidden fixed top-4 right-4 z-50 px-4 py-3 rounded-xl text-sm font-semibold shadow-lg text-white transition-all" style="background:#0d9488"></div>

<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-50">
        <div class="flex gap-2">
            <button onclick="filterComments('all')" id="tab-all"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition healing-gradient text-white">
                Tous (<span id="count-all">{{ $comments->total() }}</span>)
            </button>
            <button onclick="filterComments('pending')" id="tab-pending"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition bg-gray-100 text-gray-600 hover:bg-gray-200">
                En attente (<span id="count-pending">{{ \App\Models\Comment::where('approved',false)->count() }}</span>)
            </button>
            <button onclick="filterComments('approved')" id="tab-approved"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition bg-gray-100 text-gray-600 hover:bg-gray-200">
                Approuvés (<span id="count-approved">{{ \App\Models\Comment::where('approved',true)->count() }}</span>)
            </button>
        </div>
    </div>

    <div id="commentsList" class="divide-y divide-gray-50">
        @forelse($comments as $comment)
        <div class="comment-row px-6 py-5 hover:bg-gray-50/50 transition {{ !$comment->approved ? 'border-l-4 border-amber-400' : '' }}"
             data-id="{{ $comment->id }}" data-approved="{{ $comment->approved ? '1' : '0' }}">
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
                        <span class="status-badge px-2 py-0.5 rounded-full text-xs font-semibold
                            {{ $comment->approved ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                            {{ $comment->approved ? 'Approuve' : 'En attente' }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $comment->body }}</p>
                    @if($comment->article)
                    <p class="text-xs text-gray-400 mt-2">
                        Sur : <a href="{{ route('blog.show', $comment->article->slug) }}" target="_blank"
                           class="text-primary hover:underline">{{ $comment->article->title }}</a>
                    </p>
                    @endif
                </div>
                <div class="flex gap-2 shrink-0">
                    <button onclick="toggleApprove({{ $comment->id }}, this)"
                        class="approve-btn h-8 px-2 sm:px-3 rounded-lg text-xs font-semibold transition inline-flex items-center gap-1
                        {{ !$comment->approved ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        <i data-lucide="{{ !$comment->approved ? 'check' : 'eye-off' }}" class="h-3 w-3 shrink-0"></i>
                        <span class="hidden sm:inline">{{ !$comment->approved ? 'Approuver' : 'Désapprouver' }}</span>
                    </button>
                    <button onclick="deleteComment({{ $comment->id }}, this)"
                        class="h-8 w-8 rounded-lg bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100 transition inline-flex items-center justify-center">
                        <i data-lucide="trash-2" class="h-3 w-3"></i>
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="px-6 py-16 text-center">
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

<script>
const CSRF = '{{ csrf_token() }}';
let currentFilter = 'all';

function toast(msg, ok = true) {
    const el = document.getElementById('toastMsg');
    el.textContent = msg;
    el.style.background = ok ? '#0d9488' : '#ef4444';
    el.classList.remove('hidden');
    setTimeout(() => el.classList.add('hidden'), 3000);
}

async function toggleApprove(id, btn) {
    btn.disabled = true;
    const row = btn.closest('.comment-row');
    const res = await fetch(`/admin/comments/${id}/approve`, {
        method: 'PATCH',
        headers: {'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'}
    });
    if (!res.ok) { btn.disabled = false; return; }
    const data = await res.json();
    const approved = data.approved;

    // Update row
    row.dataset.approved = approved ? '1' : '0';
    row.classList.toggle('border-l-4', !approved);
    row.classList.toggle('border-amber-400', !approved);

    // Update badge
    const badge = row.querySelector('.status-badge');
    badge.textContent = approved ? 'Approuve' : 'En attente';
    badge.className = 'status-badge px-2 py-0.5 rounded-full text-xs font-semibold ' +
        (approved ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700');

    // Update button
    btn.className = 'approve-btn px-3 py-1.5 rounded-lg text-xs font-semibold transition inline-flex items-center gap-1 ' +
        (approved ? 'bg-gray-100 text-gray-600 hover:bg-gray-200' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100');
    btn.innerHTML = `<i data-lucide="${approved ? 'eye-off' : 'check'}" class="h-3 w-3"></i> ${approved ? 'Desapprouver' : 'Approuver'}`;
    if (typeof lucide !== 'undefined') lucide.createIcons();
    btn.disabled = false;

    updateCounts();
    filterComments(currentFilter);
    toast(approved ? 'Commentaire approuve.' : 'Commentaire retire.');
}

async function deleteComment(id, btn) {
    const row = btn.closest('.comment-row');
    showConfirm('Supprimer ce commentaire ?', 'Cette action est irreversible.', async () => {
        btn.disabled = true;
        const res = await fetch(`/admin/comments/${id}`, {
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json'}
        });
        if (!res.ok) { btn.disabled = false; return; }
        row.style.opacity = '0';
        row.style.transition = 'opacity .3s';
        setTimeout(() => { row.remove(); updateCounts(); filterComments(currentFilter); }, 300);
        toast('Commentaire supprime.');
    });
}

function updateCounts() {
    const rows = document.querySelectorAll('.comment-row');
    const pending = [...rows].filter(r => r.dataset.approved === '0').length;
    const approved = [...rows].filter(r => r.dataset.approved === '1').length;
    document.getElementById('count-all').textContent = rows.length;
    document.getElementById('count-pending').textContent = pending;
    document.getElementById('count-approved').textContent = approved;
}

function filterComments(filter) {
    currentFilter = filter;
    document.querySelectorAll('[id^="tab-"]').forEach(t => {
        t.className = 'px-4 py-2 rounded-xl text-sm font-semibold transition bg-gray-100 text-gray-600 hover:bg-gray-200';
    });
    document.getElementById('tab-' + filter).className = 'px-4 py-2 rounded-xl text-sm font-semibold transition healing-gradient text-white';

    document.querySelectorAll('.comment-row').forEach(row => {
        if (filter === 'all') row.style.display = '';
        else if (filter === 'pending') row.style.display = row.dataset.approved === '0' ? '' : 'none';
        else if (filter === 'approved') row.style.display = row.dataset.approved === '1' ? '' : 'none';
    });
}
</script>
@endsection
