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
                <form id="newsletterForm" class="flex flex-col sm:flex-row gap-2 max-w-sm w-full">
                    <input type="email" id="newsletterEmail" required placeholder="Votre adresse e-mail" class="flex-1 w-full px-4 py-3 rounded-full bg-white/10 border border-white/15 placeholder-white/50 text-sm focus:outline-none focus:border-primary transition">
                    <button type="submit" id="newsletterBtn" class="btn-primary text-sm px-5 whitespace-nowrap">S'abonner</button>
                </form>
                <p id="newsletterMsg" class="text-sm hidden text-center" style="color:#0d9488"></p>
                <script>
                document.getElementById('newsletterForm').addEventListener('submit', async function(e) {
                    e.preventDefault();
                    const email = document.getElementById('newsletterEmail').value.trim();
                    const btn = document.getElementById('newsletterBtn');
                    const msg = document.getElementById('newsletterMsg');
                    btn.disabled = true; btn.textContent = '...';
                    try {
                        const res = await fetch('{{ route("newsletter.subscribe") }}', {
                            method: 'POST',
                            headers: {'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}','Accept':'application/json'},
                            body: JSON.stringify({ email })
                        });
                        const data = await res.json();
                        msg.textContent = data.message ?? 'Vérifiez votre boîte mail pour confirmer votre abonnement.';
                        msg.className = 'text-sm text-center';
                        document.getElementById('newsletterEmail').value = '';
                    } catch(e) {
                        msg.textContent = 'Une erreur est survenue, réessayez.';
                        msg.className = 'text-sm text-red-400';
                    }
                    btn.disabled = false; btn.textContent = "S'abonner";
                });
                </script>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 pb-20 md:pb-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm text-secondary-foreground/50">
            <p class="text-center md:text-left">© 2025 Comclusives – Tous droits réservés.</p>
            <div class="flex flex-wrap justify-center gap-4 text-xs text-secondary-foreground/60">
                <a href="{{ route('privacy') }}" class="hover:text-secondary-foreground/80 transition">Confidentialité</a>
                <a href="{{ route('mentions') }}" class="hover:text-secondary-foreground/80 transition">Mentions légales</a>
                <a href="{{ route('terms') }}" class="hover:text-secondary-foreground/80 transition">CGU</a>
                <a href="{{ route('login') }}" class="text-secondary-foreground/40 hover:text-secondary-foreground/60 transition flex items-center gap-1">
                    <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Admin
                </a>
            </div>
        </div>
    </div>
</footer>
