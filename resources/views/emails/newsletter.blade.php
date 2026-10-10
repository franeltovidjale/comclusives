<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $article->title }} – Comclusives</title>
</head>
<body style="margin:0;padding:0;background:#f4f7f6;font-family:'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7f6;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

      <tr><td style="background:#0a6b63;border-radius:16px 16px 0 0;padding:28px 40px;text-align:center;">
        <span style="font-size:28px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;font-family:'Helvetica Neue',Arial,sans-serif;">Com<span style="color:#a7f3d0;">clusives</span></span>
        <p style="margin:12px 0 0;font-size:13px;color:#a7f3d0;letter-spacing:1px;text-transform:uppercase;">Nouvel article</p>
      </td></tr>

      @if($article->cover_url)
      <tr><td style="background:#ffffff;padding:0;">
        <img src="{{ $article->cover_url }}" alt="{{ $article->cover_alt ?? $article->title }}"
             style="width:100%;max-height:300px;object-fit:cover;display:block;">
      </td></tr>
      @endif

      <tr><td style="background:#ffffff;padding:40px 40px 32px;">

        @foreach($article->categories->take(2) as $cat)
        <span style="display:inline-block;padding:4px 12px;border-radius:50px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;color:#ffffff;background:{{ $cat->color ?? '#0a6b63' }};margin-bottom:16px;margin-right:6px;">
          {{ $cat->name }}
        </span>
        @endforeach

        <h1 style="margin:0 0 16px;font-size:28px;font-weight:800;color:#111827;line-height:1.3;">
          {{ $article->title }}
        </h1>

        @if($article->excerpt)
        <p style="margin:0 0 32px;font-size:16px;color:#4b5563;line-height:1.8;border-left:4px solid #0a6b63;padding-left:16px;">
          {{ $article->excerpt }}
        </p>
        @endif

        <table cellpadding="0" cellspacing="0" style="margin:0 auto 16px;">
          <tr><td style="background:#0a6b63;border-radius:50px;">
            <a href="{{ route('blog.show', $article->slug) }}"
               style="display:block;padding:16px 48px;color:#ffffff;font-size:16px;font-weight:700;text-decoration:none;">
              Lire l'article
            </a>
          </td></tr>
        </table>

        <p style="margin:0;text-align:center;font-size:13px;color:#9ca3af;">
          Temps de lecture : {{ max(1, (int)(str_word_count(strip_tags($article->content)) / 200)) }} min
        </p>
      </td></tr>

      <tr><td style="background:#ffffff;padding:0 40px 32px;">
        <hr style="border:none;border-top:1px solid #e5e7eb;margin:0;">
      </td></tr>

      <tr><td style="background:#f0faf9;padding:28px 40px;text-align:center;">
        <p style="margin:0 0 4px;font-size:15px;font-weight:700;color:#0a6b63;">Rejoignez notre communauté</p>
        <p style="margin:0 0 16px;font-size:13px;color:#6b7280;">Suivez-nous pour plus de contenu sur la communication inclusive</p>
        <a href="https://whatsapp.com/channel/0029VbBrIFhA2pLHVsi5ul47"
           style="display:inline-block;padding:10px 24px;background:#25D366;border-radius:50px;color:#ffffff;font-size:13px;font-weight:700;text-decoration:none;">
          Notre chaîne WhatsApp
        </a>
      </td></tr>

      <tr><td style="background:#0f1923;border-radius:0 0 16px 16px;padding:28px 40px;text-align:center;">
        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">
          © {{ date('Y') }} Comclusives ·
          <a href="https://comclusives.com" style="color:#4ade80;text-decoration:none;">comclusives.com</a>
        </p>
        <p style="margin:0 0 12px;font-size:12px;color:#6b7280;">
          Vous recevez cet email car vous êtes abonné à la newsletter Comclusives.
        </p>
        <a href="{{ route('newsletter.unsubscribe', $subscriber->token) }}"
           style="font-size:12px;color:#6b7280;text-decoration:underline;">
          Se désabonner
        </a>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
