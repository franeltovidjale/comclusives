@extends('layouts.app')
@section('title', "Conditions d'utilisation – Comclusives")

@section('content')
<section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center py-20 lg:py-24">
        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider mb-6" style="backdrop-filter:blur(10px)">Légal</span>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight leading-tight mb-4">Conditions d'utilisation</h1>
        <p class="text-sm text-muted-foreground">Dernière mise à jour : octobre 2025</p>
    </div>
</section>
<div class="max-w-2xl mx-auto px-4 sm:px-6 py-16">
    @php
    $sections = [
        ['num'=>'01', 'title'=>'Acceptation des conditions', 'content'=>'
            <p>En accédant et en utilisant le site Comclusives, vous acceptez sans réserve les présentes conditions. Si vous ne les acceptez pas, veuillez ne pas utiliser ce site.</p>
        '],
        ['num'=>'02', 'title'=>'Accès au site', 'content'=>'
            <p>Comclusives est accessible gratuitement à tout utilisateur disposant d\'un accès à internet. Nous nous réservons le droit de modifier, suspendre ou interrompre l\'accès au site à tout moment.</p>
        '],
        ['num'=>'03', 'title'=>'Commentaires', 'content'=>'
            <p class="mb-3">Les commentaires publiés sont soumis aux règles suivantes :</p>
            <ul>
                <li>Respectueux, constructifs et en rapport avec l\'article.</li>
                <li>Interdits : propos haineux, discriminatoires, injurieux, diffamatoires.</li>
                <li>Interdits : spam, publicité non sollicitée, liens malveillants.</li>
                <li>Tout commentaire est soumis à modération avant publication.</li>
            </ul>
            <p class="mt-3">Comclusives se réserve le droit de supprimer tout commentaire sans préavis.</p>
        '],
        ['num'=>'04', 'title'=>'Newsletter', 'content'=>'
            <p>En vous inscrivant, vous acceptez de recevoir nos emails. Vous pouvez vous désabonner à tout moment via le lien en bas de chaque email. Votre adresse ne sera jamais partagée avec des tiers.</p>
        '],
        ['num'=>'05', 'title'=>'Contenu du site', 'content'=>'
            <p>Les articles reflètent les opinions de leurs auteurs et ont pour vocation d\'informer. Ils ne constituent pas des conseils professionnels. Comclusives décline toute responsabilité quant à l\'usage fait des informations publiées.</p>
        '],
        ['num'=>'06', 'title'=>'Propriété intellectuelle', 'content'=>'
            <p>Tout le contenu du site (textes, images, design) est protégé par le droit d\'auteur. Toute reproduction sans autorisation écrite préalable est interdite.</p>
        '],
        ['num'=>'07', 'title'=>'Modification des conditions', 'content'=>'
            <p>Comclusives se réserve le droit de modifier ces conditions à tout moment. Les modifications prennent effet dès leur publication.</p>
        '],
        ['num'=>'08', 'title'=>'Contact', 'content'=>'
            <p>Pour toute question : <a href="mailto:contact@comclusives.com" class="text-primary hover:underline font-medium">contact@comclusives.com</a></p>
        '],
    ];
    @endphp

    <div class="space-y-8">
        @foreach($sections as $s)
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 sm:p-8">
            <div class="flex items-start gap-4">
                <span class="text-xs font-bold text-primary bg-primary/10 rounded-xl px-2.5 py-1 shrink-0 mt-0.5">{{ $s['num'] }}</span>
                <div class="flex-1 min-w-0">
                    <h2 class="text-lg font-bold text-gray-900 mb-3">{{ $s['title'] }}</h2>
                    <div class="text-gray-600 text-sm leading-relaxed space-y-2 legal-content">
                        {!! $s['content'] !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-10 text-center">
        <a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-primary transition">Retour à l'accueil</a>
    </div>
</div>

<style>
.legal-content ul { list-style: none; padding: 0; }
.legal-content ul li { padding: 6px 0 6px 20px; position: relative; border-bottom: 1px solid #f3f4f6; }
.legal-content ul li:last-child { border-bottom: none; }
.legal-content ul li::before { content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; border-radius: 50%; background: #0d9488; }
</style>
@endsection
