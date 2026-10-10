@extends('layouts.admin')
@section('title', 'Catégories')

@section('content')
<div class="p-6 max-w-2xl">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-bold" style="font-family:Outfit,sans-serif">Catégories</h1>
        <button onclick="document.getElementById('newCatBox').classList.toggle('hidden')"
                class="btn-primary text-sm px-4 py-2">+ Nouvelle</button>
    </div>

    {{-- Formulaire création --}}
    <div id="newCatBox" class="hidden bg-white rounded-2xl border border-gray-100 p-5 mb-6">
        <form method="POST" action="{{ route('admin.categories.store') }}" class="flex gap-3 items-end flex-wrap">
            @csrf
            <div class="flex-1 min-w-48">
                <label class="block text-xs font-semibold mb-1 text-gray-500">Nom</label>
                <input type="text" name="name" required placeholder="Ex : Société"
                       class="w-full px-3 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition">
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1 text-gray-500">Couleur</label>
                <input type="color" name="color" value="#0a6b63"
                       class="h-10 w-14 rounded-xl border border-gray-200 cursor-pointer px-1">
            </div>
            <button type="submit" class="btn-primary text-sm px-5 py-2">Créer</button>
        </form>
        @if(session('success'))
        <p class="text-xs text-green-600 mt-2">{{ session('success') }}</p>
        @endif
    </div>

    {{-- Liste --}}
    <div class="bg-white rounded-2xl border border-gray-100 divide-y divide-gray-50">
        @forelse($categories as $cat)
        <div class="flex items-center justify-between px-5 py-3 group">
            <div class="flex items-center gap-3">
                <span class="h-3 w-3 rounded-full shrink-0" style="background:{{ $cat->color }}"></span>
                <span class="font-medium text-sm">{{ $cat->name }}</span>
                <span class="text-xs text-gray-400">{{ $cat->articles_count }} article{{ $cat->articles_count > 1 ? 's' : '' }}</span>
            </div>
            <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}"
                  onsubmit="event.preventDefault(); confirmDelete(this, '{{ addslashes($cat->name) }}')">
                @csrf @method('DELETE')
                <button type="submit" class="text-xs text-red-400 hover:text-red-600 opacity-0 group-hover:opacity-100 transition">Supprimer</button>
            </form>
        </div>
        @empty
        <p class="px-5 py-8 text-center text-sm text-gray-400">Aucune catégorie.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<div id="deleteCatModal" style="display:none;position:fixed;inset:0;z-index:9999;align-items:center;justify-content:center;background:rgba(0,0,0,0.4)">
    <div style="background:#fff;border-radius:1.25rem;padding:2rem;max-width:380px;width:90%;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.2)">
        <div style="width:48px;height:48px;background:#fef2f2;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem">
            <svg width="22" height="22" fill="none" stroke="#ef4444" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
        </div>
        <h3 style="font-weight:700;font-size:1.1rem;margin-bottom:.5rem" id="deleteCatTitle">Supprimer la catégorie ?</h3>
        <p style="color:#6b7280;font-size:.875rem;margin-bottom:1.5rem">Les articles associés ne seront <strong>pas supprimés</strong>, leur catégorie sera simplement retirée.</p>
        <div style="display:flex;gap:.75rem;justify-content:center">
            <button onclick="closeCatModal()" style="padding:.6rem 1.4rem;border-radius:9999px;border:1px solid #e5e7eb;background:#fff;font-size:.875rem;cursor:pointer">Annuler</button>
            <button id="deleteCatConfirmBtn" style="padding:.6rem 1.4rem;border-radius:9999px;border:none;background:#ef4444;color:#fff;font-size:.875rem;font-weight:600;cursor:pointer">Supprimer</button>
        </div>
    </div>
</div>
<script>
var _pendingDeleteForm = null;
function confirmDelete(form, name) {
    _pendingDeleteForm = form;
    document.getElementById('deleteCatTitle').textContent = 'Supprimer "' + name + '" ?';
    var modal = document.getElementById('deleteCatModal');
    modal.style.display = 'flex';
}
function closeCatModal() {
    document.getElementById('deleteCatModal').style.display = 'none';
    _pendingDeleteForm = null;
}
document.getElementById('deleteCatConfirmBtn').addEventListener('click', function() {
    if (_pendingDeleteForm) _pendingDeleteForm.submit();
});
document.getElementById('deleteCatModal').addEventListener('click', function(e) {
    if (e.target === this) closeCatModal();
});
</script>
@endpush
