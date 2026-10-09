@extends('layouts.app')
@section('title','Learn French')
@section('content')


        <!-- HERO -->
        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 text-center" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                    <i data-lucide="languages" class="h-3.5 w-3.5"></i> Learn French
                </span>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight mt-6 mb-6">
                    Apprendre le français,<br><span class="text-primary">simplement</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto">
                    Des ressources claires et accessibles pour apprendre le français : vocabulaire, grammaire, expressions courantes et conseils pour progresser à votre rythme.
                </p>
            </div>
        </section>

        <!-- CE QU'ON PROPOSE -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Nos ressources</span>
                    <h2 class="text-3xl md:text-5xl font-bold mt-3 leading-tight">Tout pour progresser en français</h2>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft text-center" data-aos="fade-up" data-aos-delay="0">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5 mx-auto"><i data-lucide="book" class="h-6 w-6"></i></div>
                        <h3 class="text-lg font-semibold mb-2">Vocabulaire</h3>
                        <p class="text-muted-foreground text-sm">Apprenez les mots essentiels du quotidien par thématique.</p>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft text-center" data-aos="fade-up" data-aos-delay="80">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5 mx-auto"><i data-lucide="pencil" class="h-6 w-6"></i></div>
                        <h3 class="text-lg font-semibold mb-2">Grammaire</h3>
                        <p class="text-muted-foreground text-sm">Les règles expliquées simplement avec des exemples concrets.</p>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft text-center" data-aos="fade-up" data-aos-delay="160">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5 mx-auto"><i data-lucide="message-square" class="h-6 w-6"></i></div>
                        <h3 class="text-lg font-semibold mb-2">Expressions</h3>
                        <p class="text-muted-foreground text-sm">Idiomes, expressions figées et tournures courantes à maîtriser.</p>
                    </div>
                    <div class="card-treatment group hover:-translate-y-1 hover:shadow-soft text-center" data-aos="fade-up" data-aos-delay="240">
                        <div class="h-14 w-14 rounded-2xl bg-soft flex items-center justify-center text-primary mb-5 mx-auto"><i data-lucide="video" class="h-6 w-6"></i></div>
                        <h3 class="text-lg font-semibold mb-2">Vidéos</h3>
                        <p class="text-muted-foreground text-sm">Retrouvez nos capsules vidéo courtes sur TikTok et YouTube.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- VIDÉOS TIKTOK -->
        <section class="section-padding bg-soft/40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Vidéos</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-3">Nos capsules sur TikTok</h2>
                    <p class="mt-4 text-muted-foreground">Des vidéos courtes pour apprendre une règle, une expression ou un mot par jour.</p>
                </div>
                <div class="flex justify-center" data-aos="fade-up">
                    <div class="bg-card rounded-[2rem] shadow-soft p-8 text-center max-w-md">
                        <div class="h-20 w-20 rounded-2xl bg-soft flex items-center justify-center text-primary mx-auto mb-5">
                            <i data-lucide="play-circle" class="h-10 w-10"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Retrouvez-nous sur TikTok</h3>
                        <p class="text-muted-foreground text-sm mb-6">Abonnez-vous pour recevoir chaque jour une leçon de français accessible à tous les niveaux.</p>
                        <a href="https://www.tiktok.com/@comclusives" target="_blank" rel="noopener" class="btn-primary inline-flex items-center gap-2">
                            <i data-lucide="external-link" class="h-4 w-4"></i> Voir nos vidéos TikTok
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ARTICLES LIÉS -->
        <section class="section-padding">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-10" data-aos="fade-up">
                    <span class="text-xs uppercase tracking-widest font-semibold text-primary">Articles liés</span>
                    <h2 class="text-3xl font-bold mt-3">À lire aussi sur le blog</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="0">
                        <h3 class="font-semibold text-lg mb-2">Stop aux fautes ! 10 expressions mal utilisées</h3>
                        <p class="text-sm text-muted-foreground mb-4">Un tour d'horizon des expressions courantes qui trahissent des confusions linguistiques.</p>
                        <a href="../stop-aux-fautes-10-expressions-mal-utilisees/index.html" class="inline-flex items-center gap-1 text-sm font-semibold text-primary">Lire l'article <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                    <div class="card-treatment hover:-translate-y-1 hover:shadow-soft" data-aos="fade-up" data-aos-delay="80">
                        <h3 class="font-semibold text-lg mb-2">Maïeuticien : le masculin (un peu oublié) de sage-femme</h3>
                        <p class="text-sm text-muted-foreground mb-4">Quand le genre grammatical révèle nos angles morts sur les professions.</p>
                        <a href="../maieuticien-le-masculin-un-peu-oublie-de-sage-femme/index.html" class="inline-flex items-center gap-1 text-sm font-semibold text-primary">Lire l'article <i data-lucide="arrow-right" class="h-3.5 w-3.5"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="section-padding">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative overflow-hidden rounded-[2.5rem] healing-gradient p-12 text-center text-primary-foreground shadow-soft" data-aos="zoom-in">
                    <div class="absolute inset-0 opacity-20" style="background:radial-gradient(circle at 20% 20%,white,transparent 40%)"></div>
                    <div class="relative">
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Des cours de français inclusifs et accessibles</h2>
                        <p class="opacity-90 max-w-xl mx-auto mb-8">Vous souhaitez des cours personnalisés ou du contenu sur mesure pour votre structure ? Contactez-nous.</p>
                        <a class='inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white text-primary font-semibold hover:scale-105 transition' href='../contact/index.html'>Nous contacter <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                    </div>
                </div>
            </div>
        </section>
    
@endsection
