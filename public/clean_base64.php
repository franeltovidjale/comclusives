<?php
// Script temporaire - À SUPPRIMER après utilisation
define('LARAVEL_START', microtime(true));
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->boot();

use App\Models\Article;
use Illuminate\Support\Str;

$articles = Article::all();
$count = 0;

foreach ($articles as $a) {
    if (!str_contains($a->content, 'data:image')) continue;

    $a->content = preg_replace_callback(
        '/src="data:image\/(png|jpeg|jpg|gif|webp);base64,([^"]+)"/i',
        function ($m) {
            $ext  = $m[1] === 'jpeg' ? 'jpg' : $m[1];
            $data = base64_decode($m[2]);
            if (!$data) return 'src=""';
            $name = Str::uuid() . '.' . $ext;
            $dir  = public_path('uploads/articles');
            if (!is_dir($dir)) mkdir($dir, 0755, true);
            file_put_contents($dir . '/' . $name, $data);
            return 'src="/uploads/articles/' . $name . '"';
        },
        $a->content
    );
    $a->save();
    $count++;
    echo "Article {$a->id} ({$a->title}) nettoyé\n";
}

echo "\nTerminé. {$count} article(s) nettoyé(s).\n";
echo "\n⚠️  SUPPRIME CE FICHIER : rm public/clean_base64.php\n";
