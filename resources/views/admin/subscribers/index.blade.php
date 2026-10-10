@extends('layouts.admin')

@section('title', 'Abonnés newsletter')

@section('content')
<div id="toastMsg" class="hidden fixed top-4 right-4 z-50 px-4 py-3 rounded-xl text-sm font-semibold shadow-lg text-white" style="background:#0d9488"></div>

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold" style="font-family:Outfit,sans-serif">Abonnés newsletter</h1>
    <span class="text-sm text-gray-500" id="subCount">{{ $subscribers->total() }} abonné(s)</span>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-gray-100 bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Nom</th>
                <th class="px-6 py-3 text-left">Statut</th>
                <th class="px-6 py-3 text-left">Date</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody id="subTable" class="divide-y divide-gray-50">
            @forelse($subscribers as $sub)
            <tr class="hover:bg-gray-50 transition sub-row" data-id="{{ $sub->id }}">
                <td class="px-6 py-4 font-medium text-gray-900">{{ $sub->email }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $sub->name ?? '—' }}</td>
                <td class="px-6 py-4">
                    @if($sub->confirmed)
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Confirme</span>
                    @else
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">En attente</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-400">{{ $sub->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <button onclick="deleteSub({{ $sub->id }}, this)"
                        class="h-8 w-8 rounded-lg bg-red-50 text-red-400 hover:bg-red-100 flex items-center justify-center transition ml-auto">
                        <i data-lucide="trash-2" class="h-4 w-4"></i>
                    </button>
                </td>
            </tr>
            @empty
            <tr id="emptyRow">
                <td colspan="5" class="px-6 py-12 text-center text-gray-400">Aucun abonné pour le moment.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($subscribers->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">{{ $subscribers->links() }}</div>
    @endif
</div>

@push('scripts')
<script>
const CSRF_SUB = '{{ csrf_token() }}';

function toast(msg) {
    const el = document.getElementById('toastMsg');
    el.textContent = msg;
    el.classList.remove('hidden');
    setTimeout(() => el.classList.add('hidden'), 3000);
}

function deleteSub(id, btn) {
    const row = btn.closest('.sub-row');
    showConfirm('Supprimer cet abonne ?', 'Il ne recevra plus la newsletter.', async () => {
        btn.disabled = true;
        const res = await fetch(`/admin/subscribers/${id}`, {
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': CSRF_SUB, 'Accept': 'application/json'}
        });
        if (!res.ok) { btn.disabled = false; return; }
        row.style.opacity = '0';
        row.style.transition = 'opacity .3s';
        setTimeout(() => {
            row.remove();
            const remaining = document.querySelectorAll('.sub-row').length;
            document.getElementById('subCount').textContent = remaining + ' abonne(s)';
            if (remaining === 0) {
                const tbody = document.getElementById('subTable');
                tbody.innerHTML = '<tr><td colspan="5" class="px-6 py-12 text-center text-gray-400">Aucun abonne pour le moment.</td></tr>';
            }
        }, 300);
        toast('Abonne supprime.');
    });
}
</script>
@endpush
@endsection
