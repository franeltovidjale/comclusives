@extends('layouts.app')
@section('title','Tamtal')
@section('content')

        <section class="relative -mt-20 pt-20 overflow-hidden hero-gradient min-h-[70vh] flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center w-full" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider" style="backdrop-filter:blur(10px)">
                    <i data-lucide="globe" class="h-3.5 w-3.5"></i> Tamtal
                </span>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-tight mt-6 mb-6">
                    Tamtal — <span class="text-primary">bientôt disponible</span>
                </h1>
                <p class="text-lg text-muted-foreground max-w-2xl mx-auto mb-10">
                    Cet espace est en cours de construction. Tamtal sera dédié à la langue, la culture locale et aux ressources pour valoriser la diversité linguistique. Revenez bientôt !
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a class='btn-primary' href='../blog/index.html'>Lire le blog en attendant</a>
                    <a class='btn-outline' href='../contact/index.html'>Nous contacter</a>
                </div>
            </div>
        </section>
    
@endsection
