@extends('layouts.admin')
@section('title','Articles')
@section('content')
<div class="flex items-center justify-between mb-6 gap-4">
    <div class="relative flex-1 max-w-sm">
        <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400"></i>
        <input id="articleSearch" type="text" placeholder="Rechercher un article..." autofocus
            class="w-full pl-9 pr-4 py-2 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition">
    </div>
    <a href="{{ route('admin.articles.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition shrink-0">
        + Nouvel article
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-5 py-3 font-semibold text-gray-500">Titre</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-500 hidden md:table-cell">Catégories</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-500 hidden sm:table-cell">Statut</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-500 hidden lg:table-cell">Vues</th>
                <th class="text-left px-4 py-3 font-semibold text-gray-500 hidden lg:table-cell">Date</th>
                <th class="px-4 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
        @foreach($articles as $a)
        <tr class="hover:bg-gray-50/50 article-row">
            <td class="px-5 py-3 font-medium">
                <p class="truncate max-w-[180px] sm:max-w-xs">{{ $a->title }}</p>
                <p class="text-xs text-gray-400 truncate max-w-[180px] sm:max-w-xs">{{ $a->slug }}</p>
                {{-- Mobile: show status badge inline --}}
                <span class="sm:hidden mt-1 inline-block text-xs px-2 py-0.5 rounded-full font-semibold {{ $a->status==='published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $a->status==='published' ? 'Publié' : 'Brouillon' }}
                </span>
            </td>
            <td class="px-4 py-3 hidden md:table-cell">
                <div class="flex flex-wrap gap-1">
                @foreach($a->categories as $cat)
                    <span class="text-xs px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 font-medium">{{ $cat->name }}</span>
                @endforeach
                </div>
            </td>
            <td class="px-4 py-3 hidden sm:table-cell">
                <span class="text-xs px-2 py-0.5 rounded-full font-semibold {{ $a->status==='published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $a->status==='published' ? 'Publié' : 'Brouillon' }}
                </span>
                @if($a->newsletter_sent)
                    <span class="text-xs px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 font-semibold ml-1">📨</span>
                @endif
            </td>
            <td class="px-4 py-3 text-gray-500 hidden lg:table-cell">{{ number_format($a->views) }}</td>
            <td class="px-4 py-3 text-gray-400 text-xs hidden lg:table-cell">{{ $a->created_at->format('d/m/Y') }}</td>
            <td class="px-4 py-3">
                <div class="flex items-center gap-1 justify-end">
                    @if($a->status==='draft')
                        <form method="POST" action="{{ route('admin.articles.publish',$a) }}">@csrf @method('PATCH')
                            <button title="Publier" class="h-8 w-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center transition">
                                <i data-lucide="globe" class="h-4 w-4"></i>
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.articles.newsletter',$a) }}">@csrf
                            <button title="{{ $a->newsletter_sent ? 'Renvoyer la newsletter' : 'Envoyer newsletter' }}" class="h-8 w-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center transition">
                                <i data-lucide="send" class="h-4 w-4"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.articles.unpublish',$a) }}">@csrf @method('PATCH')
                            <button title="Dépublier" class="h-8 w-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center transition">
                                <i data-lucide="eye-off" class="h-4 w-4"></i>
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('admin.articles.edit',$a) }}" title="Éditer" class="h-8 w-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 flex items-center justify-center transition">
                        <i data-lucide="pencil" class="h-4 w-4"></i>
                    </a>
                    <form id="del-{{ $a->id }}" method="POST" action="{{ route('admin.articles.destroy',$a) }}">@csrf @method('DELETE')</form>
                    <button title="Supprimer" onclick="showConfirm('Supprimer cet article ?','Cette action est irreversible.',()=>document.getElementById('del-{{ $a->id }}').submit())"
                        class="h-8 w-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 flex items-center justify-center transition">
                        <i data-lucide="trash-2" class="h-4 w-4"></i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div id="noResults" class="hidden px-5 py-10 text-center text-gray-400 text-sm">Aucun article trouvé.</div>
    <div class="px-5 py-4 border-t border-gray-100" id="paginationWrap">{{ $articles->links() }}</div>
</div>

@push('scripts')
<script>
document.getElementById('articleSearch').addEventListener('input', function() {
    const q = this.value.toLowerCase().trim();
    const rows = document.querySelectorAll('.article-row');
    let visible = 0;
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const show = !q || text.includes(q);
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('noResults').classList.toggle('hidden', visible > 0);
    document.getElementById('paginationWrap').style.display = q ? 'none' : '';
});
</script>
@endpush
@endsection
