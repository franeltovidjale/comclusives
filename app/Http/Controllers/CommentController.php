<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, string $slug)
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'author_name'  => 'required|string|max:100',
            'author_email' => 'required|email|max:255',
            'body'         => 'required|string|max:2000',
            'parent_id'    => 'nullable|exists:comments,id',
        ]);

        $comment = $article->comments()->create([
            ...$data,
            'approved' => false, // modération
        ]);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Commentaire soumis, en attente de modération.']);
        }
        return back()->with('comment_pending', 'Votre commentaire est en attente de modération.');
    }

    public function like(Comment $comment)
    {
        $comment->increment('likes');
        return response()->json(['likes' => $comment->likes]);
    }
}
