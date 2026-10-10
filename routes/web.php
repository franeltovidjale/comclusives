<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// ─── FRONT ───────────────────────────────────────────
Route::get('/offline', fn() => view('offline'))->name('offline');
Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/a-propos', [ArticleController::class, 'about'])->name('about');
Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [ArticleController::class, 'show'])->name('blog.show');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/confidentialite', fn() => view('legal.privacy'))->name('privacy');
Route::get('/mentions-legales', fn() => view('legal.mentions'))->name('mentions');
Route::get('/conditions-utilisation', fn() => view('legal.terms'))->name('terms');
Route::get('/learn-french', fn() => view('learn-french'))->name('learn-french');
Route::get('/tamtal', fn() => view('tamtal'))->name('tamtal');

// Newsletter
Route::post('/newsletter/subscribe', [SubscriberController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/confirm/{token}', [SubscriberController::class, 'confirm'])->name('newsletter.confirm');
Route::get('/newsletter/unsubscribe/{token}', [SubscriberController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Commentaires
Route::post('/comments/send-otp', [CommentController::class, 'sendOtp'])->name('comments.send-otp');
Route::post('/blog/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

// Sitemap
Route::get('/sitemap.xml', [ArticleController::class, 'sitemap'])->name('sitemap');

// ─── ADMIN ───────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles', Admin\ArticleController::class);
    Route::patch('articles/{article}/publish', [Admin\ArticleController::class, 'publish'])->name('articles.publish');
    Route::patch('articles/{article}/unpublish', [Admin\ArticleController::class, 'unpublish'])->name('articles.unpublish');
    Route::post('articles/{article}/send-newsletter', [Admin\ArticleController::class, 'sendNewsletter'])->name('articles.newsletter');

    Route::resource('comments', Admin\CommentController::class)->only(['index','update','destroy']);
    Route::patch('comments/{comment}/approve', [Admin\CommentController::class, 'approve'])->name('comments.approve');

    Route::get('subscribers', [Admin\SubscriberController::class, 'index'])->name('subscribers.index');
    Route::delete('subscribers/{subscriber}', [Admin\SubscriberController::class, 'destroy'])->name('subscribers.destroy');

    Route::get('profile', [Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::patch('profile/password', [Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
});

require __DIR__.'/auth.php';
