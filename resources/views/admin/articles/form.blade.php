@extends('layouts.admin')
@section('title', isset($article) ? 'Modifier l\'article' : 'Nouvel article')
@section('page-title', isset($article) ? 'Modifier l\'article' : 'Nouvel article')

@push('head')
<link href="https://cdn.jsdelivr.net/npm/jodit@3/build/jodit.min.css" rel="stylesheet">
<style>
.jodit-container { border-radius: 12px !important; overflow: hidden; border: 1px solid #e5e7eb !important; }
.jodit-toolbar__box { background: #f9fafb !important; border-bottom: 1px solid #e5e7eb !important; }
.jodit-workplace { min-height: 500px; font-family: Inter, sans-serif; font-size: 15px; line-height: 1.8; padding: 24px 32px !important; }
.img-preview { width:100%; height:200px; object-fit:cover; border-radius:12px; display:none; }
</style>
@endpush

@section('topbar-actions')
<a href="{{ route('admin.articles.index') }}" class="px-4 py-2 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition inline-flex items-center gap-2">
    <i data-lucide="arrow-left" class="h-4 w-4"></i> Retour
</a>
@endsection

@section('content')
<form method="POST" action="{{ isset($article) ? route('admin.articles.update',$article) : route('admin.articles.store') }}"
      enctype="multipart/form-data" id="articleForm">
    @csrf
    @if(isset($article)) @method('PUT') @endif

    @if($errors->any())
    <div class="mb-5 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
        <ul class="list-disc pl-4">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    <div class="grid lg:grid-cols-3 gap-6">

        {{-- ── Colonne principale ── --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Titre + Slug --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6 space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1.5">Titre <span class="text-red-400">*</span></label>
                    <input name="title" id="titleInput" value="{{ old('title',$article->title??'') }}" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition font-semibold text-gray-900"
                           placeholder="Titre de l'article..." style="font-family:Outfit,sans-serif;font-size:1.1rem">
                    @error('title')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1.5 text-gray-500">Slug (URL)</label>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-gray-400 shrink-0">/blog/</span>
                        <input name="slug" id="slugInput" value="{{ old('slug',$article->slug??'') }}"
                               class="flex-1 px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition font-mono text-gray-600"
                               placeholder="mon-article-url" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1.5 text-gray-500">Extrait / Chapeau</label>
                    <textarea name="excerpt" rows="3"
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition resize-none"
                              placeholder="Courte description affichée sur la liste du blog...">{{ old('excerpt',$article->excerpt??'') }}</textarea>
                </div>
            </div>

            {{-- Éditeur WYSIWYG --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-sm font-semibold mb-3">Contenu de l'article <span class="text-red-400">*</span></label>
                <textarea name="content" id="editor">{{ old('content',$article->content??'') }}</textarea>
            </div>

        </div>

        {{-- ── Colonne droite ── --}}
        <div class="space-y-5">

            {{-- Publier --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5 space-y-4">
                <h3 class="font-bold text-sm" style="font-family:Outfit,sans-serif">Publication</h3>
                <div>
                    <label class="block text-xs font-semibold mb-1.5 text-gray-500 uppercase tracking-wider">Statut</label>
                    <select name="status" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition bg-white">
                        <option value="draft" {{ old('status',$article->status??'draft') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="published" {{ old('status',$article->status??'') === 'published' ? 'selected' : '' }}>Publié</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1.5 text-gray-500 uppercase tracking-wider">Date de publication</label>
                    <input type="datetime-local" name="published_at"
                           value="{{ old('published_at', isset($article->published_at) ? $article->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:border-primary transition">
                </div>
                <div class="flex gap-2 pt-2">
                    <button type="submit" name="action" value="publish" id="btnPublish"
                            class="flex-1 py-2.5 rounded-xl text-white text-sm font-semibold healing-gradient hover:opacity-90 transition flex items-center justify-center gap-2">
                        <svg id="btnSpinner" class="hidden animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <span id="btnLabel">{{ isset($article) ? 'Mettre à jour' : 'Publier' }}</span>
                    </button>
                    <button type="submit" name="action" value="draft"
                            class="px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition">
                        Brouillon
                    </button>
                </div>
            </div>

            {{-- Image de couverture --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <h3 class="font-bold text-sm mb-3" style="font-family:Outfit,sans-serif">Image de couverture</h3>
                @if(isset($article) && $article->cover_url)
                <img id="imgPreview" src="{{ $article->cover_url }}" class="img-preview mb-3" style="display:block">
                @else
                <img id="imgPreview" class="img-preview mb-3">
                @endif
                <label class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl p-6 cursor-pointer hover:border-primary hover:bg-soft transition text-center">
                    <i data-lucide="image-plus" class="h-6 w-6 text-gray-300"></i>
                    <span class="text-sm text-gray-400">Cliquez pour choisir une image</span>
                    <span class="text-xs text-gray-300">JPG, PNG, WebP — auto-converti en WebP</span>
                    <input type="file" name="cover_image" id="coverInput" accept="image/*" class="hidden">
                </label>
                <div>
                    <label class="block text-xs font-semibold mt-3 mb-1.5 text-gray-500">Texte alternatif (SEO)</label>
                    <input type="text" name="cover_alt" value="{{ old('cover_alt',$article->cover_alt??'') }}"
                           class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-primary transition"
                           placeholder="Description de l'image pour l'accessibilité">
                </div>
            </div>

            {{-- Catégories --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <h3 class="font-bold text-sm mb-3" style="font-family:Outfit,sans-serif">Catégories</h3>
                <div class="space-y-2">
                    @foreach($categories as $cat)
                    <label class="flex items-center gap-3 p-2.5 rounded-xl hover:bg-gray-50 cursor-pointer transition">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}" class="rounded"
                               {{ (isset($article) && $article->categories->contains($cat->id)) || in_array($cat->id, old('categories',[])) ? 'checked' : '' }}>
                        <span class="text-sm font-medium">{{ $cat->name }}</span>
                        <span class="ml-auto h-3 w-3 rounded-full" style="background:{{ $cat->color }}"></span>
                    </label>
                    @endforeach
                </div>
                <button type="button" onclick="document.getElementById('newCatForm').classList.toggle('hidden')"
                        class="mt-3 text-xs text-primary font-semibold hover:underline flex items-center gap-1">
                    <i data-lucide="plus" class="h-3 w-3"></i> Nouvelle catégorie
                </button>
                <div id="newCatForm" class="hidden mt-3 flex gap-2">
                    <input type="text" name="new_category" placeholder="Nom catégorie"
                           class="flex-1 px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-primary transition">
                </div>
            </div>

            {{-- SEO --}}
            <div class="bg-white rounded-2xl border border-gray-100 p-5">
                <h3 class="font-bold text-sm mb-3" style="font-family:Outfit,sans-serif">SEO</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-semibold mb-1 text-gray-500">Meta title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title',$article->meta_title??'') }}"
                               class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-primary transition"
                               placeholder="Titre pour les moteurs de recherche (60 car max)">
                        <p class="text-xs text-gray-300 mt-0.5">Laissez vide = titre de l'article</p>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold mb-1 text-gray-500">Meta description</label>
                        <textarea name="meta_description" rows="3"
                                  class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none focus:border-primary transition resize-none"
                                  placeholder="Description pour Google (160 car max)">{{ old('meta_description',$article->meta_description??'') }}</textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
document.getElementById('articleForm').addEventListener('submit', function(e) {
    const btn = document.getElementById('btnPublish');
    if (document.activeElement === btn || e.submitter === btn) {
        document.getElementById('btnSpinner').classList.remove('hidden');
        document.getElementById('btnLabel').textContent = 'Enregistrement…';
        btn.disabled = true;
    }
});
</script>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jodit@3/build/jodit.min.js"></script>
<script>
// WYSIWYG Editor
const editor = Jodit.make('#editor', {
    language: 'fr',
    height: 550,
    toolbarButtonSize: 'middle',
    buttons: [
        'bold','italic','underline','strikethrough','|',
        'ul','ol','|',
        'font','fontsize','paragraph','|',
        'brush','|',
        'link','image','|',
        'align','|',
        'hr','blockquote','|',
        'table','|',
        'undo','redo','|',
        'eraser','fullsize','source'
    ],
    extraButtons: [],
    showPlaceholder: true,
    placeholder: 'Rédigez votre article ici...',
    style: { font: '15px/1.8 Inter, sans-serif', padding: '24px 32px', color: '#374151' },
    uploader: { insertImageAsBase64URI: true },
    colors: {
        greens: ['#0a6b63','#14b89e','#e8f8f5'],
        grays:  ['#111827','#374151','#6b7280','#d1d5db','#f9fafb'],
    },
});

// Auto-slug from title
document.getElementById('titleInput')?.addEventListener('input', function() {
    const slug = document.getElementById('slugInput');
    if (!slug.dataset.manual) {
        slug.value = this.value
            .toLowerCase()
            .normalize('NFD').replace(/[̀-ͯ]/g,'')
            .replace(/[^a-z0-9\s-]/g,'')
            .trim().replace(/\s+/g,'-');
    }
});
document.getElementById('slugInput')?.addEventListener('input', function() {
    this.dataset.manual = '1';
});

// Image preview
document.getElementById('coverInput')?.addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById('imgPreview');
        img.src = e.target.result;
        img.style.display = 'block';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
