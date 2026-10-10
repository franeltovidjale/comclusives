<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Admin') – Comclusives</title>
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" defer></script>
    <style>
        :root { --sidebar-w: 260px; }
        body { font-family: 'Inter', sans-serif; background: #f8fafb; }

        .admin-sidebar {
            width: var(--sidebar-w);
            position: fixed; top: 0; bottom: 0; left: 0;
            background: #0f1923;
            display: flex; flex-direction: column;
            z-index: 50;
            transition: transform .25s ease;
        }

        /* Mobile: sidebar hidden off-screen by default */
        @media (max-width: 1023px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-main { margin-left: 0 !important; }
        }

        .admin-main { margin-left: var(--sidebar-w); min-height: 100vh; }

        .sidebar-overlay {
            display: none;
            position: fixed; inset: 0; background: rgba(0,0,0,.5);
            z-index: 49;
        }
        .sidebar-overlay.open { display: block; }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 20px; border-radius: 12px; margin: 2px 12px;
            font-size: 14px; font-weight: 500;
            color: rgba(255,255,255,0.6);
            transition: all .2s;
            text-decoration: none;
        }
        .nav-item:hover { background: rgba(255,255,255,0.07); color: #fff; }
        .nav-item.active { background: linear-gradient(135deg,#0a6b63,#14b89e); color: #fff; }
        .nav-item svg { width: 18px; height: 18px; flex-shrink: 0; }
        .stat-card { background: #fff; border-radius: 16px; padding: 24px; border: 1px solid #eef0f3; transition: transform .2s, box-shadow .2s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,0,0,.07); }
        .badge-count { display: inline-flex; align-items: center; justify-content: center; min-width: 20px; height: 20px; border-radius: 10px; background: #ef4444; color: #fff; font-size: 11px; font-weight: 700; padding: 0 5px; }
    </style>
    @stack('head')
</head>
<body>

<!-- Overlay mobile -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <div class="px-6 py-6 border-b border-white/10">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/logo-icon.png') }}" alt="Comclusives" class="h-10 w-10 rounded-xl object-cover shadow-soft">
            <div>
                <p class="text-white font-bold text-base leading-none" style="font-family:Outfit,sans-serif">Com<span style="color:#14b89e">clusives</span></p>
                <p class="text-white/40 text-xs mt-0.5">Administration</p>
            </div>
        </a>
    </div>

    <nav class="flex-1 py-4 overflow-y-auto">
        <p class="px-6 text-xs font-semibold uppercase tracking-widest text-white/30 mb-3">Menu</p>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i data-lucide="layout-dashboard"></i> Tableau de bord
        </a>
        <a href="{{ route('admin.articles.index') }}" class="nav-item {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
            <i data-lucide="file-text"></i> Articles
        </a>
        <a href="{{ route('admin.comments.index') }}" class="nav-item {{ request()->routeIs('admin.comments*') ? 'active' : '' }}">
            <i data-lucide="message-square"></i>
            <span>Commentaires</span>
            @php $pendingCount = \App\Models\Comment::where('approved',false)->count(); @endphp
            @if($pendingCount > 0)
                <span class="badge-count ml-auto">{{ $pendingCount }}</span>
            @endif
        </a>
        <div class="my-4 border-t border-white/10 mx-4"></div>
        <p class="px-6 text-xs font-semibold uppercase tracking-widest text-white/30 mb-3">Site</p>
        <a href="{{ route('home') }}" target="_blank" class="nav-item">
            <i data-lucide="external-link"></i> Voir le site
        </a>
    </nav>

    <div class="px-4 py-4 border-t border-white/10">
        <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-3 py-3 rounded-xl bg-white/5 mb-3 hover:bg-white/10 transition group">
            <div class="h-9 w-9 rounded-full healing-gradient flex items-center justify-center text-white font-bold text-sm shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-white/40 text-xs truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
            <i data-lucide="settings" class="h-4 w-4 text-white/30 group-hover:text-white/60 shrink-0 transition"></i>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-item w-full text-left" style="color:rgba(239,68,68,.8)">
                <i data-lucide="log-out"></i> Déconnexion
            </button>
        </form>
    </div>
</aside>

<!-- Main -->
<div class="admin-main">
    <!-- Topbar -->
    <header class="bg-white border-b border-gray-100 px-4 sm:px-8 h-16 flex items-center justify-between sticky top-0 z-30 shadow-sm">
        <div class="flex items-center gap-3">
            <!-- Hamburger (mobile only) -->
            <button onclick="openSidebar()" class="lg:hidden p-2 rounded-xl hover:bg-gray-100 transition">
                <i data-lucide="menu" class="h-5 w-5"></i>
            </button>
            <h1 class="text-base sm:text-lg font-bold" style="font-family:Outfit,sans-serif">@yield('page-title','Dashboard')</h1>
        </div>
        <div class="flex items-center gap-2 sm:gap-3">
            @yield('topbar-actions')
        </div>
    </header>

    @if(session('success'))
    <div class="mx-4 sm:mx-8 mt-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-2">
        <i data-lucide="check-circle" class="h-4 w-4 shrink-0"></i> {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mx-4 sm:mx-8 mt-5 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-center gap-2">
        <i data-lucide="alert-circle" class="h-4 w-4 shrink-0"></i> {{ session('error') }}
    </div>
    @endif

    <main class="px-4 sm:px-8 py-6 sm:py-8">
        @yield('content')
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => { if(typeof lucide !== 'undefined') lucide.createIcons(); });
    function openSidebar() {
        document.getElementById('adminSidebar').classList.add('open');
        document.getElementById('sidebarOverlay').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeSidebar() {
        document.getElementById('adminSidebar').classList.remove('open');
        document.getElementById('sidebarOverlay').classList.remove('open');
        document.body.style.overflow = '';
    }
</script>
@stack('scripts')
</body>
</html>
