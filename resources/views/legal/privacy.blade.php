@extends('layouts.app')
@section('title', 'Politique de confidentialité – Comclusives')

@section('content')
<section class="relative -mt-20 pt-20 overflow-hidden hero-gradient">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center py-20 lg:py-24">
        <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/70 text-xs font-semibold text-primary uppercase tracking-wider mb-6" style="backdrop-filter:blur(10px)">Légal</span>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight leading-tight mb-4">Politique de confidentialité</h1>
        <p class="text-sm text-muted-foreground">Dernière mise à jour : octobre 2025</p>
    </div>
</section>
<div class="max-w-2xl mx-auto px-4 sm:px-6 py-16">
    @php
    $sections = [
        ['num'=>'01', 'title'=>'Qui sommes-nous ?', 'content'=>'
            <p>Comclusives est un blog dédié à la communication inclusive, la diversité et l\'égalité des chances, édité par Franel Tovidjale, basé à Cotonou, Bénin.</p>
            <p>Contact : <a href="mailto:contact@comclusives.com" class="text-primary hover:underline font-medium">contact@comclusives.com</a></p>
        '],
        ['num'=>'02', 'title'=>'Données collectées', 'content'=>'
            <p class="mb-3">Nous collectons les données suivantes :</p>
            <ul>
                <li><strong>Adresse e-mail</strong> — lors de l\'inscription à la newsletter ou d\'un commentaire (vérification OTP).</li>
                <li><strong>Nom ou prénom</strong> — facultatif, fourni lors de l\'inscription ou d\'un commentaire.</li>
                <li><strong>Contenu du commentaire</strong> — texte soumis pour publication sur nos articles.</li>
                <li><strong>Données de navigation</strong> — adresse IP, navigateur, pages visitées (logs serveur).</li>
            </ul>
        '],
        ['num'=>'03', 'title'=>'Finalités du traitement', 'content'=>'
            <ul>
                <li>Envoi de la newsletter (nouveaux articles)</li>
                <li>Vérification de l\'identité pour la publication de commentaires</li>
                <li>Modération des commentaires</li>
                <li>Amélioration du service et sécurité du site</li>
            </ul>
        '],
        ['num'=>'04', 'title'=>'Base légale', 'content'=>'
            <p>Le traitement repose sur votre <strong>consentement explicite</strong> : vous nous fournissez volontairement votre adresse e-mail. Vous pouvez retirer ce consentement à tout moment.</p>
        '],
        ['num'=>'05', 'title'=>'Durée de conservation', 'content'=>'
            <ul>
                <li><strong>Abonnés newsletter</strong> : jusqu\'au désabonnement.</li>
                <li><strong>Commentaires</strong> : conservés tant que l\'article est en ligne.</li>
                <li><strong>Logs serveur</strong> : 30 jours maximum.</li>
            </ul>
        '],
        ['num'=>'06', 'title'=>'Partage des données', 'content'=>'
            <p>Vos données ne sont pas vendues ni partagées avec des tiers à des fins commerciales. Elles peuvent être transmises à nos prestataires techniques (hébergeur LWS, serveur mail) dans le strict cadre du service.</p>
        '],
        ['num'=>'07', 'title'=>'Vos droits', 'content'=>'
            <p class="mb-3">Conformément au RGPD, vous disposez des droits suivants : accès, rectification, effacement, opposition, portabilité.</p>
            <p>Pour exercer ces droits : <a href="mailto:contact@comclusives.com" class="text-primary hover:underline font-medium">contact@comclusives.com</a></p>
            <p class="mt-2">Pour vous désabonner, utilisez le lien en bas de chaque email.</p>
        '],
        ['num'=>'08', 'title'=>'Cookies', 'content'=>'
            <p>Comclusives utilise uniquement des cookies techniques essentiels (session, sécurité CSRF). Aucun cookie publicitaire ou de tracking tiers n\'est utilisé.</p>
        '],
        ['num'=>'09', 'title'=>'Sécurité', 'content'=>'
            <p>Nous mettons en œuvre des mesures appropriées pour protéger vos données : connexion HTTPS, accès restreint, mots de passe hachés.</p>
        '],
        ['num'=>'10', 'title'=>'Modifications', 'content'=>'
            <p>Cette politique peut être mise à jour. La date de modification est indiquée en haut de page. En continuant à utiliser le site, vous acceptez la politique en vigueur.</p>
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
