@extends('layouts.app')

@section('title', 'Mentions légales – Comclusives')
@section('meta_description', 'Mentions légales du site Comclusives.')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 py-16">

    <div style="height:4px;width:48px;background:#0d9488;border-radius:2px;margin-bottom:32px;"></div>
    <h1 class="text-4xl font-bold mb-2">Mentions légales</h1>
    <p class="text-gray-400 text-sm mb-12">Dernière mise à jour : octobre 2025</p>

    <div class="prose prose-gray max-w-none space-y-10 text-gray-700 leading-relaxed">

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">1. Éditeur du site</h2>
            <ul class="space-y-1">
                <li><strong>Nom du site :</strong> Comclusives</li>
                <li><strong>Responsable de publication :</strong> Franel Tovidjale</li>
                <li><strong>Adresse :</strong> Cotonou, Bénin</li>
                <li><strong>Email :</strong> <a href="mailto:contact@comclusives.com" class="text-primary hover:underline">contact@comclusives.com</a></li>
                <li><strong>Téléphone :</strong> +229 0197004726</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">2. Hébergeur</h2>
            <ul class="space-y-1">
                <li><strong>Hébergeur :</strong> LWS (Ligne Web Services)</li>
                <li><strong>Adresse :</strong> 2 rue Jules Ferry, 88190 Golbey, France</li>
                <li><strong>Site web :</strong> <a href="https://www.lws.fr" target="_blank" rel="noopener" class="text-primary hover:underline">www.lws.fr</a></li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">3. Propriété intellectuelle</h2>
            <p>L'ensemble du contenu publié sur Comclusives (textes, images, logos) est protégé par le droit d'auteur et appartient à leurs auteurs respectifs. Toute reproduction, même partielle, est interdite sans autorisation préalable écrite.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">4. Responsabilité</h2>
            <p>Comclusives s'efforce de fournir des informations exactes et à jour. Toutefois, nous ne pouvons garantir l'exactitude, la complétude ou l'actualité des informations diffusées. L'utilisation des informations du site se fait sous la responsabilité exclusive du visiteur.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">5. Liens hypertextes</h2>
            <p>Le site peut contenir des liens vers des sites tiers. Comclusives n'est pas responsable du contenu de ces sites et ne les contrôle pas.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">6. Droit applicable</h2>
            <p>Les présentes mentions légales sont régies par le droit béninois. En cas de litige, les tribunaux de Cotonou, Bénin, sont seuls compétents.</p>
        </section>

    </div>
</div>
@endsection
