<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'published'       => Article::where('status','published')->count(),
            'drafts'          => Article::where('status','draft')->count(),
            'pending_comments'=> Comment::where('approved', false)->count(),
            'subscribers'     => Subscriber::confirmed()->count(),
            'total_views'     => Article::sum('views'),
        ];
        $recentArticles  = Article::with('categories')->latest()->take(5)->get();
        $pendingComments = Comment::with('article')->where('approved', false)->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentArticles', 'pendingComments'));
    }
}
