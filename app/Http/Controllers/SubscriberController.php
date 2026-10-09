<?php
namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'name'  => 'nullable|string|max:100',
        ]);

        $sub = Subscriber::firstOrCreate(['email' => $data['email']], [
            'name' => $data['name'] ?? null,
        ]);

        if (!$sub->confirmed) {
            // Envoyer email de confirmation
            Mail::to($sub->email)->send(new \App\Mail\ConfirmSubscriptionMail($sub));
        }

        return back()->with('newsletter_success', 'Vérifiez votre boîte mail pour confirmer votre abonnement.');
    }

    public function confirm(string $token)
    {
        $sub = Subscriber::where('token', $token)->firstOrFail();
        if (!$sub->confirmed) {
            $sub->update(['confirmed' => true, 'confirmed_at' => now()]);
        }
        return view('newsletter.confirmed');
    }

    public function unsubscribe(string $token)
    {
        $sub = Subscriber::where('token', $token)->firstOrFail();
        $sub->delete();
        return view('newsletter.unsubscribed');
    }
}
