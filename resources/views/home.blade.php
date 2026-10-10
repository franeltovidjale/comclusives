@extends('layouts.app')
@section('title','Comclusives – Communication inclusive & diversité sociale')
@section('description','Comclusives promeut une éducation, une communication et des pratiques sociales plus inclusives, égalitaires et conscientes. Articles, guides et ressources pédagogiques.')
@section('keywords','communication inclusive, inclusion sociale, éducation inclusive, diversité, égalité des genres, Bénin, ressources pédagogiques')
@section('og_image', asset('images/logo-horizontal.png'))
@push('head')
<link rel="preload" as="image" href="{{ asset('images/Plan-de-travail-1Comclu1-scaled.png') }}">
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebSite",
    "name": "Comclusives",
    "url": "{{ config('app.url') }}",
    "description": "Comclusives promeut une éducation, une communication et des pratiques sociales plus inclusives.",
    "potentialAction": {
        "@@type": "SearchAction",
        "target": "{{ route('blog.index') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>
@endpush
@section('content')


        <!-- HERO -->
        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center py-20 lg:py-28">
                <div class="space-y-7" data-aos="fade-right">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                        <i data-lucide="sparkles" class="h-3.5 w-3.5"></i>
                        Éducation, égalité et inclusion pour tous·tes
                    </span>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight leading-[1.05]">
                        Construisons une société où chacun·e trouve <span class="text-primary">sa place</span>.
                    </h1>
                    <p class="text-lg text-muted-foreground max-w-xl">Comclusives promeut une éducation, une communication et des pratiques sociales plus inclusives, égalitaires et conscientes. Parce que les mots, les images et les comportements façonnent le monde dans lequel nous vivons.</p>
                    <div class="flex flex-wrap gap-3">
                        <a class='btn-primary' href="{{ route('about') }}">Découvrir notre mission <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                        <a class='btn-outline' href="{{ route('blog.index') }}">Lire le blog</a>
                    </div>
                    <div class="flex flex-wrap gap-5 pt-4">
                        <div class="flex items-center gap-2 text-sm font-medium text-foreground/80"><i data-lucide="users" class="h-4 w-4 text-primary"></i> Communauté engagée</div>
                        <div class="flex items-center gap-2 text-sm font-medium text-foreground/80"><i data-lucide="book-open" class="h-4 w-4 text-primary"></i> Ressources pédagogiques</div>
                        <div class="flex items-center gap-2 text-sm font-medium text-foreground/80"><i data-lucide="heart-handshake" class="h-4 w-4 text-primary"></i> Inclusion & diversité</div>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-soft border border-white/40 bg-white/20">
                        <div id="heroSlider" class="relative w-full h-[520px]">
                            <img src="{{ asset('images/Plan-de-travail-1Comclu1-scaled.png') }}" alt="Comclusives – slide 1" width="800" height="520" fetchpriority="high" class="hero-slide w-full h-full object-contain transition-opacity duration-700 opacity-100" />
                            <img src="{{ asset('images/Plan-de-travail-1Comclu2-scaled.png') }}" alt="Comclusives – slide 2" width="800" height="520" loading="lazy" class="hero-slide w-full h-full object-contain transition-opacity duration-700 absolute inset-0 opacity-0" />
                            <img src="{{ asset('images/Plan-de-travail-1Comclu3-scaled.png') }}" alt="Comclusives – slide 3" width="800" height="520" loading="lazy" class="hero-slide w-full h-full object-contain transition-opacity duration-700 absolute inset-0 opacity-0" />
                        </div>
                        <!-- points de navigation -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                            <button class="slide-dot h-2 w-6 rounded-full bg-primary opacity-100 transition-all" data-idx="0"></button>
                            <button class="slide-dot h-2 w-2 rounded-full bg-primary opacity-40 transition-all" data-idx="1"></button>
                            <button class="slide-dot h-2 w-2 rounded-full bg-primary opacity-40 transition-all" data-idx="2"></button>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-card rounded-2xl shadow-card p-5 flex items-center gap-3 max-w-[260px]">
                        <div class="h-12 w-12 rounded-xl healing-gradient flex items-center justify-center text-primary-foreground">
                            <i data-lucide="users" class="h-5 w-5"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-bold leading-none">70+</p>
                            <p class="text-xs text-muted-foreground mt-1">Abonné·es actif·ves</p>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-card rounded-2xl shadow-card px-4 py-3 hidden md:block">
                        <p class="text-xs text-muted-foreground">Cotonou, Bénin</p>
                        <p class="text-sm font-semibold text-primary">Depuis 2023</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- BANDEAU -->
        <div class="bg-secondary text-secondary-foreground">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
                <div class="flex items-center gap-3">
                    <span class="relative flex h-3 w-3"><span class="absolute inline-flex h-full w-full rounded-full bg-accent opacity-75 animate-ping"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-accent"></span></span>
                    <p class="font-medium">Rejoignez notre communauté — l'inclusion est une responsabilité partagée.</p>
                </div>
                <a href="https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-accent text-accent-foreground font-semibold text-sm hover:scale-105 transition">
                    <i data-lucide="message-circle" class="h-4 w-4"></i> Notre chaîne WhatsApp
                </a>
            </div>
        </div>

        <!-- CATÉGORIES D'ARTICLES -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Catégories d'articles</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Explorer toutes les catégories</h2>
                    <p class="mt-4 text-muted-foreground">Des articles, ressources et réflexions pour questionner, apprendre et agir.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="0">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5"><i data-lucide="message-square" class="h-6 w-6"></i></div>
                        <h3 class="text-xl font-semibold mb-2">Communication inclusive</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed">Les mots et les images façonnent nos perceptions. Reprenons-en le contrôle.</p>
                        <a class='inline-flex items-center gap-1 mt-5 text-sm font-semibold text-primary' href="{{ route('blog.index', ['cat'=>'communication-inclusive']) }}">Voir les articles <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="80">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5"><i data-lucide="graduation-cap" class="h-6 w-6"></i></div>
                        <h3 class="text-xl font-semibold mb-2">Éducation</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed">Donner à chacun·e les moyens d'apprendre et de s'épanouir pleinement.</p>
                        <a class='inline-flex items-center gap-1 mt-5 text-sm font-semibold text-primary' href="{{ route('blog.index', ['cat'=>'education']) }}">Voir les articles <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="160">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5"><i data-lucide="scale" class="h-6 w-6"></i></div>
                        <h3 class="text-xl font-semibold mb-2">Égalité</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed">Transformer les mentalités et les structures, ensemble, pour plus de justice.</p>
                        <a class='inline-flex items-center gap-1 mt-5 text-sm font-semibold text-primary' href="{{ route('blog.index', ['cat'=>'egalite']) }}">Voir les articles <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="240">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5"><i data-lucide="heart" class="h-6 w-6"></i></div>
                        <h3 class="text-xl font-semibold mb-2">Inclusion</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed">L'inclusion n'est pas une option — c'est une responsabilité partagée.</p>
                        <a class='inline-flex items-center gap-1 mt-5 text-sm font-semibold text-primary' href="{{ route('blog.index', ['cat'=>'inclusion']) }}">Voir les articles <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- À PROPOS -->
        <section class="section-padding bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
                <div class="relative" data-aos="fade-right">
                    <img src="{{ asset('images/New-Project.jpg') }}"
                         alt="Comclusives en action"
                         class="rounded-[2rem] shadow-soft w-full h-[480px] object-cover" />
                    <div class="absolute bottom-6 right-6 bg-card rounded-2xl shadow-card p-5">
                        <p class="text-3xl font-bold text-primary">2023</p>
                        <p class="text-xs text-muted-foreground">Fondé à Cotonou, Bénin</p>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <span class="text-xs uppercase tracking-widest text-primary font-semibold">À propos de nous</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-5">Comclusives, c'est quoi ?</h2>
                    <p class="text-muted-foreground mb-6">Comclusives est une initiative engagée pour une éducation et une communication inclusives. Notre objectif : questionner les stéréotypes, valoriser la diversité et outiller les éducateur·rices, parents, professionnel·les et citoyen·nes pour bâtir des environnements où chaque voix compte.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Promouvoir une éducation inclusive — où chaque élève trouve sa place</span></li>
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Lutter contre les stéréotypes de genre, de handicap, d'origine et de statut</span></li>
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Encourager une communication consciente, responsable, qui fait sens pour toutes et tous</span></li>
                    </ul>
                    <a class='btn-outline' href="{{ route('about') }}">Notre histoire</a>
                </div>
            </div>
        </section>

        <!-- NOS VALEURS -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Nos axes</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">L'éducation, la communication et l'égalité au cœur de tout</h2>
                </div>
                <div class="relative mt-16 grid md:grid-cols-3 gap-6">
                    <div class="relative text-center card-treatment" data-aos="fade-up" data-aos-delay="0">
                        <div class="relative mx-auto h-14 w-14 rounded-full healing-gradient text-primary-foreground flex items-center justify-center shadow-soft">
                            <i data-lucide="graduation-cap" class="h-6 w-6"></i>
                            <span class="absolute -top-4 right-4 h-6 w-6 rounded-full bg-card text-primary text-xs font-bold flex items-center justify-center border border-border">1</span>
                        </div>
                        <h3 class="font-semibold mt-5 mb-2">Éducation inclusive</h3>
                        <p class="text-sm text-muted-foreground">Donner à chacun·e les moyens d'apprendre et de s'épanouir, quels que soient son contexte ou ses capacités.</p>
                    </div>
                    <div class="relative text-center card-treatment" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative mx-auto h-14 w-14 rounded-full healing-gradient text-primary-foreground flex items-center justify-center shadow-soft">
                            <i data-lucide="message-square" class="h-6 w-6"></i>
                            <span class="absolute -top-4 right-4 h-6 w-6 rounded-full bg-card text-primary text-xs font-bold flex items-center justify-center border border-border">2</span>
                        </div>
                        <h3 class="font-semibold mt-5 mb-2">Communication consciente</h3>
                        <p class="text-sm text-muted-foreground">Les mots et les images façonnent nos perceptions. Reprenons-en le contrôle, ensemble.</p>
                    </div>
                    <div class="relative text-center card-treatment" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative mx-auto h-14 w-14 rounded-full healing-gradient text-primary-foreground flex items-center justify-center shadow-soft">
                            <i data-lucide="scale" class="h-6 w-6"></i>
                            <span class="absolute -top-4 right-4 h-6 w-6 rounded-full bg-card text-primary text-xs font-bold flex items-center justify-center border border-border">3</span>
                        </div>
                        <h3 class="font-semibold mt-5 mb-2">Égalité &amp; Justice sociale</h3>
                        <p class="text-sm text-muted-foreground">Transformer les mentalités et les structures pour un monde plus juste, un mot, une classe, un regard à la fois.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHIFFRES -->
        <section class="py-16 bg-secondary text-secondary-foreground">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div data-aos="zoom-in" data-aos-delay="0">
                    <p class="text-4xl md:text-5xl font-bold text-accent">70+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Abonné·es</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="80">
                    <p class="text-4xl md:text-5xl font-bold text-accent">6+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Articles communication</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="160">
                    <p class="text-4xl md:text-5xl font-bold text-accent">4</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Catégories thématiques</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="240">
                    <p class="text-4xl md:text-5xl font-bold text-accent">2023</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Année de création</p>
                </div>
            </div>
        </section>

        <!-- À LA UNE SUR LE BLOG -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
                    <div data-aos="fade-right">
                        <span class="text-xs uppercase tracking-widest font-semibold text-primary">Nos derniers articles</span>
                        <h2 class="text-3xl md:text-4xl font-bold mt-2">À la une sur le blog</h2>
                    </div>
                    <a href="{{ route('blog.index') }}" class="shrink-0 inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-primary text-primary font-semibold text-sm hover:bg-primary hover:text-white transition" data-aos="fade-left">
                        Voir tous les articles <i data-lucide="arrow-right" class="h-4 w-4"></i>
                    </a>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                @forelse($featured as $f)
                <article class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('blog.show', $f->slug) }}" class="block overflow-hidden aspect-video">
                        @if($f->cover_url)
                        <img src="{{ $f->cover_url }}" alt="{{ $f->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                        <div class="w-full h-full healing-gradient flex items-center justify-center">
                            <i data-lucide="book-open" class="h-12 w-12 text-white/60"></i>
                        </div>
                        @endif
                    </a>
                    <div class="p-5">
                        <div class="flex flex-wrap gap-1 mb-3">
                            @foreach($f->categories->take(2) as $cat)
                            <span class="text-xs px-2 py-0.5 rounded-full bg-primary/10 text-primary font-semibold">{{ $cat->name }}</span>
                            @endforeach
                        </div>
                        <h3 class="font-bold text-lg leading-snug mb-2 group-hover:text-primary transition line-clamp-2">
                            <a href="{{ route('blog.show', $f->slug) }}">{{ $f->title }}</a>
                        </h3>
                        <p class="text-sm text-muted-foreground line-clamp-2 mb-4">{{ strip_tags(html_entity_decode($f->excerpt)) }}</p>
                        <div class="flex items-center justify-between text-xs text-gray-400">
                            <span>{{ $f->published_at?->translatedFormat('d M Y') }}</span>
                            <a href="{{ route('blog.show', $f->slug) }}" class="inline-flex items-center gap-1 text-primary font-semibold hover:underline">
                                Lire <i data-lucide="arrow-right" class="h-3 w-3"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <p class="text-muted-foreground col-span-3 text-center">Aucun article publié pour le moment.</p>
                @endforelse
                </div>
            </div>
        </section>

        <!-- CE QUE NOUS FAISONS -->
        <section class="section-padding bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <span class="text-xs uppercase tracking-widest text-primary font-semibold">Comprendre, apprendre et agir</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-5">Ce que nous proposons</h2>
                    <p class="text-muted-foreground mb-6">À travers des articles, ressources et projets collaboratifs, nous œuvrons pour une société où la différence n'est plus un obstacle, mais une richesse.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex gap-2 items-center text-sm"><i data-lucide="check-circle-2" class="h-4 w-4 text-primary"></i> Articles & analyses</div>
                        <div class="flex gap-2 items-center text-sm"><i data-lucide="check-circle-2" class="h-4 w-4 text-primary"></i> Documents pédagogiques</div>
                        <div class="flex gap-2 items-center text-sm"><i data-lucide="check-circle-2" class="h-4 w-4 text-primary"></i> Cours de français</div>
                        <div class="flex gap-2 items-center text-sm"><i data-lucide="check-circle-2" class="h-4 w-4 text-primary"></i> Projets collaboratifs</div>
                    </div>
                </div>
                <div class="order-1 lg:order-2 relative" data-aos="fade-left">
                    <img src="{{ asset('images/New-Project-3.png') }}"
                         alt="Ressources Comclusives"
                         class="rounded-[2rem] shadow-soft w-full h-[480px] object-cover" />
                    <div class="absolute bottom-6 left-6 bg-white rounded-2xl px-4 py-3 shadow-lg flex items-center gap-3">
                        <img src="{{ asset('images/student-group_1_1-2-1.png') }}" alt="Étudiants" class="h-10 w-auto">
                        <div>
                            <p class="font-bold text-lg text-primary leading-none">30+</p>
                            <p class="text-xs text-gray-500">Étudiants actifs</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- POURQUOI COMCLUSIVES -->
        <section class="section-padding bg-secondary text-secondary-foreground">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-accent">Pourquoi Comclusives</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Une approche humaine, engagée et accessible.</h2>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                    <div class="rounded-2xl p-7 bg-white/5 border border-white/10 hover:bg-white/10 transition" style="backdrop-filter:blur(10px)" data-aos="fade-up" data-aos-delay="0">
                        <i data-lucide="check-circle-2" class="h-7 w-7 text-accent mb-4"></i>
                        <h3 class="font-semibold mb-2">Contenu de qualité</h3>
                        <p class="text-sm text-secondary-foreground/70">Des articles réfléchis, sourcés et accessibles à tous les niveaux.</p>
                    </div>
                    <div class="rounded-2xl p-7 bg-white/5 border border-white/10 hover:bg-white/10 transition" style="backdrop-filter:blur(10px)" data-aos="fade-up" data-aos-delay="80">
                        <i data-lucide="check-circle-2" class="h-7 w-7 text-accent mb-4"></i>
                        <h3 class="font-semibold mb-2">Ancré dans le réel</h3>
                        <p class="text-sm text-secondary-foreground/70">Des ressources adaptées aux contextes africains et francophones.</p>
                    </div>
                    <div class="rounded-2xl p-7 bg-white/5 border border-white/10 hover:bg-white/10 transition" style="backdrop-filter:blur(10px)" data-aos="fade-up" data-aos-delay="160">
                        <i data-lucide="check-circle-2" class="h-7 w-7 text-accent mb-4"></i>
                        <h3 class="font-semibold mb-2">Communauté active</h3>
                        <p class="text-sm text-secondary-foreground/70">Un espace d'échange et de partage ouvert à toutes et tous.</p>
                    </div>
                    <div class="rounded-2xl p-7 bg-white/5 border border-white/10 hover:bg-white/10 transition" style="backdrop-filter:blur(10px)" data-aos="fade-up" data-aos-delay="240">
                        <i data-lucide="check-circle-2" class="h-7 w-7 text-accent mb-4"></i>
                        <h3 class="font-semibold mb-2">Action concrète</h3>
                        <p class="text-sm text-secondary-foreground/70">Des outils pratiques pour transformer les mentalités au quotidien.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- TÉMOIGNAGES -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Témoignages</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Partages d'expériences.</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 mt-12">
                    <div class="card-treatment" data-aos="fade-up" data-aos-delay="0">
                        <i data-lucide="quote" class="h-8 w-8 text-primary/30 mb-4"></i>
                        <p class="text-foreground/90 italic leading-relaxed">"Grâce à Comclusives, j'ai compris que l'inclusion passe aussi par les images et les mots. Un regard transformé."</p>
                        <div class="flex items-center gap-3 mt-6">
                            <img src="{{ asset('images/jul.png') }}" alt="Julien" class="h-10 w-10 rounded-full object-cover shrink-0">
                            <div>
                                <p class="font-semibold text-sm">Julien</p>
                                <p class="text-xs text-muted-foreground">Formateur en communication</p>
                            </div>
                            <div class="ml-auto flex gap-0.5">
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-treatment" data-aos="fade-up" data-aos-delay="80">
                        <i data-lucide="quote" class="h-8 w-8 text-primary/30 mb-4"></i>
                        <p class="text-foreground/90 italic leading-relaxed">"Comclusives m'a aidée à repenser mes habitudes en classe. Mes élèves en bénéficient chaque jour."</p>
                        <div class="flex items-center gap-3 mt-6">
                            <img src="{{ asset('images/fam.png') }}" alt="Sophie" class="h-10 w-10 rounded-full object-cover shrink-0">
                            <div>
                                <p class="font-semibold text-sm">Sophie</p>
                                <p class="text-xs text-muted-foreground">Enseignante en primaire</p>
                            </div>
                            <div class="ml-auto flex gap-0.5">
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                                <i data-lucide="star" class="h-4 w-4 fill-accent text-accent"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- NOS RESSOURCES -->
        <section class="py-12 bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- En-tête -->
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8" data-aos="fade-up">
                    <div>
                        <span class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-semibold text-primary mb-2">
                            <i data-lucide="book-marked" class="h-4 w-4"></i> Nos ressources
                        </span>
                        <h2 class="text-3xl md:text-4xl font-bold leading-tight">Comprendre, apprendre et agir</h2>
                        <p class="text-muted-foreground mt-2 max-w-2xl">Outils concrets, guides pratiques et supports de sensibilisation pour construire des espaces plus justes et inclusifs.</p>
                    </div>
                    <div class="flex gap-3 shrink-0">
                        <a href="{{ route('learn-french') }}" class="btn-primary inline-flex items-center gap-2 text-sm">
                            Learn French <i data-lucide="arrow-right" class="h-4 w-4"></i>
                        </a>
                        <a href="{{ route('contact') }}" class="btn-outline inline-flex items-center gap-2 text-sm">
                            Contact <i data-lucide="arrow-right" class="h-4 w-4"></i>
                        </a>
                    </div>
                </div>
                <!-- 3 cartes en ligne -->
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group" data-aos="fade-up" data-aos-delay="0">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/WhatsApp-Image-2025-10-15-a-20.01.41_f11cb6ce.jpg') }}" alt="L'inclusion à l'école primaire" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-4">
                            <p class="font-bold text-sm mb-3">L'inclusion à l'école primaire</p>
                            <a href="https://credoshs.mychariow.store/prd_5fywy1" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 w-full justify-center py-2.5 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition">
                                <i data-lucide="download" class="h-4 w-4"></i> Télécharger le guide
                            </a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group" data-aos="fade-up" data-aos-delay="100">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/IMG-20251111-WA0019.jpg') }}" alt="Mon français sous l'angle des anglicismes" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-4">
                            <p class="font-bold text-sm mb-3">Mon français sous l'angle des anglicismes</p>
                            <a href="{{ route('learn-french') }}"
                               class="inline-flex items-center gap-2 w-full justify-center py-2.5 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition">
                                <i data-lucide="download" class="h-4 w-4"></i> Télécharger
                            </a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group" data-aos="fade-up" data-aos-delay="200">
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('images/WhatsApp-Image-2025-10-15-a-20.01.42_2de5a9a3.jpg') }}" alt="Écriture Inclusive" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-4">
                            <p class="font-bold text-sm mb-3">Écriture Inclusive</p>
                            <a href="https://credoshs.mychariow.shop/ecritureinclusive" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-2 w-full justify-center py-2.5 rounded-xl healing-gradient text-white text-sm font-semibold hover:opacity-90 transition">
                                <i data-lucide="download" class="h-4 w-4"></i> Télécharger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA FINAL -->
        <section class="section-padding">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[2.5rem] healing-gradient p-12 md:p-16 text-center text-primary-foreground shadow-soft" data-aos="zoom-in">
                    <div class="absolute inset-0 opacity-20" style="background:radial-gradient(circle at 20% 20%,white,transparent 40%),radial-gradient(circle at 80% 80%,white,transparent 40%)"></div>
                    <div class="relative">
                        <h2 class="text-4xl md:text-5xl font-bold max-w-2xl mx-auto leading-tight">L'inclusion commence par la conscience. Agissons ensemble.</h2>
                        <p class="mt-5 opacity-90 max-w-xl mx-auto">Rejoignez notre communauté, lisez nos articles, partagez nos ressources. Chaque voix compte.</p>
                        <div class="flex flex-wrap justify-center gap-3 mt-8">
                            <a class='inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white text-primary font-semibold hover:scale-105 transition' href="{{ route('blog.index') }}">Lire le blog <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                            <a href="https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full border border-white/40 hover:bg-white/10 font-semibold transition"><i data-lucide="message-circle" class="h-4 w-4"></i> Notre chaîne WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
@endsection
@push('scripts')
<script>

const slides = document.querySelectorAll('.hero-slide');
const dots   = document.querySelectorAll('.slide-dot');
let current  = 0;
function goTo(idx) {
    slides[current].classList.remove('opacity-100'); slides[current].classList.add('opacity-0');
    dots[current].classList.remove('opacity-100','w-6'); dots[current].classList.add('opacity-40','w-2');
    current = idx;
    slides[current].classList.remove('opacity-0'); slides[current].classList.add('opacity-100');
    dots[current].classList.remove('opacity-40','w-2'); dots[current].classList.add('opacity-100','w-6');
}
dots.forEach(d => d.addEventListener('click', () => goTo(+d.dataset.idx)));
setInterval(() => goTo((current + 1) % slides.length), 4000);

</script>
@endpush
