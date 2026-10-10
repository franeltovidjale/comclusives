<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Subscriber;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('categories')->latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateArticle($request);
        $data['user_id'] = auth()->id();
        $data['cover_image'] = $this->handleImage($request);
        if (($data['status'] ?? null) === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $article = Article::create($data);
        $article->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.articles.edit', $article)->with('success', 'Article créé.');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.form', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $this->validateArticle($request, $article);
        if ($request->hasFile('cover_image')) {
            if ($article->cover_image && !str_starts_with($article->cover_image, 'http')) {
                $old = public_path($article->cover_image);
                if (file_exists($old)) @unlink($old);
            }
            $data['cover_image'] = $this->handleImage($request);
        }

        if (($data['status'] ?? null) === 'published' && !$article->published_at && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $article->update($data);
        $article->categories()->sync($request->input('categories', []));

        return back()->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        if ($article->cover_image && !str_starts_with($article->cover_image, 'http')) {
            $old = public_path($article->cover_image);
            if (file_exists($old)) @unlink($old);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article supprimé.');
    }

    public function publish(Article $article)
    {
        $article->update(['status' => 'published', 'published_at' => now()]);
        return back()->with('success', 'Article publié.');
    }

    public function unpublish(Article $article)
    {
        $article->update(['status' => 'draft']);
        return back()->with('success', 'Article dépublié.');
    }

    public function sendNewsletter(Article $article)
    {
        $subscribers = Subscriber::confirmed()->get();
        foreach ($subscribers as $sub) {
            Mail::to($sub->email)->send(new NewsletterMail($article, $sub));
        }
        $article->update(['newsletter_sent' => true]);
        return back()->with('success', "Newsletter envoyée à {$subscribers->count()} abonné(s).");
    }

    private function validateArticle(Request $request, ?Article $article = null): array
    {
        return $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:articles,slug'.($article ? ','.$article->id : ''),
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'cover_image'      => $article ? 'nullable|image|max:5120' : 'nullable|image|max:5120',
            'cover_alt'        => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'status'           => 'in:draft,published',
            'published_at'     => 'nullable|date',
            'categories'       => 'array',
            'categories.*'     => 'exists:categories,id',
        ]);
    }

    private function handleImage(Request $request): ?string
    {
        if (!$request->hasFile('cover_image')) return null;

        $file = $request->file('cover_image');
        $ext  = strtolower($file->getClientOriginalExtension()) ?: 'jpg';
        $name = Str::uuid().'.'.$ext;
        $path = 'articles/'.$name;

        $dest = public_path('uploads/articles');
        File::ensureDirectoryExists($dest);
        File::ensureDirectoryExists($dest.'/thumbs');

        $file->move($dest, $name);

        // Générer une miniature 400px avec GD si disponible
        if (function_exists('imagecreatefromjpeg')) {
            $this->makeThumb($dest.'/'.$name, $dest.'/thumbs/'.$name, 400);
        }

        return 'uploads/articles/'.$name;
    }

    private function makeThumb(string $src, string $dest, int $maxW): void
    {
        $info = @getimagesize($src);
        if (!$info) return;

        [$w, $h, $type] = [$info[0], $info[1], $info[2]];
        if ($w <= $maxW) { copy($src, $dest); return; }

        $ratio  = $maxW / $w;
        $newH   = (int) ($h * $ratio);

        $orig = match($type) {
            IMAGETYPE_JPEG => @imagecreatefromjpeg($src),
            IMAGETYPE_PNG  => @imagecreatefrompng($src),
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($src) : null,
            default        => null,
        };
        if (!$orig) { copy($src, $dest); return; }

        $thumb = imagecreatetruecolor($maxW, $newH);
        imagecopyresampled($thumb, $orig, 0, 0, 0, 0, $maxW, $newH, $w, $h);

        match($type) {
            IMAGETYPE_PNG  => imagepng($thumb, $dest, 7),
            default        => imagejpeg($thumb, $dest, 82),
        };

        imagedestroy($orig);
        imagedestroy($thumb);
    }
}
