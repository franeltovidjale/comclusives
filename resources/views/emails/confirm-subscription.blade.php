@component('mail::message')
# Confirmez votre abonnement

Bonjour {{ $subscriber->name ?? 'ami(e)' }},

Merci pour votre intérêt pour **Comclusives** ! Cliquez ci-dessous pour confirmer votre abonnement à notre newsletter.

@component('mail::button', ['url' => route('newsletter.confirm', $subscriber->token)])
Confirmer mon abonnement
@endcomponent

Si vous n'avez pas demandé cet abonnement, ignorez simplement ce message.

© {{ date('Y') }} Comclusives
@endcomponent
