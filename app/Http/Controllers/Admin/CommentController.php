<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $query = Comment::with('article')->latest();
        if (request('status') === 'pending')  $query->where('approved', false);
        if (request('status') === 'approved') $query->where('approved', true);
        $comments = $query->paginate(20)->withQueryString();
        return view('admin.comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => !$comment->approved]);
        if (request()->expectsJson()) {
            return response()->json(['approved' => $comment->approved]);
        }
        return back()->with('success', 'Statut mis à jour.');
    }

    public function update() {}

    public function destroy(Comment $comment)
    {
        $comment->delete();
        if (request()->expectsJson()) {
            return response()->json(['deleted' => true]);
        }
        return back()->with('success', 'Commentaire supprimé.');
    }
}
