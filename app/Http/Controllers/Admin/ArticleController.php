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
use Intervention\Image\Laravel\Facades\Image;

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
                Storage::disk('public')->delete($article->cover_image);
                Storage::disk('public')->delete(str_replace('.webp', '_thumb.webp', $article->cover_image));
            }
            $data['cover_image'] = $this->handleImage($request);
        }

        $article->update($data);
        $article->categories()->sync($request->input('categories', []));

        return back()->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        if ($article->cover_image && !str_starts_with($article->cover_image, 'http')) {
            Storage::disk('public')->delete($article->cover_image);
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
        if ($article->newsletter_sent) {
            return back()->with('error', 'Newsletter déjà envoyée pour cet article.');
        }
        $subscribers = Subscriber::confirmed()->get();
        foreach ($subscribers as $sub) {
            Mail::to($sub->email)->queue(new NewsletterMail($article, $sub));
        }
        $article->update(['newsletter_sent' => true]);
        return back()->with('success', "Newsletter envoyée à {$subscribers->count()} abonnés.");
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
            'categories'       => 'array',
            'categories.*'     => 'exists:categories,id',
        ]);
    }

    private function handleImage(Request $request): ?string
    {
        if (!$request->hasFile('cover_image')) return null;

        $file = $request->file('cover_image');
        $name = Str::uuid().'.webp';
        $path = 'articles/'.$name;
        $thumbPath = 'articles/thumbs/'.$name;

        // Convertir en WebP + redimensionner (performance)
        $img = Image::read($file);
        $img->scaleDown(1200)->toWebp(82)->save(storage_path('app/public/'.$path));

        $img->scaleDown(400)->toWebp(75)->save(storage_path('app/public/'.$thumbPath));

        return $path;
    }
}
