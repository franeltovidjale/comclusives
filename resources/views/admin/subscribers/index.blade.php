@extends('layouts.admin')

@section('title', 'Abonnés newsletter')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold" style="font-family:Outfit,sans-serif">Abonnés newsletter</h1>
    <span class="text-sm text-gray-500">{{ $subscribers->total() }} abonné(s)</span>
</div>

@if(session('success'))
    <div class="mb-4 px-4 py-3 rounded-xl bg-green-50 text-green-700 text-sm">{{ session('success') }}</div>
@endif

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
        <tbody class="divide-y divide-gray-50">
            @forelse($subscribers as $sub)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium text-gray-900">{{ $sub->email }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $sub->name ?? '—' }}</td>
                <td class="px-6 py-4">
                    @if($sub->confirmed)
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Confirmé</span>
                    @else
                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">En attente</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-400">{{ $sub->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <form method="POST" action="{{ route('admin.subscribers.destroy', $sub) }}" onsubmit="return confirm('Supprimer cet abonné ?')">
                        @csrf @method('DELETE')
                        <button class="h-8 w-8 rounded-lg bg-red-50 text-red-400 hover:bg-red-100 flex items-center justify-center transition ml-auto">
                            <i data-lucide="trash-2" class="h-4 w-4"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-400">Aucun abonné pour le moment.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if($subscribers->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">{{ $subscribers->links() }}</div>
    @endif
</div>
@endsection
