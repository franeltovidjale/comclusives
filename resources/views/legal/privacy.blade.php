@extends('layouts.app')

@section('title', 'Politique de confidentialité – Comclusives')
@section('meta_description', 'Politique de confidentialité de Comclusives. Comment nous collectons et protégeons vos données personnelles.')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 py-16">

    <div style="height:4px;width:48px;background:#0d9488;border-radius:2px;margin-bottom:32px;"></div>
    <h1 class="text-4xl font-bold mb-2">Politique de confidentialité</h1>
    <p class="text-gray-400 text-sm mb-12">Dernière mise à jour : octobre 2025</p>

    <div class="prose prose-gray max-w-none space-y-10 text-gray-700 leading-relaxed">

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">1. Qui sommes-nous ?</h2>
            <p>Comclusives est un blog dédié à la communication inclusive, la diversité et l'égalité des chances, édité par Franel Tovidjale, basé à Cotonou, Bénin. Vous pouvez nous contacter à : <a href="mailto:contact@comclusives.com" class="text-primary hover:underline">contact@comclusives.com</a>.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">2. Données collectées</h2>
            <p>Nous collectons les données suivantes :</p>
            <ul class="list-disc pl-6 space-y-2 mt-3">
                <li><strong>Adresse e-mail</strong> — lors de l'inscription à la newsletter ou lors de la soumission d'un commentaire (vérification OTP).</li>
                <li><strong>Nom ou prénom</strong> — facultatif, fourni lors de l'inscription ou d'un commentaire.</li>
                <li><strong>Contenu du commentaire</strong> — texte soumis pour publication sur nos articles.</li>
                <li><strong>Données de navigation</strong> — adresse IP, navigateur, pages visitées (via logs serveur).</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">3. Finalités du traitement</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li>Envoi de la newsletter (nouveaux articles)</li>
                <li>Vérification de l'identité pour la publication de commentaires</li>
                <li>Modération des commentaires</li>
                <li>Amélioration du service et sécurité du site</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">4. Base légale</h2>
            <p>Le traitement de vos données repose sur votre <strong>consentement explicite</strong> : vous nous fournissez volontairement votre adresse e-mail pour recevoir la newsletter ou publier un commentaire. Vous pouvez retirer ce consentement à tout moment.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">5. Durée de conservation</h2>
            <ul class="list-disc pl-6 space-y-2">
                <li><strong>Abonnés newsletter</strong> : jusqu'au désabonnement.</li>
                <li><strong>Commentaires</strong> : conservés tant que l'article est en ligne.</li>
                <li><strong>Logs serveur</strong> : 30 jours maximum.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">6. Partage des données</h2>
            <p>Vos données ne sont pas vendues ni partagées avec des tiers à des fins commerciales. Elles peuvent être transmises à nos prestataires techniques (hébergeur LWS, serveur mail) dans le strict cadre de la fourniture du service.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">7. Vos droits</h2>
            <p>Conformément au RGPD, vous disposez des droits suivants :</p>
            <ul class="list-disc pl-6 space-y-2 mt-3">
                <li>Droit d'accès à vos données</li>
                <li>Droit de rectification</li>
                <li>Droit à l'effacement ("droit à l'oubli")</li>
                <li>Droit d'opposition au traitement</li>
                <li>Droit à la portabilité</li>
            </ul>
            <p class="mt-3">Pour exercer ces droits, contactez-nous à : <a href="mailto:contact@comclusives.com" class="text-primary hover:underline">contact@comclusives.com</a>.</p>
            <p class="mt-2">Pour vous désabonner de la newsletter, utilisez le lien présent en bas de chaque email.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">8. Cookies</h2>
            <p>Comclusives utilise des cookies techniques essentiels au fonctionnement du site (session, sécurité CSRF). Aucun cookie publicitaire ou de tracking tiers n'est utilisé.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">9. Sécurité</h2>
            <p>Nous mettons en œuvre des mesures techniques appropriées pour protéger vos données : connexion HTTPS, accès restreint aux données, mots de passe hachés.</p>
        </section>

        <section>
            <h2 class="text-xl font-bold text-gray-900 mb-3">10. Modifications</h2>
            <p>Cette politique peut être mise à jour. La date de dernière modification est indiquée en haut de cette page. En continuant à utiliser le site après modification, vous acceptez la nouvelle politique.</p>
        </section>

    </div>
</div>
@endsection
