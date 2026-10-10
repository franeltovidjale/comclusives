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

        $comments = $article->approvedComments->map(fn($c) => [
            'id'   => $c->id,
            'name' => $c->author_name,
            'text' => $c->body,
            'date' => $c->created_at->diffForHumans(),
            'likes'=> $c->likes,
        ])->values();

        return view('blog.show', compact('article', 'related', 'popular', 'categories', 'prev', 'next', 'comments'));
    }

    public function sitemap()
    {
        $articles = Article::published()->latest('published_at')->get(['slug','updated_at']);

        $urls = collect([
            ['loc' => url('/'),         'changefreq' => 'weekly',  'priority' => '1.0'],
            ['loc' => url('/blog'),     'changefreq' => 'daily',   'priority' => '0.9'],
            ['loc' => url('/a-propos'), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ]);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        foreach ($urls as $u) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$u['loc']}</loc>\n";
            $xml .= "    <changefreq>{$u['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$u['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        foreach ($articles as $article) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>".url('/blog/'.$article->slug)."</loc>\n";
            $xml .= "    <lastmod>{$article->updated_at->toAtomString()}</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.8</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
