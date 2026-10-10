<?php
namespace App\Http\Controllers;

use App\Mail\CommentOtpMail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'author_name'  => 'required|string|max:100',
            'author_email' => 'required|email|max:255',
            'body'         => 'required|string|max:2000',
            'slug'         => 'required|string',
        ]);

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $key = 'comment_otp_'.md5($data['author_email'].'_'.$data['slug']);

        Cache::put($key, [
            'otp'          => $otp,
            'author_name'  => $data['author_name'],
            'author_email' => $data['author_email'],
            'body'         => $data['body'],
            'slug'         => $data['slug'],
        ], now()->addMinutes(10));

        Mail::to($data['author_email'])->send(new CommentOtpMail($otp, $data['author_name']));

        return response()->json(['sent' => true]);
    }

    public function store(Request $request, string $slug)
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'author_name'  => 'required|string|max:100',
            'author_email' => 'required|email|max:255',
            'body'         => 'required|string|max:2000',
            'otp'          => 'required|string|size:6',
            'parent_id'    => 'nullable|exists:comments,id',
        ]);

        $key = 'comment_otp_'.md5($data['author_email'].'_'.$slug);
        $cached = Cache::get($key);

        if (!$cached || $cached['otp'] !== $data['otp']) {
            return response()->json(['error' => 'Code incorrect ou expiré.'], 422);
        }

        Cache::forget($key);

        $comment = $article->comments()->create([
            'author_name'  => $cached['author_name'],
            'author_email' => $cached['author_email'],
            'body'         => $cached['body'],
            'parent_id'    => $data['parent_id'] ?? null,
            'approved'     => false,
        ]);

        // Ajouter l'email à la newsletter si pas déjà abonné
        if (!Subscriber::where('email', $cached['author_email'])->exists()) {
            Subscriber::create([
                'email'        => $cached['author_email'],
                'name'         => $cached['author_name'],
                'confirmed'    => true,
                'confirmed_at' => now(),
            ]);
        }

        return response()->json(['message' => 'Commentaire soumis, en attente de modération.']);
    }

    public function like(Comment $comment)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'login_required'], 401);
        }
        $action = request()->input('action', 'like');
        if ($action === 'unlike') {
            $comment->decrement('likes');
            return response()->json(['likes' => max(0, $comment->fresh()->likes), 'liked' => false]);
        }
        $comment->increment('likes');
        return response()->json(['likes' => $comment->fresh()->likes, 'liked' => true]);
    }
}
