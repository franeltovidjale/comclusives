@extends('layouts.app')
@section('title','Blog – Articles sur l\'inclusion et la diversité')
@section('description','Découvrez nos articles sur la communication inclusive, l\'éducation, l\'égalité et l\'inclusion sociale. Ressources et analyses pour un monde plus juste.')
@section('og_image', asset('images/logo-horizontal.png'))
@section('content')


        <!-- HERO -->
        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 text-center" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                    <i data-lucide="book-open" class="h-3.5 w-3.5"></i> Blog
                </span>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight mt-6 mb-6">
                    Inclusion, diversité<br><span class="text-primary">&amp; voix engagées</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Explorez nos articles sur l'inclusion, la diversité, l'équité et la communication responsable. Témoignages, analyses et ressources pour comprendre et agir.
                </p>

                <!-- FILTRES CATÉGORIES -->
                <div class="flex flex-wrap justify-center gap-3 mt-8">
                    <button class="filter-btn active px-4 py-2 rounded-full text-sm font-medium transition" style="background:#0a6b63;color:#fff" data-cat="all">Tous</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-soft text-foreground/80 hover:bg-primary hover:text-white transition" data-cat="communication">Communication inclusive</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-soft text-foreground/80 hover:bg-primary hover:text-white transition" data-cat="education">Éducation</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-soft text-foreground/80 hover:bg-primary hover:text-white transition" data-cat="egalite">Égalité</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-soft text-foreground/80 hover:bg-primary hover:text-white transition" data-cat="inclusion">Inclusion</button>
                </div>
            </div>
        </section>

        <!-- ARTICLES -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $article)
                <a href="{{ route('blog.show', $article->slug) }}" class="card-treatment hover:-translate-y-1 hover:shadow-soft overflow-hidden p-0 block article-card" data-aos="fade-up">
                    @if($article->cover_url)
                    <img src="{{ $article->cover_url }}" alt="{{ $article->title }}" loading="lazy" class="w-full h-52 object-cover">
                    @else
                    <div class="w-full h-52 healing-gradient flex items-center justify-center">
                        <i data-lucide="book-open" class="h-12 w-12 text-white/60"></i>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($article->categories as $cat)
                            <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">{{ $cat->name }}</span>
                            @endforeach
                        </div>
                        <h2 class="text-lg font-bold mb-2 leading-snug">{{ $article->title }}</h2>
                        <p class="text-sm text-muted-foreground mb-4">{{ Str::limit($article->excerpt, 110) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-muted-foreground">{{ $article->published_at->translatedFormat('d M Y') }}</span>
                            <span class="text-sm font-semibold text-primary">Lire →</span>
                        </div>
                    </div>
                </a>
                @empty
                <p class="col-span-3 text-center py-16 text-muted-foreground">Aucun article dans cette catégorie.</p>
                @endforelse
            </div>
            <div class="mt-10">{{ $articles->links() }}</div>
            <!-- Message si aucun article -->
                <p id="noResults" class="hidden text-center text-muted-foreground mt-12">Aucun article dans cette catégorie pour le moment.</p>
            </div>
        </section>
    
@endsection
