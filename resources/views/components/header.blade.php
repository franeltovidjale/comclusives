<header id="siteHeader" class="fixed top-0 inset-x-0 z-50 transition-all duration-300 {{ request()->routeIs('blog.show') ? 'bg-white shadow-sm' : 'bg-transparent' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
        <a class="flex items-center gap-2 group" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-icon.png') }}" alt="Comclusives" class="h-10 w-10 rounded-2xl object-cover shadow-soft">
            <span class="text-xl font-bold tracking-tight" style="font-family:Outfit,sans-serif">Com<span class="text-primary">clusives</span></span>
        </a>
        <nav class="hidden lg:flex items-center gap-1">
            <a class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('home') ? 'text-primary bg-soft' : 'text-foreground/80 hover:text-primary hover:bg-soft' }} transition" href="{{ route('home') }}">Accueil</a>
            <a class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('about') ? 'text-primary bg-soft' : 'text-foreground/80 hover:text-primary hover:bg-soft' }} transition" href="{{ route('about') }}">À propos</a>
            <a class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('blog.*') ? 'text-primary bg-soft' : 'text-foreground/80 hover:text-primary hover:bg-soft' }} transition" href="{{ route('blog.index') }}">Blog</a>
            <a class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('learn-french') ? 'text-primary bg-soft' : 'text-foreground/80 hover:text-primary hover:bg-soft' }} transition" href="{{ route('learn-french') }}">Learn French</a>
            <a class="px-3 py-2 rounded-full text-sm font-medium {{ request()->routeIs('tamtal') ? 'text-primary bg-soft' : 'text-foreground/80 hover:text-primary hover:bg-soft' }} transition" href="{{ route('tamtal') }}">Tamtal</a>
            <a class="px-3 py-2 rounded-full text-sm font-medium text-foreground/80 hover:text-primary hover:bg-soft transition" href="https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47" target="_blank">Notre chaîne</a>
        </nav>
        <div class="hidden lg:flex items-center gap-3">
            <a class="btn-primary text-sm" href="{{ route('contact') }}">Nous contacter</a>
        </div>
        <button id="navToggle" class="lg:hidden p-2 rounded-xl hover:bg-soft"><i data-lucide="menu" class="h-6 w-6"></i></button>
    </div>
    <div id="mobileNav" class="hidden lg:hidden bg-background/95 border-t border-border" style="backdrop-filter:blur(20px)">
        <div class="px-4 py-4 flex flex-col gap-1">
            <a class="px-4 py-3 rounded-xl {{ request()->routeIs('home') ? 'bg-soft text-primary' : 'text-foreground hover:bg-soft hover:text-primary' }}" href="{{ route('home') }}">Accueil</a>
            <a class="px-4 py-3 rounded-xl {{ request()->routeIs('about') ? 'bg-soft text-primary' : 'text-foreground hover:bg-soft hover:text-primary' }}" href="{{ route('about') }}">À propos</a>
            <a class="px-4 py-3 rounded-xl {{ request()->routeIs('blog.*') ? 'bg-soft text-primary' : 'text-foreground hover:bg-soft hover:text-primary' }}" href="{{ route('blog.index') }}">Blog</a>
            <a class="px-4 py-3 rounded-xl text-foreground hover:bg-soft hover:text-primary" href="{{ route('learn-french') }}">Learn French</a>
            <a class="px-4 py-3 rounded-xl text-foreground hover:bg-soft hover:text-primary" href="{{ route('tamtal') }}">Tamtal</a>
            <a class="px-4 py-3 rounded-xl text-foreground hover:bg-soft hover:text-primary" href="{{ route('contact') }}">Contact</a>
            <a class="btn-primary mt-2" href="{{ route('contact') }}">Nous contacter</a>
        </div>
    </div>
</header>
