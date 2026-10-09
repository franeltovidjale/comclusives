<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();

        // Categories
        $cats = [
            'Communication inclusive' => '#0a6b63',
            'Education'               => '#f59e0b',
            'Egalite'                 => '#6366f1',
            'Inclusion'               => '#ec4899',
        ];
        $catModels = [];
        foreach ($cats as $name => $color) {
            $catModels[$name] = Category::firstOrCreate(
                ['name' => $name],
                ['color' => $color]
            );
        }

        $articles = [
            [
                'title'            => 'Des affiches qui séduisent... mais qui excluent',
                'slug'             => 'des-affiches-qui-seduisent-mais-qui-excluent',
                'excerpt'          => 'Une affiche peut séduire l\'œil tout en excluant certaines personnes du message qu\'elle porte. L\'image publique est rarement neutre.',
                'content'          => '<!-- Fil d\'ariane -->
            <nav class="text-sm text-muted-foreground mb-6 flex items-center gap-2">
                <a href="../index.html" class="hover:text-primary">Accueil</a>
                <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                <a href="../blog/index.html" class="hover:text-primary">Blog</a>
                <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                <span class="text-foreground/60 truncate max-w-[200px]">Des affiches qui séduisent... mais qui excluent</span>
            </nav>

            <!-- Catégories + date -->
            <div class="flex flex-wrap items-center gap-2 mb-4">
                <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Communication inclusive</span><span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Éducation</span><span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Égalité</span><span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Inclusion</span>
                <span class="text-xs text-muted-foreground ml-2">22 octobre 2025</span>
            </div>

            <!-- Titre -->
            <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-6">Des affiches qui séduisent... mais qui excluent</h1>

            <!-- Intro -->
            <p class="text-lg text-muted-foreground leading-relaxed mb-8 border-l-4 border-primary pl-4 italic">Une affiche peut séduire l\'œil tout en excluant certaines personnes du message qu\'elle porte. L\'image publique est rarement neutre.</p>

            <!-- Corps -->
            <div class="article-body">
                <h2>Quand la communication exclut sans le dire</h2>
<p>Les affiches, bannières et visuels de communication sont omniprésents dans notre quotidien. Mais derrière leur apparente neutralité se cachent souvent des choix qui incluent certains profils et en excluent d\'autres.</p>
<p>Une affiche qui ne représente qu\'un seul type de corps, une seule origine, un seul genre envoie un message implicite : ce produit, ce service, cet espace n\'est pas pour tout le monde.</p>
<h2>Les biais visuels dans la communication publique</h2>
<p>Les biais visuels sont subtils mais puissants. Ils se manifestent dans le choix des modèles, des couleurs, des typographies et des mises en scène. Voici quelques exemples courants :</p>
<ul>
<li>La surreprésentation de certains types physiques dans les publicités de santé ou beauté</li>
<li>L\'absence de personnes en situation de handicap dans les communications institutionnelles</li>
<li>Les stéréotypes de genre dans les visuels d\'entreprise (hommes en costume, femmes en rôles de soutien)</li>
<li>Le manque de diversité ethnique dans les représentations de "la famille type"</li>
</ul>
<h2>Vers une communication visuelle inclusive</h2>
<p>Créer une communication inclusive ne signifie pas cocher des cases. C\'est repenser fondamentalement à qui l\'on s\'adresse et comment on représente les personnes dans nos visuels.</p>
<p>Quelques principes simples : diversifier les représentations, tester ses visuels auprès de publics variés, et se poser la question : "Qui voit sa vie dans cette image ?"</p>
<p>L\'inclusion visuelle n\'est pas une contrainte créative — c\'est une opportunité de toucher plus de monde et de construire une communication plus honnête et plus juste.</p>
            </div>

            <!-- Navigation précédent/suivant -->
            <div class="flex justify-between items-center mt-12 pt-8 border-t border-border">
                <a href="../tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion/index.html" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:underline"><i data-lucide="arrow-left" class="h-4 w-4"></i> Article précédent</a>
                <a href="../maieuticien-le-masculin-un-peu-oublie-de-sage-femme/index.html" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:underline">Article suivant <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
            </div>

            <!-- CTA retour blog -->
            <div class="mt-10 text-center">
                <a href="../blog/index.html" class="btn-outline inline-flex items-center gap-2"><i data-lucide="arrow-left" class="h-4 w-4"></i> Retour au blog</a>
            </div>',
                'cover_image' => 'New-Project-5.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-09-01'),
                'category'         => 'Communication inclusive',
            ],
            [
                'title'            => 'Le lévirat : entre tradition et défis pour les droits des femmes',
                'slug'             => 'le-levirat-entre-tradition-et-defis-pour-les-droits-des-femmes',
                'excerpt'          => 'Une société inclusive ne cherche pas à abolir les cultures. Elle cherche à les aligner avec la dignité , la justice et l&#039;équité .',
                'content'          => '<!-- Fil d\'ariane -->
            <nav class="text-sm text-muted-foreground mb-6 flex items-center gap-2">
                <a href="../index.html" class="hover:text-primary">Accueil</a>
                <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                <a href="../blog/index.html" class="hover:text-primary">Blog</a>
                <i data-lucide="chevron-right" class="h-3.5 w-3.5"></i>
                <span class="text-foreground/60 truncate max-w-[200px]">Le lévirat : entre tradition et défis pour les droits des femmes</span>
            </nav>

            <!-- Catégories + date -->
            <div class="flex flex-wrap items-center gap-2 mb-4">
                <span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Égalité</span><span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Inclusion</span><span class="px-2 py-0.5 rounded-full bg-soft text-primary text-xs font-semibold">Communication inclusive</span>
                <span class="text-xs text-muted-foreground ml-2">20 novembre 2025</span>
            </div>

            <!-- Titre -->
            <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-6">Le lévirat : entre tradition et défis pour les droits des femmes</h1>

            <!-- Intro -->
            <p class="text-lg text-muted-foreground leading-relaxed mb-8 border-l-4 border-primary pl-4 italic">Le lévirat reste une réalité dans plusieurs communautés africaines. Cette pratique consiste à proposer — ou parfois imposer — qu\'une veuve épouse l\'un des frères de son mari défunt. Si cette coutume trouvait son sens dans une logique de protection autrefois, elle soulève aujourd\'hui de nombreuses questions.</p>

            <!-- Corps -->
            <div class="article-body">
                <h2>Le sens traditionnel du lévirat</h2>
<p>Le lévirat n\'était pas conçu pour nuire. Son objectif originel était d\'éviter que la femme se retrouve sans protection, d\'assurer que les enfants restent dans la famille paternelle, de préserver le patrimoine et de maintenir la cohésion entre familles alliées. L\'union avec le frère était un prolongement de la solidarité familiale.</p>
<h2>Une réalité asymétrique : le sororat</h2>
<p>Il est important de noter que le sororat — marier la sœur de sa femme décédée — n\'est pratiquement jamais imposé au veuf. Cette asymétrie révèle une réalité : la liberté du veuf est respectée, tandis que la veuve est parfois perçue comme un "bien" devant rester dans la famille du défunt.</p>
<h2>Les dérives contemporaines</h2>
<p>Quand une femme refuse le lévirat, au lieu de respecter son choix, certaines familles réagissent par des sanctions : elle perd les biens du mari, doit quitter le domicile, risque de perdre ses enfants, ou subit des pressions économiques. Dans ces cas, le lévirat n\'est plus un mécanisme protecteur — il devient un outil de domination et de contrôle.</p>
<h2>Ce que disent les lois et droits humains</h2>
<p>Les législations modernes affirment clairement : liberté de choisir son conjoint, égalité entre hommes et femmes, droit de la veuve au domicile du couple, et protection des enfants même après remariage. Tout mariage doit être basé sur le consentement libre et volontaire.</p>
<h2>Comment penser le lévirat dans une société inclusive ?</h2>
<p>L\'enjeu n\'est pas de juger ou d\'attaquer les traditions, mais d\'aider à les faire évoluer sereinement. Il est possible de préserver l\'esprit de solidarité familiale tout en garantissant la liberté de la veuve, en protégeant les enfants indépendamment du remariage, et en accompagnant les familles dans une réflexion sur le consentement.</p>
<p>Les traditions ne disparaissent pas. Elles se transforment quand la dignité humaine devient centrale dans nos valeurs collectives.</p>
            </div>

            <!-- Navigation précédent/suivant -->
            <div class="flex justify-between items-center mt-12 pt-8 border-t border-border">
                <a href="../les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui/index.html" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:underline"><i data-lucide="arrow-left" class="h-4 w-4"></i> Article précédent</a>
                <a href="../violence-numerique-les-mots-a-connaitre/index.html" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:underline">Article suivant <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
            </div>

            <!-- CTA retour blog -->
            <div class="mt-10 text-center">
                <a href="../blog/index.html" class="btn-outline inline-flex items-center gap-2"><i data-lucide="arrow-left" class="h-4 w-4"></i> Retour au blog</a>
            </div>',
                'cover_image' => 'https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-1.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-09-15'),
                'category'         => 'Egalite',
            ],
            [
                'title'            => 'Les armes de ma mère : de la punition à la communication.',
                'slug'             => 'les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui',
                'excerpt'          => 'Nos mères ne cherchaient pas à faire mal. Elles cherchaient à faire grandir.',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/11/12/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-11-12T18:13:13+01:00">12 novembre 2025</time></a><a href="../category/communication-inclusive/index.html"><i class="fa-light fa-book"></i>Communication inclusive</a></div><div><img class="alignnone wp-image-6583 lws-optimize-lazyload"  alt="" width="331" height="441" / data-src="../wp-content/uploads/2025/11/ARMES-225x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/ARMES-225x300.jpeg 225w, https://comclusives.com/wp-content/uploads/2025/11/ARMES-768x1024.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/ARMES.jpeg 960w" sizes="(max-width: 331px) 100vw, 331px" /></div>
<div></div>
<div>Il y a des souvenirs qui ne s’effacent pas. Chez beaucoup d’enfants africains, il suffit d’entendre le mot maman pour que reviennent à la mémoire des scènes à la fois drôles et redoutables : le regard qui tue, le balai levé, la chaussure volante, la gifle qui sort de nulle part… Oui, nos mères avaient des armes. Pas celles des champs de bataille, mais celles du quotidien : des gestes, des regards, des objets ordinaires devenus symboles d’une pédagogie bien à elles.</div>
<div></div>
<div></div>
<div> <strong>Le regard qui parlait plus fort que les mots</strong></div>
<div></div>
<div><img class="alignnone wp-image-6587 lws-optimize-lazyload"  alt="" width="327" height="327" / data-src="../wp-content/uploads/2025/11/regard-300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/regard-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/regard-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/regard-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/regard-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/regard-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/regard.jpeg 1024w" sizes="(max-width: 327px) 100vw, 327px" /></div>
<div></div>
<div>Avant, en Afrique, nos mères n’avaient pas besoin de longues phrases pour nous corriger. Un seul regard suffisait.</div>
<div>Il y avait le regard numéro un, celui qui disait : « Continue, tu vas voir tout à l’heure. »</div>
<div>Et le regard numéro deux : celui qui glaçait le sang et faisait taire même les plus bavards. C’était un langage codé, une forme de communication silencieuse que nous comprenions tous sans traduction.</div>
<div></div>
<div>Nos mères avaient développé cet art de l’éducation sans paroles, parce qu’à l’époque, tout le monde croyait que “parler trop à un enfant, c’est le gâter”. L’enfant devait comprendre, obéir, sans trop discuter.</div>
<div></div>
<div></div>
<div><strong>Paroles de nos mères : le code décodé</strong></div>
<div></div>
<div><img loading="lazy" class="alignnone wp-image-6589 lws-optimize-lazyload"  alt="" width="327" height="327" / data-src="../wp-content/uploads/2025/11/sur-ma--300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/sur-ma--300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/sur-ma--150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/sur-ma--768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/sur-ma--85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/sur-ma--80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/sur-ma-.jpeg 1024w" sizes="(max-width: 327px) 100vw, 327px" /></div>
<div></div>
<div>Ces phrases reproduisent des codes entendus dans beaucoup de foyers africains. Elles doivent être lues dans leur contexte culturel : souvent une intention de protéger et d’imposer un cadre, même si la forme peut heurter aujourd’hui.</div>
<div></div>
<div>« Viens déposer ça sur ma tête. »</div>
<div>→ Sens : ne pose pas la question ; tu dois déjà savoir où poser l’objet. Interrogation = manque d’attention. La phrase renvoie à l’attente d’autonomie et à l’exigence que l’enfant anticipe les usages du foyer.</div>
<div></div>
<div>« Je vais cracher par terre — si tu ne reviens pas avant que ça sèche, tu vas voir. »</div>
<div>→ Sens : menace symbolique servant de chronomètre — la salive qui sèche fixe le temps que l’enfant a pour revenir. La phrase impose l’urgence et la gravité de la consigne.</div>
<div></div>
<div>« Va m’appeler la mère des enfants, celle qui ne mange jamais. »</div>
<div>→ Sens : renvoi à la règle non écrite autour du repas : l’enfant qui veut déranger sa mère lorsqu’elle mange est rappelé à l’ordre en lui faisant comprendre qu’il n’a pas respecté son propre repas (qu’il a sûrement déjà mangé) et qu’il veut profiter de celui de sa mère. La phrase culpabilise et rétablit la frontière entre ce qui appartient à l’enfant et ce qui appartient à l’adulte.</div>
<div></div>
<div></div>
<div></div>
<div> <strong>Quand les objets devenaient des armes pédagogiques</strong></div>
<div></div>
<div>Nos mères n’avaient pas besoin de ceinture ou de lanière officielle. Elles avaient les objets du quotidien.</div>
<div>Une chaussure ? arme légère et rapide.</div>
<div>Une cuillère en bois ? arme de précision.</div>
<div>Un balai ? arme de dispersion.</div>
<div>Un pagne roulé ? arme douce mais symbolique.</div>
<div></div>
<div>Et il y avait la main. Cette main qui nourrissait, caressait, consolait… mais qui, en une seconde, pouvait devenir la main de la justice.</div>
<div>Ce n’était pas de la méchanceté. C’était leur manière de dire : “Tu dois apprendre à bien faire.”</div>
<div>Elles nous corrigeaient comme elles avaient été corrigées, dans un monde où l’obéissance valait plus que l’explication.</div>
<div></div>
<div></div>
<div><strong> L’éducation d’hier : entre rigueur et protection</strong></div>
<div></div>
<div>Nos mères ne cherchaient pas à faire mal. Elles cherchaient à faire grandir.</div>
<div>Derrière la gifle, il y avait souvent une peur : peur que l’enfant se perde, qu’il dévie, qu’il échoue.</div>
<div>Elles pensaient que la douleur forgeait le caractère, que la sévérité formait le respect. Et, d’une certaine manière, cela a fonctionné : beaucoup d’entre nous ont appris la discipline, la prudence et la valeur du travail.</div>
<div></div>
<div>Cette éducation-là n’est pas opposée à celle d’aujourd’hui.</div>
<div>Elle en est la racine, le socle, la base sur laquelle nous pouvons bâtir de nouvelles approches.</div>
<div>La rigueur de nos mères a formé des repères, et la parole d’aujourd’hui vient y ajouter la compréhension.</div>
<div>Elles ont transmis la force intérieure, la capacité de tenir, de persévérer, d’obéir au devoir.</div>
<div>Et nous, nous y ajoutons la force du dialogue, la capacité d’expliquer, de questionner et de comprendre.</div>
<div></div>
<div>Ainsi, ce n’est pas une opposition entre hier et aujourd’hui, mais une complémentarité :</div>
<div>celle de la rigueur et de la parole,</div>
<div>de l’obéissance et de la compréhension,</div>
<div>de la tradition et de la pédagogie moderne.</div>
<div></div>
<div>Car l’enfant d’aujourd’hui, pour être équilibré, a besoin de ces deux héritages : la force culturelle de nos mères et la douceur éducative de notre temps.</div>
<div></div>
<div></div>
<div> <strong>Aujourd’hui : de la punition à la communication</strong></div>
<div></div>
<div><img loading="lazy" class="alignnone wp-image-6588 lws-optimize-lazyload"  alt="" width="323" height="323" / data-src="../wp-content/uploads/2025/11/com-et-punition-300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/com-et-punition-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/com-et-punition-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/com-et-punition-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/com-et-punition-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/com-et-punition-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/com-et-punition.jpeg 1024w" sizes="(max-width: 323px) 100vw, 323px" /></div>
<div>Les temps ont changé. L’école, la société, les sciences de l’éducation ont ouvert de nouvelles voies. On parle désormais d’éducation bienveillante, de communication inclusive, de discipline positive.</div>
<div>L’enfant n’est plus vu comme un réceptacle à corriger, mais comme un être à écouter, à accompagner, à comprendre.</div>
<div></div>
<div>Les “armes” d’aujourd’hui ne sont plus les balais ni les chaussures, mais :</div>
<div>•la parole,</div>
<div>•l’écoute,</div>
<div>•la patience,</div>
<div>•et la cohérence entre ce qu’on dit et ce qu’on fait.</div>
<div></div>
<div>Cela ne veut pas dire qu’il faut tout permettre. L’éducation a besoin de cadre et de fermeté. Mais la fermeté peut s’exprimer autrement que par la peur. L’autorité peut se construire sur la confiance.</div>
<div></div>
<div></div>
<div> <strong>Vers une éducation inclusive et équilibrée</strong></div>
<div></div>
<div>Parler d’éducation inclusive, c’est aussi repenser nos héritages culturels.</div>
<div>Nos mères, avec leurs gestes parfois brusques, faisaient ce qu’elles pouvaient avec les moyens qu’elles avaient. Elles n’avaient pas lu de livres sur la psychologie de l’enfant, mais elles avaient l’amour, la présence, la vigilance.</div>
<div>Elles savaient observer, anticiper, protéger. C’est déjà une forme d’inclusion : elles s’adaptaient à chaque enfant, à chaque situation.</div>
<div></div>
<div>Aujourd’hui, notre responsabilité, à nous, c’est d’honorer leur héritage tout en l’enrichissant.</div>
<div>Ne pas rejeter leurs méthodes, mais les comprendre. Ne pas copier leurs gestes, mais retenir leurs intentions : aimer, guider, former. Et y ajouter nos outils : le dialogue, la bienveillance, la communication non violente.</div>
<div></div>
<div></div>
<div> <strong>En guise de conclusion</strong></div>
<div></div>
<div>Les armes de ma mère n’étaient pas de fer ni de feu. Elles étaient faites de regard, de parole contenue, de mains actives et de gestes d’amour maladroits.</div>
<div>Ces armes ont construit des générations entières d’Africains forts, résistants, disciplinés.</div>
<div>Mais aujourd’hui, il nous appartient de transformer ces armes en mots, ces gestes en dialogue, et ces punitions en opportunités d’apprentissage.</div>
<div></div>
<div>Parce qu’au fond, le plus grand héritage de nos mères, c’est leur volonté de nous voir devenir meilleurs.</div>
<div></div>
<div><em>Comclusives&#8230; Les mots qui rassemblent.</em></div>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=%c2%a0Les%20armes%20de%20ma%20m%c3%a8re%20:%20de%20la%20punition%20%20%c3%a0%20la%20communication.&amp;url=https://comclusives.com/les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui/&amp;title=%c2%a0Les%20armes%20de%20ma%20m%c3%a8re%20:%20de%20la%20punition%20%20%c3%a0%20la%20communication." target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/les-armes-de-ma-mere-de-la-punition-dhier-a-leducation-daujourdhui/&amp;media=https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-1.png&amp;description=%c2%a0Les%20armes%20de%20ma%20m%c3%a8re%20:%20de%20la%20punition%20%20%c3%a0%20la%20communication." target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (9)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'Nouveau-projet-1.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-10-01'),
                'category'         => 'Education',
            ],
            [
                'title'            => 'Les garçons, sortez les tables ; les filles, aidez-moi à balayer la salle',
                'slug'             => 'les-garcons-sortez-les-tables-les-filles-aidez-moi-a-balayer-la-salle',
                'excerpt'          => 'Les garçons, sortez-moi les tables ; les filles, aidez-moi à balayer la salle. Dans beaucoup de classes, cette phrase résonne encore :« Les filles, aidez-moi à balayer la salle. Les garçons, sortez les tables et les bancs. »À la maison, les scènes se répètent : On demande aux filles de faire la vaisselle , de',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/10/22/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-10-22T12:43:03+01:00">22 octobre 2025</time></a><a href="../category/uncategorized/index.html"><i class="fa-light fa-book"></i>Uncategorized</a></div>
<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="1024" height="1024"  alt="" class="wp-image-55" style="width:457px;height:auto" / loading="lazy" decoding="async" src="../wp-content/uploads/2025/09/image-garcon-table2dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table-100x100.jpeg 100w, https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table-600x600.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/image-garcon-table-768x768.jpeg 768w" sizes="auto, (max-width: 1024px) 100vw, 1024px" /></figure>



<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="1024" height="1024"  alt="" class="wp-image-57" style="width:453px;height:auto" / loading="lazy" decoding="async" src="../wp-content/uploads/2025/09/image-fille-balayage2dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage-100x100.jpeg 100w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage-600x600.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-balayage-768x768.jpeg 768w" sizes="auto, (max-width: 1024px) 100vw, 1024px" /></figure>



<p><strong>Les garçons, sortez-moi les tables ; les filles, aidez-moi à balayer la salle</strong>.</p>



<p>Dans beaucoup de classes, cette phrase résonne encore :<br>« Les filles, aidez-moi à balayer la salle. Les garçons, sortez les tables et les bancs. »<br>À la maison, les scènes se répètent : On demande aux filles de faire la vaisselle , de faire la cuisine et aux garçons on demande de laver la voiture ou de réparer un robinet.</p>



<p>Ces petites phrases, banales en apparence, construisent pourtant de grandes inégalités.</p>



<p></p>



<p><strong>À l’école : des stéréotypes qui s’enseignent sans le dire</strong></p>



<p>Quand un enseignant confie systématiquement aux filles les tâches de soin ou de nettoyage, et aux garçons celles qui demandent de la force, il transmet un message implicite : certaines activités sont « naturellement » féminines, d’autres masculines.<br>Même dans les punitions, les différences existent : les garçons sont souvent sanctionnés plus sévèrement que les filles pour un même comportement. Résultat ? Les filles intègrent qu’elles doivent être sages, dociles et utiles. Les garçons, eux, se construisent dans la dureté et l’excès de responsabilité.</p>



<p>Et parfois, les stéréotypes se glissent jusque dans les félicitations. Il n’est pas rare d’entendre un enseignant dire à une élève :<br>« C’est déjà très bien pour une femme. »<br>Une phrase qui réduit les ambitions, comme si les filles n’étaient pas capables d’aller plus loin que leurs camarades garçons.</p>



<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="1024" height="1024"  alt="" class="wp-image-60" style="width:466px;height:auto" / loading="lazy" decoding="async" src="../wp-content/uploads/2025/09/image-fille-mecontente2dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente-100x100.jpeg 100w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente-600x600.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/image-fille-mecontente-768x768.jpeg 768w" sizes="auto, (max-width: 1024px) 100vw, 1024px" /></figure>



<p></p>



<p><strong>À la maison : un apprentissage inégal de la vie quotidienne</strong></p>



<p>Les parents reproduisent souvent le même schéma :<br>• Aux filles, la cuisine, la vaisselle, la garde des plus jeunes.<br>• Aux garçons, les voitures, la sécurité, les travaux physiques et techniques.</p>



<p>Ces répartitions enferment les enfants dans des rôles figés. Une fille qui n’apprend qu’à « s’occuper du foyer » aura du mal à se projeter demain dans des métiers d’ingénieure, de pilote ou de cheffe d’entreprise. Un garçon qui n’apprend jamais à s’occuper de ses petits frères, à cuisiner ou à nettoyer grandira avec l’idée que ce n’est pas son rôle.</p>



<p></p>



<p><strong>Éduquer à l’égalité, pas à « l’éducation des filles »</strong></p>



<p>Il ne s’agit pas de demander aux filles de perdre leur féminité ou leur identité. Mais si nous voulons que les chances soient réellement égales dans les professions, en politique et dans la société, l’éducation doit l’être aussi — et cela commence dès le bas âge.</p>



<p>Donner aux filles une « éducation spéciale pour filles » est en réalité une injustice : cela revient à leur refuser des compétences et des opportunités qui leur seraient utiles demain. C’est leur faire du mal en limitant leurs perspectives dès l’enfance.</p>



<p></p>



<p><strong>L’avenir se joue dans les gestes du quotidien</strong></p>



<p>Si nous rêvons d’un futur où les filles peuvent devenir pilotes, ingénieures, scientifiques, et où les garçons peuvent aussi prendre soin, cuisiner ou enseigner, cela commence dès aujourd’hui.</p>



<p>Chaque enfant, fille ou garçon, doit apprendre à :<br>• prendre soin,<br>• faire la cuisine,<br>• ranger et nettoyer,<br>• mais aussi porter, construire, réparer.</p>



<p>Parce que l’égalité ne se décrète pas, elle s’apprend dans les petits gestes de tous les jours.</p>



<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="1024" height="1024"  alt="" class="wp-image-62" style="width:452px;height:auto" / loading="lazy" decoding="async" src="../wp-content/uploads/2025/09/image-garcons-et-filles-tables2dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables-100x100.jpeg 100w, https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables-600x600.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/image-garcons-et-filles-tables-768x768.jpeg 768w" sizes="auto, (max-width: 1024px) 100vw, 1024px" /></figure>



<p><strong>Conclusion : changer les phrases, changer les mentalités</strong></p>



<p>Au lieu de dire :<br> « Les filles balaient, les garçons portent les tables »,<br>disons plutôt :<br> « Aujourd’hui, tout le monde balaie. Demain, tout le monde portera les tables. »</p>



<p>Ainsi, nous préparons une génération d’hommes et de femmes capables de partager toutes les responsabilités, dans la maison comme dans la société.</p>



<p>L’égalité commence ici, dans la salle de classe et dans nos foyers.</p>



<p>Mon mini-guide gratuit sur l’inclusion à l’école est enfin disponible !<br>Un outil pratique et concret, qui vous donnera un avant-goût de mon guide complet “Communication inclusive : pratiques professionnelles et éducatives au Bénin”.<br><a href="https://credoshs.mychariow.store/prd_5fywy1">Téléchargez-le gratuitement ici</a></p>



<p><strong>Comclusives, les mots qui rassemblent.</strong></p>



<p></p>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-sm-auto"><span class="share-links-title">Tags:</span><div class="tagcloud"><a href="../tag/communication-scolaire/index.html">communication scolaire</a><a href="../tag/education-inclusive/index.html">education inclusive</a><a href="../tag/egalite/index.html">Égalité</a><a href="../tag/inclusion/index.html">Inclusion</a></div></div><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/les-garcons-sortez-les-tables-les-filles-aidez-moi-a-balayer-la-salle/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Les%20gar%c3%a7ons,%20sortez%20les%20tables%20;%20les%20filles,%20aidez-moi%20%c3%a0%20balayer%20la%20salle&amp;url=https://comclusives.com/les-garcons-sortez-les-tables-les-filles-aidez-moi-a-balayer-la-salle/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/les-garcons-sortez-les-tables-les-filles-aidez-moi-a-balayer-la-salle/&amp;title=Les%20gar%c3%a7ons,%20sortez%20les%20tables%20;%20les%20filles,%20aidez-moi%20%c3%a0%20balayer%20la%20salle" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/les-garcons-sortez-les-tables-les-filles-aidez-moi-a-balayer-la-salle/&amp;media=https://comclusives.com/wp-content/uploads/2025/09/New-Project-2.png&amp;description=Les%20gar%c3%a7ons,%20sortez%20les%20tables%20;%20les%20filles,%20aidez-moi%20%c3%a0%20balayer%20la%20salle" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (5)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'New-Project-2.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-10-20'),
                'category'         => 'Education',
            ],
            [
                'title'            => 'Maïeuticien : le masculin (un peu oublié) de sage-femme',
                'slug'             => 'maieuticien-le-masculin-un-peu-oublie-de-sage-femme',
                'excerpt'          => 'Si je vous dis sage-femme, à qui pensez-vous ? Certainement à une femme en blouse blanche, sourire rassurant, prête à accueillir un nouveau-né. Mais… et si c’est un homme qui exerce ce métier ? On l’appelle comment ? Sage-homme ? Accoucheur ? Eh bien non ! Le mot officiel existe bel et bien : maïeuticien.',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/10/22/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-10-22T12:43:03+01:00">22 octobre 2025</time></a><a href="../category/uncategorized/index.html"><i class="fa-light fa-book"></i>Uncategorized</a></div>		<div data-elementor-type="wp-post" data-elementor-id="34" class="elementor elementor-34">
				<div class="elementor-element elementor-element-2a69ed3a e-flex e-con-boxed e-con e-parent" data-id="2a69ed3a" data-element_type="container">
					<div class="e-con-inner">
				<div class="elementor-element elementor-element-315a6012 elementor-widget elementor-widget-text-editor" data-id="315a6012" data-element_type="widget" data-widget_type="text-editor.default">
									
<p>Si je vous dis sage-femme, à qui pensez-vous ? Certainement à une femme en blouse blanche, sourire rassurant, prête à accueillir un nouveau-né. Mais… et si c’est un homme qui exerce ce métier ? On l’appelle comment ? Sage-homme ? Accoucheur ?</p>

<p>Eh bien non ! Le mot officiel existe bel et bien : maïeuticien.</p>

<p> </p>

<p>Un mot qui a une belle histoire</p>

<p>Le terme vient du grec maïeutikè, qui signifie “l’art de faire accoucher”. Fun fact : le philosophe Socrate utilisait déjà ce mot, mais pas pour parler de bébés ! Pour lui, la maïeutique était l’art de “faire accoucher les esprits” d’idées. 💡</p>

<p>Aujourd’hui, le mot désigne tout simplement l’homme qui exerce le métier de sage-femme. Et pourtant, avouons-le : qui a déjà entendu quelqu’un dire “je vais voir mon maïeuticien” ? Pas grand monde !</p>

<p> </p>

<p>Un mot rare, mais révélateur</p>

<p>Ce petit mot, presque inconnu, raconte une grande histoire : les hommes aussi exercent ce métier. Mais dans l’imaginaire collectif, l’accouchement reste associé aux femmes. Le fait que le masculin maïeuticien existe mais soit si peu utilisé montre bien que nos habitudes linguistiques sont liées aux représentations sociales et aux stéréotypes de genre.</p>

<p> </p>

<p>Et si on l’utilisait davantage ?</p>

<p>Alors, est-ce que maïeuticien finira par se faire une place dans le langage courant ? Peut-être. Ce qui est sûr, c’est que la langue évolue avec nos usages. Et parfois, remettre un mot dans la lumière peut aussi aider à changer les mentalités.</p>

<p>La prochaine fois que vous rencontrerez un homme sage-femme, vous aurez le bon mot pour briller :<br />“Bonjour Monsieur le maïeuticien !”</p>

<p> </p>

<p>Et vous ? Aviez-vous déjà entendu ce mot ? Trouvez-vous qu’il sonne bien, ou plutôt bizarre ? Dites-le-moi en commentaires ! Et si vous connaissez d’autres mots rares qui méritent d’être remis au goût du jour, partagez-les aussi.</p>

<p> </p>

<p>Comclusives – Les mots qui rassemblent</p>

<figure class="wp-block-image size-large"><img width="1080" height="792" class="wp-image-36 lws-optimize-lazyload"  alt="" / data-src="../wp-content/uploads/2025/09/image-sage-femme2dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/image-sage-femme.jpeg 1080w, https://comclusives.com/wp-content/uploads/2025/09/image-sage-femme-600x440.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/image-sage-femme-300x220.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/image-sage-femme-1024x751.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/image-sage-femme-768x563.jpeg 768w" sizes="(max-width: 1080px) 100vw, 1080px" /></figure>
								</div>
					</div>
				</div>
				</div>
		</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-sm-auto"><span class="share-links-title">Tags:</span><div class="tagcloud"><a href="../tag/amour/index.html">amour</a><a href="../tag/feminisme/index.html">feminisme</a><a href="../tag/maternite/index.html">maternite</a><a href="../tag/non-classe/index.html">non-classe</a></div></div><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/maieuticien-le-masculin-un-peu-oublie-de-sage-femme/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Ma%c3%afeuticien%20:%20le%20masculin%20(un%20peu%20oubli%c3%a9)%20de%20sage-femme&amp;url=https://comclusives.com/maieuticien-le-masculin-un-peu-oublie-de-sage-femme/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/maieuticien-le-masculin-un-peu-oublie-de-sage-femme/&amp;title=Ma%c3%afeuticien%20:%20le%20masculin%20(un%20peu%20oubli%c3%a9)%20de%20sage-femme" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/maieuticien-le-masculin-un-peu-oublie-de-sage-femme/&amp;media=https://comclusives.com/wp-content/uploads/2025/09/New-Project-1.png&amp;description=Ma%c3%afeuticien%20:%20le%20masculin%20(un%20peu%20oubli%c3%a9)%20de%20sage-femme" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (19)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'New-Project-1.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-11-01'),
                'category'         => 'Communication inclusive',
            ],
            [
                'title'            => 'Porte-clefs vs Éventails : quand les cadeaux fabriquent les stéréotypes',
                'slug'             => 'porte-clefs-vs-eventails-quand-les-cadeaux-fabriquent-les-stereotypes',
                'excerpt'          => 'Samedi dernier, j’ai assisté à une cérémonie funéraire suivie d’une réception. La clôture a été marquée par une distribution de présents. Mais ce qui m’a frappé, ce n’est pas le geste de générosité, mais la manière dont il s’est exprimé. Les hommes ont reçu des porte-clefs, tandis que les femmes ont eu des éventails. Un',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/10/22/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-10-22T12:43:03+01:00">22 octobre 2025</time></a><a href="../category/uncategorized/index.html"><i class="fa-light fa-book"></i>Uncategorized</a></div>
<figure class="wp-block-image size-large is-resized"><img width="810" height="1080"  alt="" class="wp-image-44 lws-optimize-lazyload" style="aspect-ratio:0.7500050252266377;width:333px;height:auto" / data-src="../wp-content/uploads/2025/09/article-blog-16410.jpeg?w=768" srcset="https://comclusives.com/wp-content/uploads/2025/09/article-blog-1.jpeg 810w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-1-600x800.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-1-225x300.jpeg 225w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-1-768x1024.jpeg 768w" sizes="(max-width: 810px) 100vw, 810px" /></figure>



<p>Samedi dernier, j’ai assisté à une cérémonie funéraire suivie d’une réception. La clôture a été marquée par une distribution de présents. Mais ce qui m’a frappé, ce n’est pas le geste de générosité, mais la manière dont il s’est exprimé.</p>



<p>Les hommes ont reçu des porte-clefs, tandis que les femmes ont eu des éventails. Un détail ? Pas vraiment. Derrière ce choix se cache une logique silencieuse mais profondément enracinée : les stéréotypes de genre.</p>



<p><strong>Les cadeaux qui construisent les rôles</strong></p>



<figure class="wp-block-image size-large is-resized"><img width="1024" height="1024"  alt="" class="wp-image-46 lws-optimize-lazyload" style="width:326px;height:auto" / data-src="../wp-content/uploads/2025/09/article-blog-22dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/article-blog-2.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-2-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-2-100x100.jpeg 100w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-2-600x600.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-2-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/article-blog-2-768x768.jpeg 768w" sizes="(max-width: 1024px) 100vw, 1024px" /></figure>



<p><br>Cette scène m’a rappelé les cadeaux que l’on offre aux enfants : aux filles, des poupées ; aux garçons, des ballons. Ce qui semble anodin devient une sorte de « commission » implicite. Dès l’enfance, on trace des chemins, on fabrique des représentations.</p>



<p>Offrir un porte-clefs à un homme, c’est l’associer symboliquement au pouvoir et à l’autorité. Offrir un éventail à une femme, c’est l’associer à l’élégance et à la délicatesse. Ces gestes, même petits, influencent durablement les perceptions et les choix de vie.</p>



<p><strong>Égalité : créer les bonnes conditions</strong></p>



<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="946" height="1280"  alt="" class="wp-image-48 lws-optimize-lazyload" style="aspect-ratio:0.7392671500994674;width:326px;height:auto" / data-src="../wp-content/uploads/2025/09/article-31345.jpeg?w=757" srcset="https://comclusives.com/wp-content/uploads/2025/09/article-3.jpeg 946w, https://comclusives.com/wp-content/uploads/2025/09/article-3-600x812.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/article-3-222x300.jpeg 222w, https://comclusives.com/wp-content/uploads/2025/09/article-3-757x1024.jpeg 757w, https://comclusives.com/wp-content/uploads/2025/09/article-3-768x1039.jpeg 768w" sizes="(max-width: 946px) 100vw, 946px" /></figure>



<p>Photo : El Loko Foto / Wikimedia Commons / CC BY-SA 4.0</p>



<p><strong><br></strong>Assurer l’égalité, ce n’est pas imposer les mêmes rôles. C’est offrir des conditions équitables pour que chacun·e choisisse librement son avenir.</p>



<p>En Afrique, beaucoup de garçons reçoivent tôt un ballon de football et certains deviennent professionnels. Mais combien de filles ont cette chance ? Combien disposent d’espaces sécurisés pour s’entraîner et d’encadrants qui croient en elles ? Pourtant, des noms comme Asisat Oshoala, star nigériane du football féminin, ou Ajara Nchout, attaquante camerounaise internationale, montrent que le talent existe. Il faut juste créer les conditions pour qu’il s’exprime.</p>



<p>Le même constat vaut pour les études et les technologies. Trop souvent, on encourage les garçons vers les sciences ou l’informatique, et les filles vers les filières littéraires. Pourtant, des femmes comme Fatoumata Ba, pionnière du numérique au Sénégal, ou Christine Ouensavi, chercheuse en biologie forestière au Bénin, prouvent que lorsque les conditions sont réunies, les filles réussissent tout autant.</p>



<p>Briser les pratiques stéréotypées<br>Il ne s’agit pas de condamner les cadeaux, mais de réfléchir à ce qu’ils transmettent. Offrir un ballon à une fille ou un livre de sciences à un garçon, c’est déjà élargir les horizons.</p>



<p>Changer ces gestes, c’est créer un espace de liberté. Chaque enfant doit pouvoir choisir son chemin, sans être enfermé·e dans des stéréotypes.</p>



<p>Conclusion<br>Le vrai cadeau pour les générations futures, ce n’est pas un éventail ou un porte-clefs, une poupée ou un ballon. C’est la liberté de se construire sans limites imposées par le genre.</p>



<p>Un monde égalitaire, c’est un monde où l’on peut être femme et ingénieure, homme et danseur, fille et sportive de haut niveau, garçon et maïeuticien, sans que cela choque.</p>



<p>L’égalité ne se décrète pas seulement par des lois. Elle commence dans nos gestes quotidiens, même les plus anodins, pour ouvrir les portes de tous les possibles.</p>



<figure class="wp-block-image size-large is-resized"><img loading="lazy" width="1280" height="642"  alt="" class="wp-image-50 lws-optimize-lazyload" style="aspect-ratio:1.9962028749660972;width:469px;height:auto" / data-src="../wp-content/uploads/2025/09/article-42dff.jpeg?w=1024" srcset="https://comclusives.com/wp-content/uploads/2025/09/article-4.jpeg 1280w, https://comclusives.com/wp-content/uploads/2025/09/article-4-600x301.jpeg 600w, https://comclusives.com/wp-content/uploads/2025/09/article-4-300x150.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/article-4-1024x514.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/article-4-768x385.jpeg 768w" sizes="(max-width: 1280px) 100vw, 1280px" /></figure>



<p></p>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/porte-clefs-vs-eventails-quand-les-cadeaux-fabriquent-les-stereotypes/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Porte-clefs%20vs%20%c3%89ventails%20:%20quand%20les%20cadeaux%20fabriquent%20les%20st%c3%a9r%c3%a9otypes&amp;url=https://comclusives.com/porte-clefs-vs-eventails-quand-les-cadeaux-fabriquent-les-stereotypes/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/porte-clefs-vs-eventails-quand-les-cadeaux-fabriquent-les-stereotypes/&amp;title=Porte-clefs%20vs%20%c3%89ventails%20:%20quand%20les%20cadeaux%20fabriquent%20les%20st%c3%a9r%c3%a9otypes" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/porte-clefs-vs-eventails-quand-les-cadeaux-fabriquent-les-stereotypes/&amp;media=https://comclusives.com/wp-content/uploads/2025/09/New-Project.png&amp;description=Porte-clefs%20vs%20%c3%89ventails%20:%20quand%20les%20cadeaux%20fabriquent%20les%20st%c3%a9r%c3%a9otypes" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (20)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'New-Project.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-11-15'),
                'category'         => 'Egalite',
            ],
            [
                'title'            => 'Stop aux fautes ! 10 expressions mal utilisées',
                'slug'             => 'stop-aux-fautes-10-expressions-mal-utilisees',
                'excerpt'          => 'Certaines expressions françaises sont très souvent mal écrites ou mal employées, même par des personnes cultivées. Voici 10 expressions à connaître pour éviter les fautes courantes. ⸻ 1️⃣ Au temps pour moi / Autant pour moi ❌ Autant pour moi, je me suis trompé.✅ Au temps pour moi, je me suis trompé. « Au temps',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/11/02/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-11-02T21:36:45+01:00">2 novembre 2025</time></a><a href="../category/communication-inclusive/index.html"><i class="fa-light fa-book"></i>Communication inclusive</a></div>
<figure class="wp-block-image size-large is-resized"><img width="682" height="1024" class="wp-image-6536 lws-optimize-lazyload" style="width: 382px; height: auto;"  alt="" / data-src="../wp-content/uploads/2025/11/stop-aux-fautes-682x1024.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/stop-aux-fautes-682x1024.jpeg 682w, https://comclusives.com/wp-content/uploads/2025/11/stop-aux-fautes-200x300.jpeg 200w, https://comclusives.com/wp-content/uploads/2025/11/stop-aux-fautes-768x1152.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/stop-aux-fautes.jpeg 853w" sizes="(max-width: 682px) 100vw, 682px" /></figure>



<p>Certaines expressions françaises sont très souvent mal écrites ou mal employées, même par des personnes cultivées. Voici 10 expressions à connaître pour éviter les fautes courantes.</p>



<p>⸻</p>



<p>1️⃣ Au temps pour moi / Autant pour moi</p>



<p>❌ Autant pour moi, je me suis trompé.<br />✅ Au temps pour moi, je me suis trompé.</p>



<p>« Au temps pour moi » vient du langage militaire et signifie « je reprends un mouvement depuis le début ». Par extension, cela veut dire « je reconnais mon erreur ».</p>



<p>⸻</p>



<p>2️⃣ Un tant soit peu / Un temps soit peu</p>



<p>❌ Un temps soit peu intéressant.<br />✅ Un tant soit peu intéressant.</p>



<p>On dit « un tant soit peu », qui signifie « un peu » ou « légèrement ». Le mot « tant » exprime une petite quantité, contrairement à « temps » qui est incorrect ici.</p>



<p>⸻</p>



<p>3️⃣ A priori / À priori</p>



<p>❌ À priori, il viendra.<br />✅ A priori, il viendra.</p>



<p>« A priori » est une locution latine qui signifie « en principe » ou « avant toute vérification ». Elle ne prend donc pas d’accent.</p>



<p>⸻</p>



<p>4️⃣ Le cas échéant</p>



<p>❌ Le cas échéant signifie le cas contraire.<br />✅ Nous enverrons un message, le cas échéant.</p>



<p>« Le cas échéant » veut dire « si nécessaire » ou « si le cas se présente », et non « le cas contraire ».</p>



<p>⸻</p>



<p>5️⃣ Malgré / Malgré que</p>



<p>❌ Malgré qu’il pleuve, je sortirai.<br />✅ Malgré la pluie, je sortirai.</p>



<p>On dit simplement « malgré » suivi d’un nom ou d’un groupe nominal. L’expression « malgré que » est considérée fautive en français soigné.</p>



<p>⸻</p>



<p>6️⃣ Après que / Après que + subjonctif</p>



<p>❌ Après que tu sois parti, il est arrivé.<br />✅ Après que tu es parti, il est arrivé.</p>



<p>Le verbe qui suit « après que » se met toujours à l’indicatif, car le fait est considéré comme certain.</p>



<p>⸻</p>



<p>7️⃣ Soi-disant / Soit disant</p>



<p>❌ C’est un soit disant expert.<br />✅ C’est un soi-disant expert.</p>



<p>On écrit « soi-disant » avec un trait d’union. L’expression signifie « qui se dit tel ».</p>



<p>⸻</p>



<p>8️⃣ Se rappeler / Se rappeler de</p>



<p>❌ Je me rappelle de mon enfance.<br />✅ Je me rappelle mon enfance.</p>



<p>Le verbe « se rappeler » est transitif direct et ne prend pas la préposition « de ».</p>



<p>⸻</p>



<p>9️⃣ Plus d’un</p>



<p>❌ Plus d’un élève sont partis.<br />✅ Plus d’un élève est parti.</p>



<p>Avec « plus d’un », le verbe se met toujours au singulier, car la tournure signifie en réalité « chacun d’eux ».</p>



<p>⸻</p>



<p>🔟 Interview</p>



<p>❌ Un interview intéressant.<br />✅ Une interview intéressante.</p>



<p>En français, le mot « interview » est féminin. Le genre est souvent confondu à cause de son origine anglaise.</p>



<p>Ces 10 expressions sont très courantes, et il est facile de les confondre. Et vous, quelles expressions mélangez-vous souvent ? Partagez vos exemples dans les commentaires !</p>



<p>Comclusives&#8230;Les mots qui rassemblent.</p>



<p>&nbsp;</p>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-sm-auto"><span class="share-links-title">Tags:</span><div class="tagcloud"><a href="../tag/communication-scolaire/index.html">communication scolaire</a><a href="../tag/education-inclusive/index.html">education inclusive</a></div></div><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/stop-aux-fautes-10-expressions-mal-utilisees/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Stop%20aux%20fautes%20!%2010%20expressions%20mal%20utilis%c3%a9es&amp;url=https://comclusives.com/stop-aux-fautes-10-expressions-mal-utilisees/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/stop-aux-fautes-10-expressions-mal-utilisees/&amp;title=Stop%20aux%20fautes%20!%2010%20expressions%20mal%20utilis%c3%a9es" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/stop-aux-fautes-10-expressions-mal-utilisees/&amp;media=https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-2.png&amp;description=Stop%20aux%20fautes%20!%2010%20expressions%20mal%20utilis%c3%a9es" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (17)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'Nouveau-projet-2.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-12-01'),
                'category'         => 'Communication inclusive',
            ],
            [
                'title'            => 'Tout commence à la maison : l’éducation comme première école de l’inclusion',
                'slug'             => 'tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion',
                'excerpt'          => 'L’inclusion n’est pas seulement une affaire d’école, de politique éducative ou de société.Elle commence bien plus tôt, dans un lieu que nous connaissons tous : la maison. Un enfant n’apprend pas seulement à marcher, à parler ou à compter dans son foyer.Il y apprend aussi, souvent sans qu’on s’en rende compte, à regarder les autres.',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/09/29/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-09-29T15:26:38+01:00">29 septembre 2025</time></a><a href="../category/non-classe/index.html"><i class="fa-light fa-book"></i>Non classé</a></div>
<figure class="wp-block-image size-large is-resized"><img width="1024" height="1024"  alt="" class="wp-image-991 lws-optimize-lazyload" style="width:405px;height:auto"/ data-src="../wp-content/uploads/2025/09/imaclu1-1024x1024.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/09/imaclu1-1024x1024.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/09/imaclu1.jpeg 1280w" sizes="(max-width: 1024px) 100vw, 1024px" /></figure>



<p>L’inclusion n’est pas seulement une affaire d’école, de politique éducative ou de société.<br>Elle commence bien plus tôt, dans un lieu que nous connaissons tous : la maison.</p>



<p>Un enfant n’apprend pas seulement à marcher, à parler ou à compter dans son foyer.<br>Il y apprend aussi, souvent sans qu’on s’en rende compte, à regarder les autres.</p>



<p><strong>Le regard des parents : un miroir fondateur</strong></p>



<p></p>



<figure class="wp-block-image size-full is-resized"><img  alt="" class="wp-image-992 lws-optimize-lazyload" style="width:408px;height:auto"/ data-src="../wp-content/uploads/2025/09/imaclu2.jpeg"></figure>



<p>Les enfants observent et imitent.<br>Quand un parent valorise la différence, l’enfant comprend que chaque personne mérite respect.<br>Quand un parent rejette, se moque ou utilise des mots blessants, l’enfant intègre l’exclusion comme une norme.</p>



<p>Dans certaines cultures, comme chez les Fon et Goun, des expressions traditionnelles peuvent révéler cette ambivalence.<br>Par exemple, les enfants vivant avec l’albinisme sont parfois appelés Agué yovo, ce qui signifie « le blanc de la côte » ou « un faux blanc ».<strong><br></strong>Si ce surnom est souvent prononcé sur un ton de raillerie, il montre comment, dès la maison, des mots peuvent stigmatiser et influencer la perception des différences.</p>



<p><strong>Les paroles entendues à la maison : des graines qui poussent</strong></p>



<p>Chaque mot laisse une trace.<br>Un mot bienveillant ouvre l’esprit et apprend la tolérance.<br>Une phrase blessante, même héritée de la tradition, peut marquer un enfant et l’amener à reproduire l’exclusion envers ses camarades.</p>



<p>La façon dont on apprend à considérer les autres</p>



<p>Les gestes du quotidien construisent une culture d’inclusion :<br>• Accueillir un camarade en situation de handicap.<br>• Jouer avec un enfant vivant avec l’albinisme, sans préjugé ni moquerie.<br>• Respecter une fille-mère, sans jugement ni rejet.<br>• Partager avec celui qui n’a pas les mêmes forces, les mêmes moyens ou les mêmes apparences.</p>



<p>C’est là, dans la cellule familiale, que se construit la base d’une société inclusive.<br>Bien avant l’école. Bien avant la société. Tout commence à la maison.</p>



<p><strong>Et l’école dans tout ça ?</strong></p>



<p>La maison initie, mais l’école prolonge.<br>Les enseignants, les responsables éducatifs et les communautés scolaires ont un rôle déterminant pour cultiver et renforcer cette culture de tolérance et de respect.</p>



<p>C’est pour contribuer à ce travail que j’ai conçu un mini-guide pratique sur l’inclusion à l’école primaire et secondaire au Bénin.</p>



<figure class="wp-block-image size-full is-resized"><img  alt="" class="wp-image-993 lws-optimize-lazyload" style="width:427px;height:auto"/ data-src="../wp-content/uploads/2025/09/imainclu3.jpeg"></figure>



<p>Pour aller plus loin</p>



<p><a href="https://credoshs.mychariow.store/prd_5fywy1">Découvrez et téléchargez gratuitement mon mini-guide ici<br></a>Ensemble, faisons de nos maisons et de nos écoles des espaces où chaque enfant trouve sa place, sans discrimination et avec dignité.</p>



<p>Comclusives, les mots qui rassemblent.</p>



<p></p>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-sm-auto"><span class="share-links-title">Tags:</span><div class="tagcloud"><a href="../tag/education-inclusive/index.html">education inclusive</a><a href="../tag/egalite/index.html">Égalité</a><a href="../tag/handicap/index.html">handicap</a></div></div><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Tout%20commence%20%c3%a0%20la%20maison%20:%20l%e2%80%99%c3%a9ducation%20comme%20premi%c3%a8re%20%c3%a9cole%20de%20l%e2%80%99inclusion&amp;url=https://comclusives.com/tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion/&amp;title=Tout%20commence%20%c3%a0%20la%20maison%20:%20l%e2%80%99%c3%a9ducation%20comme%20premi%c3%a8re%20%c3%a9cole%20de%20l%e2%80%99inclusion" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/tout-commence-a-la-maison-leducation-comme-premiere-ecole-de-linclusion/&amp;media=https://comclusives.com/wp-content/uploads/2025/09/New-Project-9.png&amp;description=Tout%20commence%20%c3%a0%20la%20maison%20:%20l%e2%80%99%c3%a9ducation%20comme%20premi%c3%a8re%20%c3%a9cole%20de%20l%e2%80%99inclusion" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (2)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'New-Project-9.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2025-12-20'),
                'category'         => 'Education',
            ],
            [
                'title'            => 'Violence numérique : les mots à connaître',
                'slug'             => 'violence-numerique-les-mots-a-connaitre',
                'excerpt'          => 'Comprendre ces termes permet de mieux protéger les utilisateurs, de renforcer la communication inclusive et d’encourager des comportements plus responsables.',
                'content'          => '<!-- Blog Meta --><div class="blog-meta"><a class="author" href="../author/admin/index.html"><i class="fa-light fa-user"></i>par Admin</a><a href="../2025/11/30/index.html"><i class="fa-light fa-clock"></i><time datetime="2025-11-30T20:04:58+01:00">30 novembre 2025</time></a><a href="../category/communication-inclusive/index.html"><i class="fa-light fa-book"></i>Communication inclusive</a></div><p><img fetchpriority="high" class="alignnone  wp-image-7072 lws-optimize-lazyload"  alt="" width="377" height="377" / data-src="../wp-content/uploads/2025/11/VN2-300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/VN2-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/VN2-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/VN2-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/VN2-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/VN2-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/VN2.jpeg 1024w" sizes="(max-width: 377px) 100vw, 377px" /></p>
<p>Chaque année, du 25 novembre au 10 décembre, le monde observe les 16 jours d’activisme contre les violences basées sur le genre (VBG). Cette période est un moment stratégique pour sensibiliser, informer et encourager des actions concrètes afin de réduire toutes les formes de violences qui touchent particulièrement les femmes et les filles.</p>
<p>Mais au-delà des actions, il est tout aussi essentiel de comprendre les mots, les pratiques et les réalités qui composent la violence numérique. Beaucoup de personnes vivent ou observent des violences en ligne sans savoir les nommer. Or, mettre un mot sur une situation, c’est déjà commencer à la reconnaître, à la comprendre et à mieux s’en protéger.</p>
<p>C’est dans cet esprit que Comclusives propose ce mini-guide : un outil simple pour définir les principaux termes liés à la violence numérique et renforcer la sensibilisation tout au long des 16 jours d’activisme… et au-delà.</p>
<p><img class="alignnone  wp-image-7077 lws-optimize-lazyload"  alt="" width="464" height="309" / data-src="../wp-content/uploads/2025/11/VN5-300x200.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/VN5-300x200.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/VN5-1024x682.jpeg 1024w, https://comclusives.com/wp-content/uploads/2025/11/VN5-768x512.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/VN5.jpeg 1280w" sizes="(max-width: 464px) 100vw, 464px" /></p>
<p>🌐 <strong>1. Cyberharcèlement</strong></p>
<p>Le cyberharcèlement désigne des comportements répétés en ligne visant à gêner, intimider, humilier ou mettre la pression sur une personne.<br />
Cela peut se produire sur les réseaux sociaux, par messagerie privée ou à travers des contenus publiés contre la personne.</p>
<p>🌐<strong> 2. Doxxing</strong></p>
<p>Le doxxing consiste à divulguer en ligne des informations personnelles sur quelqu’un (nom complet, numéro, adresse, informations privées), dans le but de lui nuire ou de l’exposer.<br />
C’est une pratique dangereuse et répréhensible.</p>
<p>🌐 <strong>3. Usurpation d’identité numérique</strong></p>
<p>C’est le fait de créer un profil ou d’utiliser les informations d’une personne sans sa permission, pour parler en son nom, manipuler ou tromper les autres.</p>
<p>🌐<strong> 4. Revenge porn (ou diffusion non autorisée d’images intimes)</strong></p>
<p>Cela désigne la publication ou le partage sans consentement d’images privées d’une personne.<br />
C’est une forme grave de violence numérique et une atteinte directe à la vie privée.</p>
<p><img class="alignnone  wp-image-7076 lws-optimize-lazyload"  alt="" width="375" height="375" / data-src="../wp-content/uploads/2025/11/VN3-300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/VN3-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/VN3-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/VN3-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/VN3-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/VN3-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/VN3.jpeg 1024w" sizes="(max-width: 375px) 100vw, 375px" /></p>
<p>🌐 <strong>5. Catfishing</strong></p>
<p>Le catfishing consiste à créer une fausse identité en ligne pour tromper quelqu’un, souvent dans le but de prendre un avantage émotionnel, relationnel ou matériel.</p>
<p>🌐 <strong>6. Raid numérique</strong></p>
<p>Un raid numérique est une action coordonnée où un groupe de personnes attaque le compte ou l’espace numérique d’une personne (commentaires, messages, signalements abusifs).<br />
Le but est généralement de faire pression ou de faire taire quelqu’un.</p>
<p>🌐 <strong>7. Cybermanipulation</strong></p>
<p>C’est l’utilisation de messages, de commentaires ou de contenus trompeurs pour influencer ou contrôler quelqu’un.<br />
Cela peut inclure la diffusion de rumeurs, de fausses informations ou de témoignages déformés.</p>
<p>🌐<strong> 8. Discours de haine en ligne</strong></p>
<p>Il s’agit de propos visant un individu ou un groupe à cause d’une caractéristique réelle ou supposée : genre, origine, religion, orientation, identité, handicap, etc.<br />
Ces propos peuvent créer un climat d’intimidation ou d’exclusion.</p>
<p>🌐<strong> 9. Flaming</strong></p>
<p>Le flaming désigne l’envoi de messages agressifs ou insultants sur Internet, souvent dans les forums, chats ou réseaux sociaux.<br />
Le but est de provoquer, de créer un conflit ou d’humilier quelqu’un publiquement.<br />
C’est une forme de violence numérique très courante mais souvent sous-estimée.</p>
<p>🌐 <strong>10. Sextorsion</strong></p>
<p>C’est une forme d’extorsion où quelqu’un utilise des contenus privés pour exercer une pression psychologique ou demander quelque chose.<br />
C’est une infraction grave.</p>
<p><img loading="lazy" class="alignnone  wp-image-7078 lws-optimize-lazyload"  alt="" width="395" height="395" / data-src="../wp-content/uploads/2025/11/VN6-300x300.jpeg" srcset="https://comclusives.com/wp-content/uploads/2025/11/VN6-300x300.jpeg 300w, https://comclusives.com/wp-content/uploads/2025/11/VN6-150x150.jpeg 150w, https://comclusives.com/wp-content/uploads/2025/11/VN6-768x768.jpeg 768w, https://comclusives.com/wp-content/uploads/2025/11/VN6-85x85.jpeg 85w, https://comclusives.com/wp-content/uploads/2025/11/VN6-80x80.jpeg 80w, https://comclusives.com/wp-content/uploads/2025/11/VN6.jpeg 1024w" sizes="(max-width: 395px) 100vw, 395px" /></p>
<p>La violence numérique est une réalité qui touche toutes les catégories sociales.<br />
Comprendre ces termes permet de mieux protéger les utilisateurs, de renforcer la communication inclusive et d’encourager des comportements plus responsables en ligne.</p>
<p>Sur Comclusives, nous promouvons un usage éthique et respectueux du numérique, fondé sur la dignité humaine et la clarté de la communication.</p>
</div><div class="share-links clearfix"><div class="row justify-content-between"><div class="col-md-auto text-xl-end"><span class="share-links-title">Share:</span><ul class="social-links"><li><a href="https://www.facebook.com/sharer/sharer.php?u=https://comclusives.com/violence-numerique-les-mots-a-connaitre/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> <li><a href="https://twitter.com/share?text=Violence%20num%c3%a9rique%20:%20les%20mots%20%c3%a0%20conna%c3%aetre&amp;url=https://comclusives.com/violence-numerique-les-mots-a-connaitre/" target="_blank"><i class="fab fa-twitter"></i></a></li> <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://comclusives.com/violence-numerique-les-mots-a-connaitre/&amp;title=Violence%20num%c3%a9rique%20:%20les%20mots%20%c3%a0%20conna%c3%aetre" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> <li><a href="http://pinterest.com/pin/create/link/?url=https://comclusives.com/violence-numerique-les-mots-a-connaitre/&amp;media=&amp;description=Violence%20num%c3%a9rique%20:%20les%20mots%20%c3%a0%20conna%c3%aetre" target="_blank"><i class="fab fa-instagram"></i></a></li></ul><!-- End Social Share --></div></div></div></div><!-- Commentaires -->
<div class="th-comments-wrap">
    <h2 class="blog-inner-title h5">
        Commentaires (2)    </h2>
    <ul class="comment-list">
            <li class="comment even thread-even depth-1 th-comment-item">',
                'cover_image' => 'https://comclusives.com/wp-content/uploads/2025/11/Nouveau-projet-2.png',
                'status'           => 'published',
                'published_at'     => Carbon::parse('2026-01-10'),
                'category'         => 'Inclusion',
            ],
        ];

        foreach ($articles as $data) {
            $cat = $data['category'];
            unset($data['category']);
            $data['user_id'] = $admin?->id ?? 1;
            $data['meta_title'] = $data['title'];
            $data['meta_description'] = $data['excerpt'];
            $article = Article::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
            if (isset($catModels[$cat])) {
                $article->categories()->syncWithoutDetaching([$catModels[$cat]->id]);
            }
        }
    }
}
