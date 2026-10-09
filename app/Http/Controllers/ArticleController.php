<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function home()
    {
        $featured = Article::published()->with('categories')->latest('published_at')->take(3)->get();
        return view('home', compact('featured'));
    }

    public function about()
    {
        $latest = Article::published()->with('categories')->latest('published_at')->take(3)->get();
        return view('a-propos', compact('latest'));
    }

    public function index(Request $request)
    {
        $query = Article::published()->with('categories')->latest('published_at');

        if ($request->filled('cat')) {
            $query->whereHas('categories', fn($q) => $q->where('slug', $request->cat));
        }
        if ($request->filled('q')) {
            $s = $request->q;
            $query->where(fn($r) => $r->where('title','like',"%$s%")->orWhere('excerpt','like',"%$s%"));
        }

        $articles   = $query->paginate(9)->withQueryString();
        $categories = Category::withCount(['articles' => fn($q) => $q->published()])->get();
        return view('blog.index', compact('articles', 'categories'));
    }

    public function show(string $slug)
    {
        $article = Article::published()->where('slug', $slug)
            ->with(['categories', 'author', 'approvedComments.replies'])
            ->firstOrFail();

        $article->incrementViews();

        $related = Article::published()
            ->whereHas('categories', fn($q) => $q->whereIn('id', $article->categories->pluck('id')))
            ->where('id', '!=', $article->id)
            ->with('categories')
            ->latest('published_at')
            ->take(3)
            ->get();

        $popular = Article::published()
            ->where('id', '!=', $article->id)
            ->with('categories')
            ->orderByDesc('views')
            ->take(5)
            ->get();

        $categories = \App\Models\Category::all();

        $prev = Article::published()->where('published_at', '<', $article->published_at)->latest('published_at')->first();
        $next = Article::published()->where('published_at', '>', $article->published_at)->oldest('published_at')->first();

        return view('blog.show', compact('article', 'related', 'popular', 'categories', 'prev', 'next'));
    }

    public function sitemap()
    {
        $articles = Article::published()->latest('published_at')->get(['slug','updated_at']);
        return response()->view('sitemap', compact('articles'))
            ->header('Content-Type', 'application/xml');
    }
}
