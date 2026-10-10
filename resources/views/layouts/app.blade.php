<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ── TITLE & DESCRIPTION ── --}}
    <title>@yield('title', 'Comclusives') – Communication inclusive & diversité</title>
    <meta name="description" content="@yield('description', 'Comclusives favorise la communication inclusive, la diversité et l\'égalité des chances à travers des articles, ressources et formations.')">
    <meta name="keywords" content="@yield('keywords', 'communication inclusive, éducation, inclusion, égalité, diversité, Bénin, Comclusives')">
    <meta name="author" content="Comclusives">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- ── OPEN GRAPH (Facebook, LinkedIn, WhatsApp…) ── --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Comclusives">
    <meta property="og:title" content="@yield('og_title', 'Comclusives') – Communication inclusive">
    <meta property="og:description" content="@yield('description', 'Comclusives favorise la communication inclusive, la diversité et l\'égalité des chances.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo-horizontal.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">
    @yield('og_extra')

    {{-- ── TWITTER CARD ── --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@comclusives">
    <meta name="twitter:title" content="@yield('title', 'Comclusives') – Communication inclusive">
    <meta name="twitter:description" content="@yield('description', 'Comclusives favorise la communication inclusive, la diversité et l\'égalité des chances.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo-horizontal.png'))">

    {{-- ── JSON-LD ORGANISATION ── --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Comclusives",
        "url": "{{ config('app.url') }}",
        "logo": "{{ asset('images/logo-icon.png') }}",
        "description": "Comclusives favorise la communication inclusive, la diversité et l'égalité des chances.",
        "contactPoint": {
            "@@type": "ContactPoint",
            "telephone": "+229-0197004726",
            "email": "contact@comclusives.com",
            "contactType": "customer service",
            "areaServed": "BJ",
            "availableLanguage": "French"
        },
        "sameAs": [
            "https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47"
        ],
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Cotonou",
            "addressCountry": "BJ"
        }
    }
    </script>
    {{-- ── FONTS & ASSETS ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('aos.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    {{-- ── FAVICON ── --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-icon.png') }}">

    {{-- ── PWA ── --}}
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0a6b63">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Comclusives">

    @stack('head')
</head>
<body>
    @include('components.header')
    <main>@yield('content')</main>
    @include('components.footer')
    <a href="https://wa.me/22901970047" target="_blank" rel="noopener"
       class="fixed bottom-6 left-6 z-40 h-12 w-12 rounded-full flex items-center justify-center text-white shadow-soft hover:scale-110 transition {{ request()->routeIs('blog.show') ? 'hidden' : '' }}"
       style="background:#0a6b63" title="WhatsApp">
        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 2C6.477 2 2 6.477 2 12c0 1.99.574 3.848 1.564 5.415L2 22l4.703-1.54A9.96 9.96 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
    </a>
    <button id="toTop" class="hidden fixed bottom-6 right-6 z-40 h-12 w-12 rounded-full healing-gradient text-white shadow-soft items-center justify-center hover:scale-110 transition">
        <svg class="h-5 w-5 mx-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 15l-6-6-6 6"/></svg>
    </button>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="{{ asset('aos.js') }}"></script>
    <script>
        lucide.createIcons();
        AOS.init({ duration:700, once:true });
        document.getElementById('yr') && (document.getElementById('yr').textContent = new Date().getFullYear());
        const h = document.getElementById('siteHeader');
        window.addEventListener('scroll', () => {
            h && (window.scrollY > 20 ? h.classList.add('scrolled') : h.classList.remove('scrolled'));
            const t = document.getElementById('toTop');
            if (t) window.scrollY > 400 ? (t.classList.remove('hidden'), t.classList.add('flex')) : (t.classList.add('hidden'), t.classList.remove('flex'));
        });
        document.getElementById('toTop')?.addEventListener('click', () => window.scrollTo({top:0,behavior:'smooth'}));
        document.getElementById('navToggle')?.addEventListener('click', () => document.getElementById('mobileNav').classList.toggle('hidden'));
    </script>
    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => navigator.serviceWorker.register('/sw.js'));
        }
    </script>
</body>
</html>
