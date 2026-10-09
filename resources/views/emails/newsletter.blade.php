@component('mail::message')
# 📰 {{ $article->title }}

{{ $article->excerpt }}

@component('mail::button', ['url' => route('blog.show', $article->slug), 'color' => 'primary'])
Lire l'article
@endcomponent

---

*Vous recevez cet e-mail car vous êtes abonné à la newsletter Comclusives.*

[Se désabonner]({{ route('newsletter.unsubscribe', $subscriber->token) }})

© {{ date('Y') }} Comclusives
@endcomponent
