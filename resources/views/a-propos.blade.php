@extends('layouts.app')
@section('title','À propos')
@section('content')


        <!-- HERO -->
        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 text-center" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                    <i data-lucide="info" class="h-3.5 w-3.5"></i> À propos de nous
                </span>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight mt-6 mb-6">
                    Communiquer autrement,<br><span class="text-primary">pour inclure mieux</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Comclusives est une initiative engagée pour une éducation et une communication inclusives, fondée par Silas Jekinnou, enseignant de FLE, communicateur et consultant en éducation.
                </p>
            </div>
        </section>

        <!-- FONDATEUR -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-14 items-center">
                <div class="relative" data-aos="fade-right">
                    <img src="{{ asset('images/silasjek.png') }}"
                         alt="Silas Jekinnou – Fondateur de Comclusives"
                         class="rounded-[2rem] shadow-soft w-full h-[480px] object-cover object-top" />
                    <div class="absolute bottom-6 right-6 bg-card rounded-2xl shadow-card p-5">
                        <p class="text-3xl font-bold text-primary">2023</p>
                        <p class="text-xs text-muted-foreground">Fondé à Cotonou, Bénin</p>
                    </div>
                </div>
                <div data-aos="fade-left">
                    <span class="text-xs uppercase tracking-widest text-primary font-semibold">Le fondateur</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-3 mb-5">Silas Jekinnou</h2>
                    <p class="text-muted-foreground mb-4">Enseignant de FLE, communicateur et consultant en éducation, Silas Jekinnou place l'inclusion au cœur de ses actions : rendre la connaissance accessible à tous, valoriser chaque voix et créer des passerelles entre les langues, les cultures et les idées.</p>
                    <p class="text-muted-foreground mb-6">À travers Comclusives, il œuvre pour une société où la différence n'est plus un obstacle, mais une richesse.</p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Enseignant de Français Langue Étrangère (FLE)</span></li>
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Communicateur et consultant en éducation</span></li>
                        <li class="flex gap-3 items-start"><i data-lucide="check-circle-2" class="h-5 w-5 text-primary mt-0.5 shrink-0"></i><span class="text-foreground/85">Militant pour l'inclusion et l'égalité des chances</span></li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- CHIFFRES -->
        <section class="py-16 bg-secondary text-secondary-foreground">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div data-aos="zoom-in" data-aos-delay="0">
                    <p class="text-4xl md:text-5xl font-bold text-accent">1k+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Enseignants sensibilisés</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="80">
                    <p class="text-4xl md:text-5xl font-bold text-accent">80+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Ressources créées</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="160">
                    <p class="text-4xl md:text-5xl font-bold text-accent">5+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Pays touchés</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="240">
                    <p class="text-4xl md:text-5xl font-bold text-accent">70+</p>
                    <p class="text-sm text-secondary-foreground/70 mt-2">Membres engagés</p>
                </div>
            </div>
        </section>

        <!-- DOMAINES D'ACTION -->
        <section class="section-padding bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Nos domaines</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Nos domaines d'action</h2>
                    <p class="mt-4 text-muted-foreground">Quatre axes pour agir concrètement en faveur de l'inclusion.</p>
                </div>
                <div class="grid sm:grid-cols-2 gap-6 mt-12">
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft flex gap-5" data-aos="fade-up" data-aos-delay="0">
                        <div class="h-12 w-12 shrink-0 rounded-xl healing-gradient text-primary-foreground flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="h-5 w-5"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Formation et inclusion linguistique</h3>
                            <p class="text-sm text-muted-foreground">Cours de français pour anglophones et formations pour éducateurs sur les pratiques inclusives.</p>
                        </div>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft flex gap-5" data-aos="fade-up" data-aos-delay="80">
                        <div class="h-12 w-12 shrink-0 rounded-xl healing-gradient text-primary-foreground flex items-center justify-center">
                            <i data-lucide="briefcase" class="h-5 w-5"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Communication et consulting</h3>
                            <p class="text-sm text-muted-foreground">Accompagnement des structures éducatives dans leur transition vers une communication plus inclusive.</p>
                        </div>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft flex gap-5" data-aos="fade-up" data-aos-delay="160">
                        <div class="h-12 w-12 shrink-0 rounded-xl healing-gradient text-primary-foreground flex items-center justify-center">
                            <i data-lucide="book" class="h-5 w-5"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Édition de mini-guides pédagogiques</h3>
                            <p class="text-sm text-muted-foreground">Des ressources pratiques, accessibles et adaptées aux réalités du terrain.</p>
                        </div>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft flex gap-5" data-aos="fade-up" data-aos-delay="240">
                        <div class="h-12 w-12 shrink-0 rounded-xl healing-gradient text-primary-foreground flex items-center justify-center">
                            <i data-lucide="video" class="h-5 w-5"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-1">Production de contenus</h3>
                            <p class="text-sm text-muted-foreground">Articles, vidéos et podcasts pour sensibiliser un large public aux enjeux de l'inclusion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NOTRE HISTOIRE (timeline) -->
        <section class="section-padding">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-14" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Chronologie</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Notre histoire</h2>
                    <p class="mt-4 text-muted-foreground max-w-xl mx-auto">Fondée sur la conviction que chaque voix mérite d'être entendue, Comclusives s'est construite pas à pas, un contenu, un partenariat et une communauté à la fois.</p>
                </div>

                <div class="relative">
                    <!-- Ligne centrale -->
                    <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 -translate-x-1/2" style="background:linear-gradient(to bottom,color-mix(in oklab,var(--primary) 20%,transparent),var(--primary),color-mix(in oklab,var(--primary) 20%,transparent))"></div>

                    <div class="space-y-12">
                        <!-- 2023 gauche -->
                        <div class="relative grid md:grid-cols-2 gap-6 items-center" data-aos="fade-right">
                            <div class="md:text-right">
                                <span class="text-2xl font-bold text-primary">2023</span>
                                <h3 class="text-xl font-semibold mt-1 mb-2">Les débuts</h3>
                                <p class="text-sm text-muted-foreground">Silas Jekinnou fonde Comclusives à Cotonou, Bénin. L'initiative naît d'un constat : l'inclusion passe avant tout par les mots, les images et les représentations. Premier articles publiés sur la communication inclusive.</p>
                            </div>
                            <div class="hidden md:flex justify-start pl-8">
                                <div class="h-5 w-5 rounded-full healing-gradient shadow-soft ring-4 ring-background -ml-[10px]"></div>
                            </div>
                        </div>

                        <!-- 2024 droite -->
                        <div class="relative grid md:grid-cols-2 gap-6 items-center" data-aos="fade-left">
                            <div class="hidden md:flex justify-end pr-8">
                                <div class="h-5 w-5 rounded-full healing-gradient shadow-soft ring-4 ring-background -mr-[10px]"></div>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-primary">2024</span>
                                <h3 class="text-xl font-semibold mt-1 mb-2">Croissance du blog</h3>
                                <p class="text-sm text-muted-foreground">Le blog se développe avec de nouvelles thématiques : éducation, égalité, inclusion, langue française. Lancement des ressources pédagogiques et des mini-guides. Plus de 80 ressources créées.</p>
                            </div>
                        </div>

                        <!-- 2025 gauche -->
                        <div class="relative grid md:grid-cols-2 gap-6 items-center" data-aos="fade-right">
                            <div class="md:text-right">
                                <span class="text-2xl font-bold text-primary">2025</span>
                                <h3 class="text-xl font-semibold mt-1 mb-2">Communauté engagée</h3>
                                <p class="text-sm text-muted-foreground">Lancement de la chaîne WhatsApp, plus de 70 membres actifs, 5+ pays touchés et plus de 1 000 enseignants sensibilisés. Comclusives devient une référence francophone sur l'inclusion.</p>
                            </div>
                            <div class="hidden md:flex justify-start pl-8">
                                <div class="h-5 w-5 rounded-full healing-gradient shadow-soft ring-4 ring-background -ml-[10px]"></div>
                            </div>
                        </div>

                        <!-- Aujourd'hui droite -->
                        <div class="relative grid md:grid-cols-2 gap-6 items-center" data-aos="fade-left">
                            <div class="hidden md:flex justify-end pr-8">
                                <div class="h-5 w-5 rounded-full bg-accent shadow-soft ring-4 ring-background -mr-[10px]"></div>
                            </div>
                            <div>
                                <span class="text-2xl font-bold text-accent">Aujourd'hui</span>
                                <h3 class="text-xl font-semibold mt-1 mb-2">En pleine expansion</h3>
                                <p class="text-sm text-muted-foreground">Nouveau site, nouvelles rubriques, et une vision toujours plus large : faire de l'inclusion une réalité concrète pour toutes et tous, partout dans le monde francophone.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- À LA UNE SUR LE BLOG -->
        <section class="section-padding bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-12" data-aos="fade-up">
                    <div>
                        <span class="text-xs uppercase tracking-widest font-semibold text-primary flex items-center gap-2"><i data-lucide="newspaper" class="h-3.5 w-3.5"></i> Nos derniers articles</span>
                        <h2 class="text-3xl md:text-4xl font-bold mt-2">À la une sur le blog</h2>
                    </div>
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-primary text-primary font-semibold text-sm hover:bg-primary hover:text-white transition shrink-0">
                        Voir tous les articles <i data-lucide="arrow-right" class="h-4 w-4"></i>
                    </a>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft overflow-hidden p-0" data-aos="fade-up" data-aos-delay="0">
                        <img src="{{ asset('images/Nouveau-projet-1.png') }}" alt="Les armes de ma mère" class="w-full h-48 object-cover" onerror="this.src='https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-1.png'" />
                        <div class="p-6">
                            <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Éducation</span>
                            <h3 class="font-bold text-base mt-3 mb-2 leading-snug">Les armes de ma mère : de la punition d'hier à l'éducation d'aujourd'hui</h3>
                            <a href="{{ route('blog.show', 'les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-primary">Lire <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                        </div>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft overflow-hidden p-0" data-aos="fade-up" data-aos-delay="80">
                        <img src="{{ asset('images/Nouveau-projet-2.png') }}" alt="Stop aux fautes" class="w-full h-48 object-cover" onerror="this.src='https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-2.png'" />
                        <div class="p-6">
                            <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Communication inclusive</span>
                            <h3 class="font-bold text-base mt-3 mb-2 leading-snug">Stop aux fautes ! 10 expressions mal utilisées</h3>
                            <a href="{{ route('blog.show', 'stop-aux-fautes-10-expressions-mal-utilisees') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-primary">Lire <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                        </div>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft overflow-hidden p-0" data-aos="fade-up" data-aos-delay="160">
                        <img src="{{ asset('images/New-Project-5.png') }}" alt="Des affiches qui excluent" class="w-full h-48 object-cover" onerror="this.src='https://comclusives.com/wp-content/uploads/2025/09/New-Project-5.png'" />
                        <div class="p-6">
                            <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Égalité</span>
                            <h3 class="font-bold text-base mt-3 mb-2 leading-snug">Des affiches qui séduisent... mais qui excluent</h3>
                            <a href="{{ route('blog.show', 'des-affiches-qui-seduisent-mais-qui-excluent') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-primary">Lire <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="section-padding">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[2.5rem] healing-gradient p-12 md:p-16 text-center text-primary-foreground shadow-soft" data-aos="zoom-in">
                    <div class="absolute inset-0 opacity-20" style="background:radial-gradient(circle at 20% 20%,white,transparent 40%),radial-gradient(circle at 80% 80%,white,transparent 40%)"></div>
                    <div class="relative">
                        <h2 class="text-4xl md:text-5xl font-bold max-w-2xl mx-auto leading-tight">Vous voulez collaborer avec nous ?</h2>
                        <p class="mt-5 opacity-90 max-w-xl mx-auto">Un projet, un partenariat, une idée à partager ? Nous sommes là pour en discuter.</p>
                        <div class="flex flex-wrap justify-center gap-3 mt-8">
                            <a class='inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white text-primary font-semibold hover:scale-105 transition' href="{{ route('contact') }}">Nous contacter <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full border border-white/40 hover:bg-white/10 font-semibold transition"><i data-lucide="book-open" class="h-4 w-4"></i> Lire le blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
@endsection
