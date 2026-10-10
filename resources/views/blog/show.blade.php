@extends('layouts.app')
@section('title', $article->meta_title ?? $article->title)
@section('description', Str::limit(strip_tags(html_entity_decode($article->meta_description ?? $article->excerpt)), 155))
@section('keywords', $article->categories->pluck('name')->implode(', ') . ', Comclusives, communication inclusive')
@section('og_type','article')
@section('og_title', $article->meta_title ?? $article->title)
@section('og_image', $article->cover_url ?? asset('images/og-image.jpg'))
@section('og_extra')
<meta property="article:published_time" content="{{ $article->published_at?->toIso8601String() }}">
<meta property="article:modified_time" content="{{ $article->updated_at?->toIso8601String() }}">
<meta property="article:author" content="{{ $article->author?->name ?? 'Comclusives' }}">
@foreach($article->categories as $cat)
<meta property="article:section" content="{{ $cat->name }}">
@endforeach
@endsection
@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Article",
    "headline": "{{ addslashes($article->title) }}",
    "description": "{{ addslashes(Str::limit(strip_tags(html_entity_decode($article->excerpt ?? '')), 155)) }}",
    "image": {
        "@@type": "ImageObject",
        "url": "{{ $article->cover_url ?? asset('images/og-image.jpg') }}"
    },
    "datePublished": "{{ $article->published_at?->toIso8601String() ?? $article->created_at->toIso8601String() }}",
    "dateModified": "{{ $article->updated_at->toIso8601String() }}",
    "author": {
        "@@type": "Person",
        "name": "{{ $article->author?->name ?? 'Comclusives' }}"
    },
    "publisher": {
        "@@type": "Organization",
        "name": "Comclusives",
        "logo": {
            "@@type": "ImageObject",
            "url": "{{ asset('images/logo-icon.png') }}"
        }
    },
    "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url()->current() }}"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {"@@type":"ListItem","position":1,"name":"Accueil","item":"{{ route('home') }}"},
        {"@@type":"ListItem","position":2,"name":"Blog","item":"{{ route('blog.index') }}"},
        {"@@type":"ListItem","position":3,"name":"{{ addslashes($article->title) }}","item":"{{ url()->current() }}"}
    ]
}
</script>
@endpush

@push('head')
<style>
/* Hide sidebar on mobile */
@media (max-width: 767px) { .article-sidebar { display: none !important; } }
@media (max-width: 767px) { .article-hero { min-height: 55vh !important; } }

/* Article prose */
.article-prose { font-size: 1.0625rem; line-height: 1.85; color: #374151; word-break: break-word; max-width: 100%; }
.article-prose * { max-width: 100%; box-sizing: border-box; }
.article-prose div, .article-prose section, .article-prose article { overflow: visible !important; visibility: visible !important; opacity: 1 !important; display: revert; }
/* Force AOS elements inside article to be visible */
.article-prose [data-aos] { opacity: 1 !important; transform: none !important; }
/* Neutralize Elementor/WordPress classes in imported content */
.article-prose .elementor,
.article-prose .elementor-element,
.article-prose .e-con,
.article-prose .e-con-inner,
.article-prose .e-flex,
.article-prose .e-con-boxed,
.article-prose .elementor-widget,
.article-prose .elementor-widget-wrap,
.article-prose .elementor-section,
.article-prose .elementor-container,
.article-prose .elementor-column,
.article-prose .elementor-widget-container,
.article-prose .elementor-widget-text-editor {
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
    overflow: visible !important;
    width: 100% !important;
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
    color: #374151 !important;
}
/* Hide WordPress meta/share blocks imported from old site */
.article-prose .blog-meta,
.article-prose .share-links,
.article-prose .tagcloud { display: none !important; }
/* Fix lazy-loaded images from LWS (data-src → src) */
.article-prose img[data-src]:not([src]) { display: none; }
.article-prose p { margin-bottom: 1.4rem; }
.article-prose h2 { font-family:Outfit,sans-serif; font-size:1.5rem; font-weight:700; color:#111827; margin:2.5rem 0 1rem; padding-bottom:.5rem; border-bottom:2px solid #e5f0ef; }
.article-prose h3 { font-family:Outfit,sans-serif; font-size:1.2rem; font-weight:700; color:#111827; margin:2rem 0 .75rem; }
.article-prose h4 { font-weight:700; color:#1f2937; margin:1.5rem 0 .5rem; }
.article-prose ul,
.article-prose ol { padding-left:1.5rem; margin-bottom:1.4rem; }
.article-prose ul { list-style:none; }
.article-prose ul li { position:relative; padding-left:1.5rem; margin-bottom:.5rem; }
.article-prose ul li::before { content:''; position:absolute; left:0; top:.7em; width:7px; height:7px; border-radius:50%; background:#0a6b63; }
.article-prose ol li { margin-bottom:.5rem; }
.article-prose blockquote { border-left:4px solid #0a6b63; background:#f0faf9; padding:1rem 1.5rem; border-radius:0 12px 12px 0; margin:2rem 0; font-style:italic; color:#374151; }
.article-prose strong,
.article-prose b { font-weight:700; color:#111827; }
.article-prose a { color:#0a6b63; text-decoration:underline; text-underline-offset:3px; }
.article-prose img { border-radius:12px; width:100%; max-width:100%; height:auto; margin:2rem auto; display:block; }
.article-prose table { width:100%; border-collapse:collapse; margin:2rem 0; font-size:.9rem; }
.article-prose th { background:#0a6b63; color:#fff; padding:.75rem 1rem; text-align:left; }
.article-prose td { padding:.75rem 1rem; border-bottom:1px solid #e5e7eb; }
.article-prose tr:nth-child(even) td { background:#f9fafb; }
.article-prose hr { border:none; border-top:2px solid #e5f0ef; margin:2.5rem 0; }
.article-prose iframe, .article-prose video { max-width:100%; width:100%; border-radius:12px; }
.article-prose pre, .article-prose code { overflow-x:auto; max-width:100%; white-space:pre-wrap; word-break:break-word; }

.popular-post:hover .popular-title { color:#0a6b63; }
@keyframes slideUp { from{transform:translateY(40px);opacity:0} to{transform:translateY(0);opacity:1} }
</style>
@endpush

@section('content')

{{-- ══ HERO ══ --}}
<div class="article-hero relative flex items-end pb-16 overflow-hidden mt-20" style="min-height:70vh"
     style="background:{{ $article->cover_url ? 'none' : 'linear-gradient(135deg,#0a6b63,#1f2937)' }}">

    @if($article->cover_url)
    <div class="absolute inset-0">
        <img src="{{ $article->cover_url }}" alt=""
             class="w-full h-full object-cover object-center" loading="eager">
        <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,.85) 0%, rgba(0,0,0,.45) 50%, rgba(0,0,0,.25) 100%)"></div>
    </div>
    @else
    <div class="absolute inset-0" style="background:linear-gradient(135deg,#0a6b63,#1f2937)"></div>
    @endif

    <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        {{-- Categories --}}
        <div class="flex flex-wrap justify-center gap-2 mb-5">
            @foreach($article->categories as $cat)
            <a href="{{ route('blog.index', ['cat'=>$cat->slug]) }}"
               class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest"
               style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.3);backdrop-filter:blur(8px)">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>

        {{-- Title --}}
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-6 text-white"
            style="font-family:Outfit,sans-serif;text-shadow:0 2px 20px rgba(0,0,0,.5)">
            {{ $article->title }}
        </h1>

        {{-- Meta --}}
        <div class="flex flex-wrap items-center justify-center gap-3 text-sm text-white/70">
            <div class="flex items-center gap-2">
                <div class="h-7 w-7 rounded-full healing-gradient flex items-center justify-center text-white text-xs font-bold">
                    {{ strtoupper(substr($article->author->name ?? 'C', 0, 1)) }}
                </div>
                <span class="font-medium text-white/90">{{ $article->author->name ?? 'Comclusives' }}</span>
            </div>
            <span class="opacity-40">/</span>
            <span>{{ $article->published_at->translatedFormat('d F Y') }}</span>
            <span class="opacity-40">/</span>
            <span>{{ max(1, (int)(str_word_count(strip_tags($article->content)) / 200)) }} min de lecture</span>
        </div>
    </div>
</div>

{{-- ══ BODY ══ --}}
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="md:grid md:grid-cols-12 md:gap-10">

            {{-- ── Main content ── --}}
            <main class="md:col-span-8">

                {{-- Breadcrumb --}}
                <nav class="text-xs text-gray-400 mb-8 flex items-center gap-1.5 flex-wrap">
                    <a href="{{ route('home') }}" class="hover:text-primary transition">Accueil</a>
                    <span>/</span>
                    <a href="{{ route('blog.index') }}" class="hover:text-primary transition">Blog</a>
                    <span>/</span>
                    <span class="text-gray-500">{{ $article->title }}</span>
                </nav>

                {{-- Excerpt --}}
                @if($article->excerpt)
                <div class="mb-8 p-5 rounded-2xl border-l-4 border-primary" style="background:#f0faf9">
                    <p class="text-base text-gray-700 italic leading-relaxed">{!! html_entity_decode(html_entity_decode($article->excerpt)) !!}</p>
                </div>
                @endif

                {{-- Article body --}}
                <div class="article-prose">
                    {!! $article->content !!}
                </div>


                {{-- Author bio --}}
                <div class="mt-10 p-6 rounded-2xl border border-gray-100 bg-gray-50/50 flex items-start gap-5">
                    <div class="h-16 w-16 rounded-full healing-gradient flex items-center justify-center text-white text-xl font-bold shrink-0">
                        {{ strtoupper(substr($article->author->name ?? 'C', 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-bold text-base text-gray-900">{{ $article->author->name ?? 'Comclusives' }}</p>
                        <p class="text-xs text-primary font-semibold mb-2 uppercase tracking-wider">Rédaction Comclusives</p>
                        <p class="text-sm text-gray-500 leading-relaxed">Comclusives favorise la communication inclusive, la diversité et l'égalité des chances à travers des articles, formations et initiatives humaines.</p>
                    </div>
                </div>

                {{-- Prev / Next --}}
                <div class="flex flex-col sm:flex-row gap-4 mt-10">
                    @if($prev ?? null)
                    <a href="{{ route('blog.show', $prev->slug) }}"
                       class="flex-1 flex items-center gap-3 p-4 rounded-2xl border border-gray-100 hover:border-primary hover:shadow-sm transition group">
                        @if($prev->cover_url)
                        <img src="{{ $prev->cover_url }}" class="h-14 w-14 rounded-xl object-cover shrink-0" alt="">
                        @endif
                        <div class="min-w-0">
                            <p class="text-xs text-gray-400 mb-1 flex items-center gap-1"><i data-lucide="arrow-left" class="h-3 w-3"></i> Article précédent</p>
                            <p class="text-sm font-semibold text-gray-800 group-hover:text-primary transition line-clamp-2">{{ $prev->title }}</p>
                        </div>
                    </a>
                    @endif
                    @if($next ?? null)
                    <a href="{{ route('blog.show', $next->slug) }}"
                       class="flex-1 flex items-center gap-3 p-4 rounded-2xl border border-gray-100 hover:border-primary hover:shadow-sm transition group text-right justify-end">
                        <div class="min-w-0">
                            <p class="text-xs text-gray-400 mb-1 flex items-center justify-end gap-1">Article suivant <i data-lucide="arrow-right" class="h-3 w-3"></i></p>
                            <p class="text-sm font-semibold text-gray-800 group-hover:text-primary transition line-clamp-2">{{ $next->title }}</p>
                        </div>
                        @if($next->cover_url)
                        <img src="{{ $next->cover_url }}" class="h-14 w-14 rounded-xl object-cover shrink-0" alt="">
                        @endif
                    </a>
                    @endif
                </div>

                {{-- Comments --}}
                <div class="mt-12 pt-8 border-t border-gray-100" id="commentaires">
                    <div class="mx-auto w-full" style="max-width:min(100%,600px)">
                        <div class="flex items-center gap-3 mb-8">
                            <h2 class="text-xl font-bold" style="font-family:Outfit,sans-serif">Commentaires</h2>
                            <span class="text-sm text-gray-400 font-medium" id="commentCount"></span>
                        </div>
                        @auth
                        <div class="flex gap-3 mb-8">
                            <div class="h-10 w-10 rounded-full healing-gradient shrink-0 flex items-center justify-center text-white font-bold text-sm select-none">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                            <div class="flex-1">
                                <input id="commentNameInput" type="hidden" value="{{ auth()->user()->name }}" />
                                <input id="commentEmailInput" type="hidden" value="{{ auth()->user()->email }}" />
                                <p class="text-xs text-gray-400 mb-2 font-medium">{{ auth()->user()->name }}</p>
                                <textarea id="commentInput" rows="1" placeholder="Ajouter un commentaire public..."
                                          class="w-full px-0 py-1 border-b border-gray-200 bg-transparent text-sm focus:outline-none focus:border-primary transition resize-none leading-relaxed"
                                          style="overflow:hidden"></textarea>
                                <div id="commentActions" class="hidden flex justify-end gap-2 mt-3">
                                    <button id="cancelComment" class="px-4 py-2 rounded-full text-sm font-semibold text-gray-400 hover:bg-gray-50 transition">Annuler</button>
                                    <button id="submitComment" class="px-4 py-2 rounded-full text-sm font-semibold text-white healing-gradient opacity-40 transition" disabled>Commenter</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div onclick="showLoginPrompt('login')" class="flex gap-3 mb-8 p-4 rounded-2xl bg-gray-50 border border-gray-100 items-center cursor-pointer hover:border-primary/30 transition">
                            <div class="h-10 w-10 rounded-full bg-gray-200 shrink-0 flex items-center justify-center text-gray-400 font-bold text-sm">?</div>
                            <div class="flex-1 text-sm text-gray-400">Ajouter un commentaire public...</div>
                        </div>
                        @endauth
                        <div id="commentsList" class="space-y-5"></div>
                    </div>
                </div>

            </main>

            {{-- ── Sidebar ── --}}
            <aside class="article-sidebar md:col-span-4">
                <div class="lg:sticky lg:top-24 space-y-8">

                    {{-- Featured / top article --}}
                    @if(isset($related) && $related->count())
                    @php $featured = $related->first(); @endphp
                    <div class="rounded-2xl overflow-hidden border border-gray-100">
                        @if($featured->cover_url)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $featured->cover_url }}" alt="" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                @foreach($featured->categories->take(1) as $c)
                                <span class="text-xs font-bold uppercase tracking-wider px-2 py-1 rounded" style="background:#0a6b63;color:#fff">{{ $c->name }}</span>
                                @endforeach
                                <a href="{{ route('blog.show', $featured->slug) }}"
                                   class="block text-white font-bold text-sm mt-2 leading-snug hover:underline">
                                    {{ $featured->title }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- Popular Posts --}}
                    @if(isset($popular) && $popular->count())
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4 pb-2 border-b border-gray-100">Articles populaires</h3>
                        <div class="space-y-4">
                            @foreach($popular as $pop)
                            <a href="{{ route('blog.show', $pop->slug) }}" class="popular-post flex gap-3 group">
                                @if($pop->cover_url)
                                <img src="{{ $pop->cover_url }}" alt=""
                                     class="h-16 w-16 rounded-xl object-cover shrink-0">
                                @else
                                <div class="h-16 w-16 rounded-xl healing-gradient shrink-0 flex items-center justify-center">
                                    <i data-lucide="image" class="h-5 w-5 text-white/60"></i>
                                </div>
                                @endif
                                <div class="min-w-0">
                                    <p class="popular-title text-sm font-semibold text-gray-800 leading-snug line-clamp-2 transition">{{ $pop->title }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $pop->published_at->format('d/m/Y') }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Categories --}}
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-widest text-gray-400 mb-4 pb-2 border-b border-gray-100">Catégories</h3>
                        <div class="space-y-2">
                            @foreach($categories as $cat)
                            <a href="{{ route('blog.index', ['cat'=>$cat->slug]) }}"
                               class="flex items-center justify-between py-2 text-sm text-gray-600 hover:text-primary transition group">
                                <span class="flex items-center gap-2">
                                    <span class="h-2 w-2 rounded-full" style="background:{{ $cat->color }}"></span>
                                    {{ $cat->name }}
                                </span>
                                <i data-lucide="chevron-right" class="h-3.5 w-3.5 text-gray-300 group-hover:text-primary transition"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Newsletter --}}
                    <div class="rounded-2xl p-5 healing-gradient text-white">
                        <h3 class="font-bold text-sm mb-1" style="font-family:Outfit,sans-serif">Newsletter</h3>
                        <p class="text-white/70 text-xs mb-4">Recevez nos prochains articles dans votre boîte mail.</p>
                        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-2">
                            @csrf
                            <input type="email" name="email" required placeholder="votre@email.com"
                                   class="w-full px-3 py-2 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 text-sm focus:outline-none focus:border-white transition">
                            <button type="submit"
                                    class="w-full py-2 rounded-xl bg-white text-sm font-semibold hover:bg-white/90 transition"
                                    style="color:#0a6b63">
                                S'abonner
                            </button>
                        </form>
                    </div>

                </div>
            </aside>

        </div>
    </div>
</div>

{{-- Newsletter mobile only --}}
<div class="md:hidden px-4 py-8">
    <div class="rounded-2xl p-5 healing-gradient text-white">
        <h3 class="font-bold text-sm mb-1" style="font-family:Outfit,sans-serif">Newsletter</h3>
        <p class="text-white/70 text-xs mb-4">Recevez nos prochains articles dans votre boîte mail.</p>
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex gap-2">
            @csrf
            <input type="email" name="email" required placeholder="votre@email.com"
                   class="flex-1 px-3 py-2 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 text-sm focus:outline-none">
            <button type="submit" class="px-4 py-2 rounded-xl bg-white text-sm font-semibold" style="color:#0a6b63">OK</button>
        </form>
    </div>
</div>

{{-- ARTICLES SUGGÉRÉS --}}
@if(isset($related) && $related->count())
<section class="section-padding bg-soft/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-8">Lire aussi</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $rel)
            <a href="{{ route('blog.show', $rel->slug) }}"
               class="card-treatment hover:-translate-y-1 hover:shadow-soft overflow-hidden p-0 flex flex-col group">
                {{-- Image --}}
                <div class="relative overflow-hidden" style="aspect-ratio:16/9">
                    @if($rel->cover_url)
                    <img src="{{ $rel->cover_url }}" alt="{{ $rel->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                    <div class="w-full h-full healing-gradient flex items-center justify-center">
                        <i data-lucide="image" class="h-8 w-8 text-white/60"></i>
                    </div>
                    @endif
                </div>
                {{-- Content --}}
                <div class="p-5 flex flex-col flex-1">
                    @foreach($rel->categories->take(1) as $c)
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold mb-3 w-fit"
                          style="background:{{ $c->color }}20;color:{{ $c->color }}">
                        {{ $c->name }}
                    </span>
                    @endforeach
                    <h3 class="font-bold text-gray-900 leading-snug mb-2 group-hover:text-primary transition line-clamp-2">
                        {{ $rel->title }}
                    </h3>
                    @if($rel->excerpt)
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4">
                        {{ $rel->excerpt }}
                    </p>
                    @endif
                    <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-50">
                        <span class="text-xs text-gray-400">{{ $rel->published_at->format('d M Y') }}</span>
                        <span class="text-xs font-semibold text-primary inline-flex items-center gap-1">
                            Lire <i data-lucide="arrow-right" class="h-3 w-3"></i>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Share floating button --}}
<button id="shareBtn" class="fixed left-6 z-40 flex items-center gap-2 px-5 py-3 rounded-full text-white text-sm font-semibold shadow-lg hover:scale-105 transition-all" style="bottom:max(1.5rem, calc(env(safe-area-inset-bottom, 0px) + 70px));background:linear-gradient(135deg,#0d9488,#6366f1);touch-action:manipulation;-webkit-tap-highlight-color:transparent;cursor:pointer">
    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 12v8a2 2 0 002 2h12a2 2 0 002-2v-8M16 6l-4-4-4 4M12 2v13"/></svg>
    Partager
</button>

{{-- OTP Modal --}}
<div id="otpModal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <div id="otpOverlay" class="absolute inset-0 bg-black/50" style="backdrop-filter:blur(4px)"></div>
    <div class="relative w-full max-w-sm mx-4 bg-white rounded-3xl shadow-2xl p-8 overflow-hidden">
        <div class="text-center mb-6">
            <div style="width:48px;height:4px;background:#0d9488;border-radius:2px;margin:0 auto 20px;"></div>
            <h3 class="font-bold text-xl text-gray-900 mb-1">Vérifiez votre e-mail</h3>
            <p class="text-sm text-gray-500">Un code à 6 chiffres a été envoyé à <strong id="otpEmailDisplay"></strong>. Valable 10 minutes.</p>
        </div>
        <div class="flex gap-2 justify-center mb-4">
            <input id="otpInput" type="text" inputmode="numeric" maxlength="6" placeholder="· · · · · ·"
                   class="w-48 text-center text-2xl font-semibold tracking-widest px-4 py-3 border-2 border-gray-200 rounded-2xl focus:outline-none focus:border-primary transition">
        </div>
        <p id="otpError" class="text-center text-sm text-red-500 mb-4 hidden"></p>
        <button id="otpVerifyBtn" class="w-full px-4 py-3 rounded-full text-sm font-semibold text-white healing-gradient transition">Valider le commentaire</button>
        <button id="otpResendBtn" class="w-full mt-2 px-4 py-3 rounded-full text-sm font-semibold text-gray-400 hover:bg-gray-50 transition">Renvoyer le code</button>
        <button id="otpCancelBtn" class="w-full mt-1 text-xs text-gray-300 hover:text-gray-500 transition py-2">Annuler</button>
    </div>
</div>

{{-- Share Modal --}}
<div id="shareModal" class="fixed inset-0 z-50 hidden items-end sm:items-center justify-center">
    <div id="shareOverlay" class="absolute inset-0 bg-black/50" style="backdrop-filter:blur(4px)"></div>
    <div class="relative w-full sm:max-w-sm mx-auto bg-white rounded-t-3xl sm:rounded-3xl shadow-2xl p-6 pb-8 sm:pb-6" style="animation:slideUp .3s ease">
        <div class="w-10 h-1 rounded-full bg-gray-200 mx-auto mb-5 sm:hidden"></div>
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-lg">Partager cet article</h3>
            <button id="closeShare" class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition"><i data-lucide="x" class="h-4 w-4"></i></button>
        </div>
        <div class="flex items-center gap-3 p-3 rounded-2xl bg-gray-50 mb-6">
            @if($article->cover_url)
            <img src="{{ $article->cover_url }}" alt="" class="h-12 w-12 rounded-xl object-cover shrink-0">
            @else
            <div class="h-12 w-12 rounded-xl healing-gradient flex items-center justify-center shrink-0"><i data-lucide="book-open" class="h-5 w-5 text-white"></i></div>
            @endif
            <div class="min-w-0">
                <p class="text-xs text-gray-400">Comclusives · Blog</p>
                <p class="text-sm font-semibold leading-snug truncate" id="shareArticleTitle">{{ $article->title }}</p>
            </div>
        </div>
        @php $su = urlencode(url()->current()); $st = urlencode($article->title); @endphp
        <div class="grid grid-cols-4 gap-3 mb-6">
            <a id="mShareWhatsapp" href="https://wa.me/?text={{ $st }}%20{{ $su }}" target="_blank" class="flex flex-col items-center gap-1.5 group">
                <span class="h-14 w-14 rounded-2xl flex items-center justify-center text-white transition group-hover:scale-110" style="background:#25D366">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 2C6.477 2 2 6.477 2 12c0 1.99.574 3.848 1.564 5.415L2 22l4.703-1.54A9.96 9.96 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
                </span>
                <span class="text-xs font-medium text-gray-500">WhatsApp</span>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $su }}" target="_blank" class="flex flex-col items-center gap-1.5 group">
                <span class="h-14 w-14 rounded-2xl flex items-center justify-center text-white transition group-hover:scale-110" style="background:#1877F2">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.532-4.697 1.313 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.886v2.27h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
                </span>
                <span class="text-xs font-medium text-gray-500">Facebook</span>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ $su }}&text={{ $st }}" target="_blank" class="flex flex-col items-center gap-1.5 group">
                <span class="h-14 w-14 rounded-2xl flex items-center justify-center text-white transition group-hover:scale-110" style="background:#000">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </span>
                <span class="text-xs font-medium text-gray-500">X</span>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $su }}" target="_blank" class="flex flex-col items-center gap-1.5 group">
                <span class="h-14 w-14 rounded-2xl flex items-center justify-center text-white transition group-hover:scale-110" style="background:#0A66C2">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </span>
                <span class="text-xs font-medium text-gray-500">LinkedIn</span>
            </a>
        </div>
        <button id="copyLinkBtn" onclick="navigator.clipboard?.writeText(location.href).then(()=>{this.textContent='✓ Copié';setTimeout(()=>{this.innerHTML='<i data-lucide=\'link\' class=\'h-4 w-4 inline mr-1\'></i> Copier le lien';if(typeof lucide!=='undefined')lucide.createIcons();},2000)})"
                class="w-full py-3 rounded-2xl border border-gray-200 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition flex items-center justify-center gap-2">
            <i data-lucide="link" class="h-4 w-4"></i> Copier le lien
        </button>
    </div>
</div>

@endsection

@push('scripts')
<script>
const ARTICLE_TITLE = '{{ addslashes($article->title) }}';
const COMMENT_URL = '{{ route("comments.store", $article->slug) }}';
const OTP_URL = '{{ route("comments.send-otp") }}';
const ARTICLE_SLUG = '{{ $article->slug }}';
const CSRF_TOKEN = '{{ csrf_token() }}';

if (typeof lucide !== 'undefined') lucide.createIcons();
        // ===== COMMENTAIRES =====
        const COLORS = ['#0d9488','#6366f1','#f59e0b','#ec4899','#10b981','#3b82f6','#8b5cf6'];
        const COMMENTS = @json($comments);
        const IS_AUTH = @json(auth()->check());
        const AUTH_NAME = @json(auth()->check() ? auth()->user()->name : '');
        let totalComments = COMMENTS.length;

        function initials(name) { return name.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2); }
        function colorFor(name) { let h=0; for(let c of name) h=(h*31+c.charCodeAt(0))%COLORS.length; return COLORS[h]; }

        function buildComment(data, prepend=false) {
            const id = 'c' + Date.now() + Math.random().toString(36).slice(2);
            const div = document.createElement('div');
            div.className = 'group';
            div.id = id;
            if (data.id) div.dataset.commentId = data.id;
            div.innerHTML = `
                <div class="flex gap-3">
                    <div class="h-10 w-10 rounded-full shrink-0 flex items-center justify-center text-white font-bold text-sm select-none" style="background:${colorFor(data.name)}">${initials(data.name)}</div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-baseline gap-2 mb-1">
                            <span class="font-semibold text-sm">${data.name}</span>
                            <span class="text-xs text-muted-foreground">${data.date}</span>
                        </div>
                        <p class="text-sm text-foreground/80 leading-relaxed">${data.text.replace(/</g,'&lt;')}</p>
                        <!-- Actions -->
                        <div class="flex items-center gap-1 mt-2 -ml-1.5">
                            <!-- Like -->
                            <button class="like-btn flex items-center gap-1 px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition" data-liked="false" data-count="${data.likes}">
                                <svg class="h-4 w-4 like-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z"/><path d="M7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"/></svg>
                                <span class="like-count">${data.likes||''}</span>
                            </button>
                            <!-- Dislike -->
                            <button class="dislike-btn flex items-center px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition" data-disliked="false" data-count="${data.dislikes}">
                                <svg class="h-4 w-4 dislike-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 15v4a3 3 0 003 3l4-9V2H5.72a2 2 0 00-2 1.7l-1.38 9a2 2 0 002 2.3H10z"/><path d="M17 2h2.67A2.31 2.31 0 0122 4v7a2.31 2.31 0 01-2.33 2H17"/></svg>
                            </button>
                            <!-- Répondre -->
                            <button class="reply-btn px-2 py-1 rounded-full text-xs font-semibold text-muted-foreground hover:bg-soft hover:text-primary transition ml-1">RÉPONDRE</button>
                        </div>
                        <!-- Zone réponse -->
                        <div class="reply-box hidden mt-3 flex gap-2">
                            <div class="h-8 w-8 rounded-full shrink-0 flex items-center justify-center text-white text-xs font-bold healing-gradient select-none">?</div>
                            <div class="flex-1">
                                <p class="text-xs text-gray-400 mb-1 font-medium auth-reply-name"></p>
                                <textarea placeholder="Ajouter une réponse..." rows="1" class="reply-input w-full px-0 py-0.5 border-b border-border bg-transparent text-sm focus:outline-none focus:border-primary resize-none transition leading-relaxed" style="overflow:hidden"></textarea>
                                <div class="flex justify-end gap-2 mt-2">
                                    <button class="reply-cancel px-3 py-1.5 rounded-full text-xs font-semibold text-foreground/60 hover:bg-soft transition">Annuler</button>
                                    <button class="reply-submit px-3 py-1.5 rounded-full text-xs font-semibold text-white healing-gradient opacity-40 transition" disabled>Répondre</button>
                                </div>
                            </div>
                        </div>
                        <!-- Sous-commentaires -->
                        <div class="replies mt-4 space-y-4 pl-0 border-l-2 border-border ml-0"></div>
                    </div>
                </div>`;
            wireComment(div);
            return div;
        }

        function setLiked(likeBtn) {
            likeBtn.dataset.liked = 'true';
            const icon = likeBtn.querySelector('.like-icon');
            icon.style.fill = '#0d9488';
            icon.style.stroke = '#0d9488';
            likeBtn.classList.add('text-primary');
        }

        function setDisliked(dislikeBtn) {
            dislikeBtn.dataset.disliked = 'true';
            const icon = dislikeBtn.querySelector('.dislike-icon');
            icon.style.fill = '#ef4444';
            icon.style.stroke = '#ef4444';
        }

        function clearDislike(dislikeBtn) {
            dislikeBtn.dataset.disliked = 'false';
            const icon = dislikeBtn.querySelector('.dislike-icon');
            icon.style.fill = 'none';
            icon.style.stroke = 'currentColor';
        }

        function clearLike(likeBtn) {
            likeBtn.dataset.liked = 'false';
            const icon = likeBtn.querySelector('.like-icon');
            icon.style.fill = 'none';
            icon.style.stroke = 'currentColor';
            likeBtn.classList.remove('text-primary');
        }

        // ── Auth Modal ──────────────────────────────────────────────────────────
        const AUTH_CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
        let _authRegisterEmail = null; // stocke l'email en attente de vérification OTP

        function showLoginPrompt(tab) {
            tab = tab || 'login';
            const existing = document.querySelector('[data-auth-overlay]');
            if (existing) existing.remove();
            const overlay = document.createElement('div');
            overlay.style.cssText = 'position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;padding:16px';
            overlay.dataset.authOverlay = '1';
            overlay.innerHTML = `
                <div style="background:#fff;border-radius:24px;padding:32px;max-width:380px;width:100%;box-shadow:0 24px 60px rgba(0,0,0,0.2)">
                    <div style="width:48px;height:4px;background:#0d9488;border-radius:2px;margin:0 auto 24px"></div>
                    <div id="authTabs" style="display:flex;border:1px solid #e5e7eb;border-radius:50px;padding:4px;margin-bottom:24px;gap:4px">
                        <button onclick="switchTab('login')" id="tabLogin" style="flex:1;padding:8px;border-radius:50px;border:none;font-size:13px;font-weight:600;cursor:pointer;background:${tab==='login'?'#0d9488':'transparent'};color:${tab==='login'?'#fff':'#6b7280'}">Connexion</button>
                        <button onclick="switchTab('register')" id="tabRegister" style="flex:1;padding:8px;border-radius:50px;border:none;font-size:13px;font-weight:600;cursor:pointer;background:${tab==='register'?'#0d9488':'transparent'};color:${tab==='register'?'#fff':'#6b7280'}">Inscription</button>
                    </div>
                    <div id="authError" style="display:none;background:#fef2f2;border:1px solid #fecaca;color:#dc2626;border-radius:12px;padding:10px 14px;font-size:13px;margin-bottom:16px"></div>

                    <!-- Étape 1 : formulaire -->
                    <div id="authStep1">
                        <form id="authForm" onsubmit="submitAuth(event)">
                            <input type="hidden" id="authTab" value="${tab}">
                            <div id="fieldName" style="display:${tab==='register'?'block':'none'};margin-bottom:12px">
                                <input name="name" type="text" placeholder="Votre prénom ou pseudo" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;outline:none;box-sizing:border-box" onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e5e7eb'">
                            </div>
                            <div style="margin-bottom:12px">
                                <input name="email" type="email" placeholder="Adresse e-mail" required style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;outline:none;box-sizing:border-box" onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e5e7eb'">
                            </div>
                            <div style="margin-bottom:6px">
                                <input name="password" type="password" placeholder="Mot de passe" required minlength="8" style="width:100%;padding:12px 16px;border:1.5px solid #e5e7eb;border-radius:12px;font-size:14px;outline:none;box-sizing:border-box" onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e5e7eb'">
                            </div>
                            <div id="forgotLink" style="text-align:right;margin-bottom:16px;display:${tab==='login'?'block':'none'}">
                                <a href="/forgot-password" style="font-size:12px;color:#0d9488;text-decoration:none">Mot de passe oublié ?</a>
                            </div>
                            <div id="forgotSpacer" style="height:16px;display:${tab==='register'?'block':'none'}"></div>
                            <button type="submit" id="authSubmitBtn" style="width:100%;padding:13px;background:#0d9488;color:#fff;border:none;border-radius:50px;font-size:14px;font-weight:600;cursor:pointer">${tab==='login'?'Se connecter':'Envoyer le code'}</button>
                        </form>
                    </div>

                    <!-- Étape 2 : OTP inscription -->
                    <div id="authStep2" style="display:none">
                        <p id="authOtpDesc" style="font-size:13px;color:#6b7280;text-align:center;margin-bottom:16px"></p>
                        <input id="authOtpInput" type="text" inputmode="numeric" maxlength="6" placeholder="· · · · · ·"
                               style="width:100%;padding:14px;text-align:center;letter-spacing:.5em;font-size:1.2rem;font-weight:700;border:1.5px solid #e5e7eb;border-radius:12px;outline:none;box-sizing:border-box;margin-bottom:16px"
                               onfocus="this.style.borderColor='#0d9488'" onblur="this.style.borderColor='#e5e7eb'">
                        <button id="authOtpVerifyBtn" onclick="verifyRegisterOtp()" style="width:100%;padding:13px;background:#0d9488;color:#fff;border:none;border-radius:50px;font-size:14px;font-weight:600;cursor:pointer">Créer mon compte</button>
                        <button onclick="showStep1()" style="display:block;width:100%;margin-top:10px;font-size:12px;color:#9ca3af;background:none;border:none;cursor:pointer;text-align:center">← Modifier mes informations</button>
                    </div>

                    <button onclick="document.querySelector('[data-auth-overlay]').remove()" style="display:block;width:100%;margin-top:16px;font-size:13px;color:#9ca3af;background:none;border:none;cursor:pointer;text-align:center">Fermer</button>
                </div>`;
            overlay.addEventListener('click', e => { if (e.target === overlay) overlay.remove(); });
            document.body.appendChild(overlay);
        }

        function showStep1() {
            document.getElementById('authStep1').style.display = 'block';
            document.getElementById('authStep2').style.display = 'none';
            document.getElementById('authError').style.display = 'none';
        }

        function switchTab(t) {
            document.getElementById('authTab').value = t;
            document.getElementById('fieldName').style.display = t === 'register' ? 'block' : 'none';
            document.getElementById('forgotLink').style.display = t === 'login' ? 'block' : 'none';
            document.getElementById('forgotSpacer').style.display = t === 'register' ? 'block' : 'none';
            document.getElementById('authSubmitBtn').textContent = t === 'login' ? 'Se connecter' : 'Envoyer le code';
            document.getElementById('tabLogin').style.cssText += ';background:' + (t==='login'?'#0d9488':'transparent') + ';color:' + (t==='login'?'#fff':'#6b7280');
            document.getElementById('tabRegister').style.cssText += ';background:' + (t==='register'?'#0d9488':'transparent') + ';color:' + (t==='register'?'#fff':'#6b7280');
            document.getElementById('authError').style.display = 'none';
            showStep1();
        }

        async function submitAuth(e) {
            e.preventDefault();
            const tab = document.getElementById('authTab').value;
            const form = e.target;
            const btn = document.getElementById('authSubmitBtn');
            const errDiv = document.getElementById('authError');
            errDiv.style.display = 'none';
            btn.disabled = true; btn.textContent = '…';

            if (tab === 'register') {
                // Étape 1 inscription : envoyer OTP
                try {
                    const res = await fetch('/inscription/send-otp', {
                        method: 'POST',
                        headers: {'Content-Type':'application/json','X-CSRF-TOKEN':AUTH_CSRF,'Accept':'application/json'},
                        body: JSON.stringify({ name: form.name.value, email: form.email.value, password: form.password.value })
                    });
                    const json = await res.json().catch(() => ({}));
                    if (!res.ok) {
                        const msg = json.message || (json.errors ? Object.values(json.errors).flat().join(' ') : 'Erreur.');
                        errDiv.textContent = msg; errDiv.style.display = 'block';
                        btn.disabled = false; btn.textContent = 'Envoyer le code';
                        return;
                    }
                    _authRegisterEmail = form.email.value;
                    const masked = form.email.value.replace(/(.{2})(.*)(@.*)/, (_, a, b, c) => a + '*'.repeat(Math.max(2, b.length)) + c);
                    document.getElementById('authOtpDesc').innerHTML = 'Un code à 6 chiffres a été envoyé à <strong>' + masked + '</strong>. Valable 10 minutes.';
                    document.getElementById('authStep1').style.display = 'none';
                    document.getElementById('authStep2').style.display = 'block';
                    document.getElementById('authTabs').style.display = 'none';
                    document.getElementById('authOtpInput').value = '';
                    document.getElementById('authOtpInput').focus();
                } catch(err) {
                    errDiv.textContent = 'Erreur réseau.'; errDiv.style.display = 'block';
                    btn.disabled = false; btn.textContent = 'Envoyer le code';
                }
                return;
            }

            // Connexion
            try {
                const res = await fetch('/login', {
                    method: 'POST',
                    headers: {'Content-Type':'application/json','X-CSRF-TOKEN':AUTH_CSRF,'Accept':'application/json'},
                    body: JSON.stringify({ email: form.email.value, password: form.password.value })
                });
                if (res.ok || res.redirected) {
                    sessionStorage.clear();
                    window.location.href = window.location.href.split('#')[0] + '#commentaires';
                    window.location.reload();
                    return;
                }
                const json = await res.json().catch(() => ({}));
                const msg = json.message || (json.errors ? Object.values(json.errors).flat().join(' ') : 'Identifiants incorrects.');
                errDiv.textContent = msg; errDiv.style.display = 'block';
                btn.disabled = false; btn.textContent = 'Se connecter';
            } catch(err) {
                errDiv.textContent = 'Erreur réseau.'; errDiv.style.display = 'block';
                btn.disabled = false; btn.textContent = 'Se connecter';
            }
        }

        async function verifyRegisterOtp() {
            const btn = document.getElementById('authOtpVerifyBtn');
            const errDiv = document.getElementById('authError');
            const otp = document.getElementById('authOtpInput').value.trim();
            if (otp.length !== 6) { errDiv.textContent = 'Entrez le code à 6 chiffres.'; errDiv.style.display = 'block'; return; }
            btn.disabled = true; btn.textContent = '…';
            errDiv.style.display = 'none';
            try {
                const res = await fetch('/inscription', {
                    method: 'POST',
                    headers: {'Content-Type':'application/json','X-CSRF-TOKEN':AUTH_CSRF,'Accept':'application/json'},
                    body: JSON.stringify({ email: _authRegisterEmail, otp })
                });
                const json = await res.json().catch(() => ({}));
                if (!res.ok) {
                    errDiv.textContent = json.message || 'Code incorrect ou expiré.'; errDiv.style.display = 'block';
                    btn.disabled = false; btn.textContent = 'Créer mon compte';
                    return;
                }
                sessionStorage.clear();
                window.location.href = window.location.href.split('#')[0] + '#commentaires';
                window.location.reload();
            } catch(err) {
                errDiv.textContent = 'Erreur réseau.'; errDiv.style.display = 'block';
                btn.disabled = false; btn.textContent = 'Créer mon compte';
            }
        }

        function wireComment(div) {
            const likeBtn = div.querySelector('.like-btn');
            const dislikeBtn = div.querySelector('.dislike-btn');
            const replyBtn = div.querySelector('.reply-btn');
            const replyBox = div.querySelector('.reply-box');
            const replyCancel = div.querySelector('.reply-cancel');
            const replySubmit = div.querySelector('.reply-submit');
            const replyInput = div.querySelector('.reply-input');
            const authReplyName = div.querySelector('.auth-reply-name');
            if (authReplyName) authReplyName.textContent = AUTH_NAME;
            const repliesDiv = div.querySelector('.replies');

            // Restaurer l'état liked depuis localStorage
            const commentId = div.dataset.commentId;
            if (commentId && localStorage.getItem('liked_' + commentId)) {
                setLiked(likeBtn);
            }

            async function sendLike(action) {
                const res = await fetch(`/comments/${commentId}/like`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': CSRF_TOKEN, 'Accept': 'application/json', 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action })
                });
                if (res.status === 401) return { error: 'login_required' };
                return res.json();
            }

            // Like toggle
            likeBtn.addEventListener('click', async function() {
                if (!IS_AUTH) { showLoginPrompt(); return; }
                if (!commentId) return;
                const alreadyLiked = this.dataset.liked === 'true';
                try {
                    const json = await sendLike(alreadyLiked ? 'unlike' : 'like');
                    if (json.error === 'login_required') { showLoginPrompt(); return; }
                    this.querySelector('.like-count').textContent = json.likes || '';
                    if (json.liked) {
                        localStorage.setItem('liked_' + commentId, '1');
                        setLiked(this);
                        clearDislike(dislikeBtn);
                    } else {
                        localStorage.removeItem('liked_' + commentId);
                        clearLike(this);
                    }
                } catch(e) {}
            });

            // Dislike toggle
            dislikeBtn.addEventListener('click', async function() {
                if (!IS_AUTH) { showLoginPrompt(); return; }
                const disliked = this.dataset.disliked === 'true';
                if (likeBtn.dataset.liked === 'true' && commentId) {
                    try {
                        const json = await sendLike('unlike');
                        if (json.error === 'login_required') { showLoginPrompt(); return; }
                        likeBtn.querySelector('.like-count').textContent = json.likes || '';
                        localStorage.removeItem('liked_' + commentId);
                        clearLike(likeBtn);
                    } catch(e) {}
                }
                if (disliked) {
                    clearDislike(this);
                } else {
                    setDisliked(this);
                }
            });

            // Répondre
            replyBtn.addEventListener('click', () => {
                replyBox.classList.toggle('hidden');
                if (!replyBox.classList.contains('hidden')) replyInput.focus();
            });
            replyCancel.addEventListener('click', () => { replyBox.classList.add('hidden'); replyInput.value=''; replySubmit.disabled=true; replySubmit.classList.add('opacity-40'); });
            replyInput.addEventListener('input', function() {
                replySubmit.disabled = !this.value.trim();
                replySubmit.classList.toggle('opacity-40', !this.value.trim());
                this.style.height='auto'; this.style.height=Math.min(this.scrollHeight,100)+'px';
            });
            replySubmit.addEventListener('click', () => {
                const txt = replyInput.value.trim();
                const nm = AUTH_NAME || 'Anonyme';
                if (!txt) return;
                const rDiv = document.createElement('div');
                rDiv.className = 'flex gap-3';
                rDiv.innerHTML = `
                    <div class="h-8 w-8 rounded-full shrink-0 flex items-center justify-center text-white text-xs font-bold" style="background:${colorFor(nm)}">${initials(nm)}</div>
                    <div class="flex-1">
                        <div class="flex items-baseline gap-2 mb-0.5"><span class="font-semibold text-sm">${nm}</span><span class="text-xs text-muted-foreground">à l'instant</span></div>
                        <p class="text-sm text-foreground/80 leading-relaxed">${txt.replace(/</g,'&lt;')}</p>
                        <div class="flex items-center gap-1 mt-1.5 -ml-1.5">
                            <button class="flex items-center gap-1 px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition"><svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3H14z"/><path d="M7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3"/></svg></button>
                            <button class="flex items-center px-2 py-1 rounded-full text-xs text-muted-foreground hover:bg-soft transition"><svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 15v4a3 3 0 003 3l4-9V2H5.72a2 2 0 00-2 1.7l-1.38 9a2 2 0 002 2.3H10z"/><path d="M17 2h2.67A2.31 2.31 0 0122 4v7a2.31 2.31 0 01-2.33 2H17"/></svg></button>
                        </div>
                    </div>`;
                repliesDiv.appendChild(rDiv);
                replyBox.classList.add('hidden'); replyInput.value='';
                replySubmit.disabled=true; replySubmit.classList.add('opacity-40');
                totalComments++;
                document.getElementById('commentCount').textContent = totalComments + ' commentaires';
            });
        }

        // Charger commentaires depuis la base
        const commentsList = document.getElementById('commentsList');
        COMMENTS.forEach(d => commentsList.appendChild(buildComment(d)));

        // Nouveau commentaire principal (seulement si l'utilisateur est connecté)
        const commentInput = document.getElementById('commentInput');
        const commentNameInput = document.getElementById('commentNameInput');
        const commentActions = document.getElementById('commentActions');
        const submitComment = document.getElementById('submitComment');
        const cancelComment = document.getElementById('cancelComment');
        const commentEmailInput = document.getElementById('commentEmailInput');

        // Nettoyer tout sessionStorage résiduel
        sessionStorage.removeItem('pendingComment');

        if (commentInput) {
        commentInput.addEventListener('focus', () => {
            commentActions.classList.remove('hidden');
        });
        commentInput.addEventListener('input', function() {
            const ok = this.value.trim();
            submitComment.disabled = !ok;
            submitComment.classList.toggle('opacity-40', !ok);
            this.style.height='auto'; this.style.height=Math.min(this.scrollHeight,120)+'px';
        });
        cancelComment.addEventListener('click', () => {
            commentActions.classList.add('hidden');
            commentInput.value=''; commentInput.style.height='auto';
            submitComment.disabled=true; submitComment.classList.add('opacity-40');
        });

        // OTP state
        let pendingComment = null;

        submitComment.addEventListener('click', async () => {
            const txt = commentInput.value.trim();
            const nm = commentNameInput.value.trim() || 'Anonyme';
            const em = commentEmailInput.value.trim();
            if (!txt) return;
            submitComment.disabled = true;
            submitComment.textContent = 'Envoi…';

            // Utilisateur connecté : soumission directe sans OTP
            if (IS_AUTH) {
                try {
                    const res = await fetch(COMMENT_URL, {
                        method: 'POST',
                        headers: {'Content-Type':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'Accept':'application/json'},
                        body: JSON.stringify({ body: txt })
                    });
                    if (!res.ok) throw new Error();
                    const el = buildComment({ name: nm, text: txt, date: "à l'instant (en attente de modération)", likes: 0 });
                    commentsList.prepend(el);
                    totalComments++;
                    document.getElementById('commentCount').textContent = totalComments + ' commentaire' + (totalComments > 1 ? 's' : '');
                    cancelComment.click();
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                } catch(e) {
                    submitComment.textContent = 'Commenter';
                    submitComment.disabled = false;
                }
                return;
            }

            // Visiteur : OTP anti-spam
            if (!em) return;
            try {
                const res = await fetch(OTP_URL, {
                    method: 'POST',
                    headers: {'Content-Type':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'Accept':'application/json'},
                    body: JSON.stringify({ author_name: nm, author_email: em, body: txt, slug: ARTICLE_SLUG })
                });
                if (!res.ok) throw new Error();
                pendingComment = { name: nm, email: em, text: txt };
                const maskedEmail = em.replace(/(.{2})(.*)(@.*)/, (_, a, b, c) => a + '*'.repeat(Math.max(2, b.length)) + c);
                document.getElementById('otpEmailDisplay').textContent = maskedEmail;
                document.getElementById('otpModal').classList.remove('hidden');
                document.getElementById('otpModal').classList.add('flex');
                document.getElementById('otpInput').value = '';
                document.getElementById('otpError').classList.add('hidden');
                document.getElementById('otpInput').focus();
            } catch(e) {
                submitComment.textContent = 'Commenter';
                submitComment.disabled = false;
            }
        });

        // OTP modal
        function closeOtpModal() {
            document.getElementById('otpModal').classList.add('hidden');
            document.getElementById('otpModal').classList.remove('flex');
            submitComment.textContent = 'Commenter';
            submitComment.disabled = false;
        }
        document.getElementById('otpCancelBtn').addEventListener('click', closeOtpModal);
        document.getElementById('otpOverlay').addEventListener('click', closeOtpModal);

        document.getElementById('otpResendBtn').addEventListener('click', async () => {
            if (!pendingComment) return;
            const btn = document.getElementById('otpResendBtn');
            btn.textContent = 'Envoi…'; btn.disabled = true;
            await fetch(OTP_URL, {
                method: 'POST',
                headers: {'Content-Type':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'Accept':'application/json'},
                body: JSON.stringify({ author_name: pendingComment.name, author_email: pendingComment.email, body: pendingComment.text, slug: ARTICLE_SLUG })
            });
            btn.textContent = 'Code renvoyé'; setTimeout(() => { btn.textContent = 'Renvoyer le code'; btn.disabled = false; }, 3000);
        });

        document.getElementById('otpVerifyBtn').addEventListener('click', async () => {
            const code = document.getElementById('otpInput').value.trim();
            if (code.length !== 6) return;
            const btn = document.getElementById('otpVerifyBtn');
            btn.textContent = 'Vérification…'; btn.disabled = true;
            try {
                const res = await fetch(COMMENT_URL, {
                    method: 'POST',
                    headers: {'Content-Type':'application/json','X-CSRF-TOKEN':CSRF_TOKEN,'Accept':'application/json'},
                    body: JSON.stringify({ author_name: pendingComment.name, author_email: pendingComment.email, body: pendingComment.text, otp: code })
                });
                if (!res.ok) {
                    const data = await res.json();
                    const err = document.getElementById('otpError');
                    err.textContent = data.error || 'Code incorrect.';
                    err.classList.remove('hidden');
                    btn.textContent = 'Valider le commentaire'; btn.disabled = false;
                    return;
                }
                closeOtpModal();
                const el = buildComment({ name: pendingComment.name, text: pendingComment.text, date: "à l'instant (en attente de modération)", likes: 0 });
                commentsList.prepend(el);
                totalComments++;
                document.getElementById('commentCount').textContent = totalComments + ' commentaires';
                cancelComment.click();
                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                pendingComment = null;
            } catch(e) {
                btn.textContent = 'Valider le commentaire'; btn.disabled = false;
            }
        });

        document.getElementById('otpInput').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') document.getElementById('otpVerifyBtn').click();
        });

        // === MODAL PARTAGE ===
        const shareBtn = document.getElementById('shareBtn');
        const shareModal = document.getElementById('shareModal');
        const shareOverlay = document.getElementById('shareOverlay');
        const closeShare = document.getElementById('closeShare');
        const rawUrl = window.location.href;
        function openShareModal() { shareModal.classList.remove('hidden'); shareModal.classList.add('flex'); document.body.style.overflow='hidden'; }
        function closeShareModal() { shareModal.classList.add('hidden'); shareModal.classList.remove('flex'); document.body.style.overflow=''; }
        shareBtn.addEventListener('click', function() {
            if (typeof navigator.share === 'function') {
                navigator.share({
                    title: '{{ addslashes($article->title) }}',
                    text: '{{ addslashes(Str::limit(strip_tags($article->excerpt ?? ''), 100)) }}',
                    url: window.location.href
                }).catch(function(e) {
                    if (e.name !== 'AbortError') openShareModal();
                });
            } else {
                openShareModal();
            }
        });
        closeShare.addEventListener('click', closeShareModal);
        shareOverlay.addEventListener('click', closeShareModal);
        const mCopyLink = document.getElementById('mCopyLink');
        if (mCopyLink) mCopyLink.addEventListener('click', () => {
            navigator.clipboard.writeText(rawUrl).then(() => {
                const lbl = document.getElementById('copyLinkLabel');
                const inner = document.getElementById('copyLinkInner');
                if (lbl) lbl.textContent = '✓ Lien copié !';
                if (inner) { inner.classList.add('border-primary','text-primary'); setTimeout(() => { inner.classList.remove('border-primary','text-primary'); if(lbl) lbl.textContent='Copier le lien'; }, 2500); }
            });
        });        // Touche Entrée pour soumettre (Shift+Entrée = nouvelle ligne)
        commentInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); if (!submitComment.disabled) document.getElementById('commentForm').requestSubmit(); }
        });
        } // end if (commentInput)

        // shareArticleTitle already rendered server-side

</script>
@endpush
