<?php
// Script temporaire - À SUPPRIMER après utilisation
$env = parse_ini_file(__DIR__.'/../.env');
$pdo = new PDO(
    "mysql:host={$env['DB_HOST']};dbname={$env['DB_DATABASE']};charset=utf8mb4",
    $env['DB_USERNAME'],
    $env['DB_PASSWORD']
);

$articles = $pdo->query("SELECT id, title, content FROM articles WHERE content LIKE '%data:image%'")->fetchAll(PDO::FETCH_ASSOC);
$count = 0;

foreach ($articles as $a) {
    $content = preg_replace_callback(
        '/src="data:image\/(png|jpeg|jpg|gif|webp);base64,([^"]+)"/i',
        function ($m) {
            $ext  = $m[1] === 'jpeg' ? 'jpg' : $m[1];
            $data = base64_decode($m[2]);
            if (!$data) return 'src=""';
            $name = bin2hex(random_bytes(16)) . '.' . $ext;
            $dir  = __DIR__ . '/uploads/articles';
            if (!is_dir($dir)) mkdir($dir, 0755, true);
            file_put_contents($dir . '/' . $name, $data);
            return 'src="/uploads/articles/' . $name . '"';
        },
        $a['content']
    );

    $stmt = $pdo->prepare("UPDATE articles SET content = ? WHERE id = ?");
    $stmt->execute([$content, $a['id']]);
    $count++;
    echo "Article {$a['id']} ({$a['title']}) nettoyé\n";
}

echo "\nTerminé. {$count} article(s) nettoyé(s).\n";
echo "\n⚠️  SUPPRIME CE FICHIER : rm public/clean_base64.php\n";
