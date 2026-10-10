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
            <form method="POST" action="{{ route('admin.categories.destroy', $cat) }}" onsubmit="return showConfirm('Supprimer cette catégorie ?', 'Les articles associés ne seront pas supprimés.', () => this.submit())">
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
