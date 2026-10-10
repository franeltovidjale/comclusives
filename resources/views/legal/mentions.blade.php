@extends('layouts.app')
@section('title', 'Mentions légales – Comclusives')

@section('content')
<div class="healing-gradient pt-32 pb-16 text-white text-center px-4">
    <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color:#a7f3d0">Légal</p>
    <h1 class="text-4xl sm:text-5xl font-bold mb-3">Mentions légales</h1>
    <p style="color:#a7f3d0" class="text-sm">Dernière mise à jour : octobre 2025</p>
</div>

<div class="max-w-2xl mx-auto px-4 sm:px-6 py-16">
    @php
    $sections = [
        ['num'=>'01', 'title'=>'Éditeur du site', 'content'=>'
            <ul>
                <li><strong>Nom du site :</strong> Comclusives</li>
                <li><strong>Responsable :</strong> Franel Tovidjale</li>
                <li><strong>Adresse :</strong> Cotonou, Bénin</li>
                <li><strong>Email :</strong> <a href="mailto:contact@comclusives.com" class="text-primary hover:underline font-medium">contact@comclusives.com</a></li>
                <li><strong>Téléphone :</strong> +229 0197004726</li>
            </ul>
        '],
        ['num'=>'02', 'title'=>'Hébergeur', 'content'=>'
            <ul>
                <li><strong>Hébergeur :</strong> LWS (Ligne Web Services)</li>
                <li><strong>Adresse :</strong> 2 rue Jules Ferry, 88190 Golbey, France</li>
                <li><strong>Site web :</strong> <a href="https://www.lws.fr" target="_blank" rel="noopener" class="text-primary hover:underline font-medium">www.lws.fr</a></li>
            </ul>
        '],
        ['num'=>'03', 'title'=>'Propriété intellectuelle', 'content'=>'
            <p>L\'ensemble du contenu publié sur Comclusives (textes, images, logos) est protégé par le droit d\'auteur et appartient à leurs auteurs respectifs. Toute reproduction, même partielle, est interdite sans autorisation préalable écrite.</p>
        '],
        ['num'=>'04', 'title'=>'Responsabilité', 'content'=>'
            <p>Comclusives s\'efforce de fournir des informations exactes et à jour. L\'utilisation des informations du site se fait sous la responsabilité exclusive du visiteur.</p>
        '],
        ['num'=>'05', 'title'=>'Liens hypertextes', 'content'=>'
            <p>Le site peut contenir des liens vers des sites tiers. Comclusives n\'est pas responsable du contenu de ces sites et ne les contrôle pas.</p>
        '],
        ['num'=>'06', 'title'=>'Droit applicable', 'content'=>'
            <p>Les présentes mentions légales sont régies par le droit béninois. En cas de litige, les tribunaux de Cotonou, Bénin, sont seuls compétents.</p>
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
