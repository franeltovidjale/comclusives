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
        <div class="flex items-center justify-between px-5 py-3">
            <div class="flex items-center gap-3">
                <span class="h-3 w-3 rounded-full shrink-0" style="background:{{ $cat->color }}"></span>
                <span class="font-medium text-sm">{{ $cat->name }}</span>
                <span class="text-xs" style="color:#9ca3af">{{ $cat->articles_count }} article{{ $cat->articles_count > 1 ? 's' : '' }}</span>
            </div>
            <div style="display:flex;align-items:center;gap:.75rem">
                {{-- Éditer --}}
                <button onclick="openEdit({{ $cat->id }}, '{{ addslashes($cat->name) }}', '{{ $cat->color }}')"
                        title="Renommer"
                        style="background:none;border:none;cursor:pointer;padding:4px;color:#6b7280;display:flex;align-items:center">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                </button>
                {{-- Supprimer --}}
                <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}"
                      onsubmit="event.preventDefault(); confirmDelete(this, '{{ addslashes($cat->name) }}')">
                    @csrf @method('DELETE')
                    <button type="submit" title="Supprimer"
                            style="background:none;border:none;cursor:pointer;padding:4px;color:#f87171;display:flex;align-items:center">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14H6L5 6"/>
                            <path d="M10 11v6"/><path d="M14 11v6"/>
                            <path d="M9 6V4h6v2"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="px-5 py-8 text-center text-sm text-gray-400">Aucune catégorie.</p>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
{{-- Modal suppression --}}
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

{{-- Modal édition --}}
<div id="editCatModal" style="display:none;position:fixed;inset:0;z-index:9999;align-items:center;justify-content:center;background:rgba(0,0,0,0.4)">
    <div style="background:#fff;border-radius:1.25rem;padding:2rem;max-width:400px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.2)">
        <h3 style="font-weight:700;font-size:1.1rem;margin-bottom:1.25rem">Modifier la catégorie</h3>
        <div style="margin-bottom:1rem">
            <label style="font-size:.75rem;font-weight:600;color:#6b7280;display:block;margin-bottom:.35rem">Nom</label>
            <input id="editCatName" type="text" style="width:100%;padding:.55rem .75rem;border-radius:.75rem;border:1px solid #e5e7eb;font-size:.875rem;outline:none;box-sizing:border-box">
        </div>
        <div style="margin-bottom:1.5rem">
            <label style="font-size:.75rem;font-weight:600;color:#6b7280;display:block;margin-bottom:.35rem">Couleur</label>
            <input id="editCatColor" type="color" style="height:40px;width:56px;border-radius:.75rem;border:1px solid #e5e7eb;cursor:pointer;padding:2px">
        </div>
        <div id="editCatError" style="color:#ef4444;font-size:.8rem;margin-bottom:.75rem;display:none"></div>
        <div style="display:flex;gap:.75rem;justify-content:flex-end">
            <button onclick="closeEditModal()" style="padding:.6rem 1.4rem;border-radius:9999px;border:1px solid #e5e7eb;background:#fff;font-size:.875rem;cursor:pointer">Annuler</button>
            <button id="editCatSaveBtn" style="padding:.6rem 1.4rem;border-radius:9999px;border:none;background:#0a6b63;color:#fff;font-size:.875rem;font-weight:600;cursor:pointer">Enregistrer</button>
        </div>
    </div>
</div>

<script>
var _pendingDeleteForm = null;
var _editCatId = null;

// ── Suppression ──
function confirmDelete(form, name) {
    _pendingDeleteForm = form;
    document.getElementById('deleteCatTitle').textContent = 'Supprimer "' + name + '" ?';
    document.getElementById('deleteCatModal').style.display = 'flex';
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

// ── Édition ──
function openEdit(id, name, color) {
    _editCatId = id;
    document.getElementById('editCatName').value = name;
    document.getElementById('editCatColor').value = color;
    document.getElementById('editCatError').style.display = 'none';
    document.getElementById('editCatModal').style.display = 'flex';
    setTimeout(function(){ document.getElementById('editCatName').focus(); }, 50);
}
function closeEditModal() {
    document.getElementById('editCatModal').style.display = 'none';
    _editCatId = null;
}
document.getElementById('editCatModal').addEventListener('click', function(e) {
    if (e.target === this) closeEditModal();
});
document.getElementById('editCatSaveBtn').addEventListener('click', async function() {
    var btn = this;
    var name = document.getElementById('editCatName').value.trim();
    var color = document.getElementById('editCatColor').value;
    var errEl = document.getElementById('editCatError');
    if (!name) { errEl.textContent = 'Le nom est requis.'; errEl.style.display = 'block'; return; }
    btn.textContent = '…';
    btn.disabled = true;
    var token = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
    try {
        var fd = new FormData();
        fd.append('_token', token);
        fd.append('_method', 'PATCH');
        fd.append('name', name);
        fd.append('color', color);
        var res = await fetch('/admin/categories/' + _editCatId, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN':token,'Accept':'application/json'},
            body: fd
        });
        var data = await res.json();
        if (!res.ok) {
            errEl.textContent = data.errors?.name?.[0] || 'Erreur.';
            errEl.style.display = 'block';
        } else {
            closeEditModal();
            location.reload();
        }
    } catch(e) { errEl.textContent = 'Erreur réseau.'; errEl.style.display = 'block'; }
    btn.textContent = 'Enregistrer';
    btn.disabled = false;
});
</script>
@endpush
