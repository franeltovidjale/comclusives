<footer class="relative bg-secondary text-secondary-foreground mt-20 overflow-hidden">
    <div class="footer-glow-top"></div>
    <div class="h-1 w-full healing-gradient"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
        <div class="grid gap-10 lg:grid-cols-12">
            <div class="lg:col-span-4 space-y-5">
                <a class="flex items-center gap-2" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-icon.png') }}" alt="Comclusives" class="h-11 w-11 rounded-2xl object-cover shadow-soft">
                    <span class="text-2xl font-bold tracking-tight" style="font-family:Outfit,sans-serif">Com<span class="text-accent">clusives</span></span>
                </a>
                <p class="text-secondary-foreground/70 max-w-sm leading-relaxed">Comclusives favorise la communication inclusive, la diversité et l'égalité des chances.</p>
                <form class="flex gap-2 max-w-sm" method="POST" action="{{ route('newsletter.subscribe') }}">
                    @csrf
                    <input type="email" name="email" required placeholder="Votre adresse e-mail" class="flex-1 px-4 py-3 rounded-full bg-white/10 border border-white/15 placeholder-white/50 text-sm focus:outline-none focus:border-primary transition">
                    <button class="btn-primary text-sm px-5">S'abonner</button>
                </form>
                @if(session('newsletter_success'))
                    <p class="text-green-400 text-sm">{{ session('newsletter_success') }}</p>
                @endif
            </div>
            <div class="lg:col-span-2">
                <h4 class="font-semibold text-sm uppercase tracking-wider mb-5 text-accent" style="font-family:Outfit,sans-serif">Navigation</h4>
                <ul class="space-y-3 text-sm text-secondary-foreground/70">
                    <li><a class="footer-link-hover inline-flex items-center gap-1.5" href="{{ route('home') }}"><span class="footer-accent-dot"></span>Accueil</a></li>
                    <li><a class="footer-link-hover inline-flex items-center gap-1.5" href="{{ route('blog.index') }}"><span class="footer-accent-dot"></span>Blog</a></li>
                    <li><a class="footer-link-hover inline-flex items-center gap-1.5" href="{{ route('learn-french') }}"><span class="footer-accent-dot"></span>Learn French</a></li>
                    <li><a class="footer-link-hover inline-flex items-center gap-1.5" href="{{ route('contact') }}"><span class="footer-accent-dot"></span>Contact</a></li>
                </ul>
            </div>
            <div class="lg:col-span-2">
                <h4 class="font-semibold text-sm uppercase tracking-wider mb-5 text-accent" style="font-family:Outfit,sans-serif">Catégories</h4>
                <ul class="space-y-3 text-sm text-secondary-foreground/70">
                    @foreach(\App\Models\Category::all() as $cat)
                    <li><a class="footer-link-hover inline-flex items-center gap-1.5" href="{{ route('blog.index', ['cat'=>$cat->slug]) }}"><span class="footer-accent-dot"></span>{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="lg:col-span-4">
                <h4 class="font-semibold text-sm uppercase tracking-wider mb-5 text-accent" style="font-family:Outfit,sans-serif">Contact</h4>
                <ul class="space-y-4 text-sm text-secondary-foreground/75">
                    <li class="flex gap-3"><i data-lucide="phone" class="h-4 w-4 mt-0.5 text-accent shrink-0"></i><p>+229 0197004726</p></li>
                    <li class="flex gap-3"><i data-lucide="mail" class="h-4 w-4 mt-0.5 text-accent shrink-0"></i><p>contact@comclusives.com</p></li>
                    <li class="flex gap-3"><i data-lucide="map-pin" class="h-4 w-4 mt-0.5 text-accent shrink-0"></i><p>Cotonou, Bénin</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 bg-black/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-secondary-foreground/50">
            <p>© <span id="yr"></span> Comclusives – Tous droits réservés.</p>
        </div>
    </div>
</footer>
