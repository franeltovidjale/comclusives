<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmez votre abonnement – Comclusives</title>
</head>
<body style="margin:0;padding:0;background:#f4f7f6;font-family:'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7f6;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

      <tr><td style="background:#0a6b63;border-radius:16px 16px 0 0;padding:32px 40px;text-align:center;">
        <span style="font-size:28px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;font-family:'Helvetica Neue',Arial,sans-serif;">Com<span style="color:#a7f3d0;">clusives</span></span>
      </td></tr>

      <tr><td style="background:#ffffff;padding:48px 40px;">
        <h1 style="margin:0 0 16px;font-size:26px;font-weight:700;color:#111827;">Confirmez votre abonnement</h1>
        <p style="margin:0 0 12px;font-size:16px;color:#4b5563;line-height:1.7;">
          Bonjour {{ $subscriber->name ?? 'ami(e)' }},
        </p>
        <p style="margin:0 0 32px;font-size:16px;color:#4b5563;line-height:1.7;">
          Merci de rejoindre la communauté <strong>Comclusives</strong>. Cliquez sur le bouton ci-dessous pour confirmer votre abonnement et commencer à recevoir nos articles sur la communication inclusive, l'éducation et la diversité.
        </p>

        <table cellpadding="0" cellspacing="0" style="margin:0 auto 32px;">
          <tr><td style="background:#0a6b63;border-radius:50px;">
            <a href="{{ route('newsletter.confirm', $subscriber->token) }}"
               style="display:block;padding:16px 40px;color:#ffffff;font-size:16px;font-weight:700;text-decoration:none;letter-spacing:0.3px;">
              Confirmer mon abonnement
            </a>
          </td></tr>
        </table>

        <p style="margin:0 0 8px;font-size:14px;color:#9ca3af;text-align:center;">
          Ce lien expire dans 48 heures.
        </p>
        <p style="margin:0;font-size:14px;color:#9ca3af;text-align:center;">
          Si vous n'avez pas demandé cet abonnement, ignorez simplement ce message.
        </p>
      </td></tr>

      <tr><td style="background:#ffffff;padding:0 40px;">
        <hr style="border:none;border-top:1px solid #e5e7eb;margin:0;">
      </td></tr>

      <tr><td style="background:#ffffff;padding:32px 40px;">
        <p style="margin:0 0 16px;font-size:14px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:0.5px;">Ce que vous recevrez</p>
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td width="33%" style="padding:12px;background:#f0faf9;border-radius:12px;text-align:center;">
              <div style="font-size:13px;color:#374151;font-weight:600;">Articles exclusifs</div>
            </td>
            <td width="4%"></td>
            <td width="33%" style="padding:12px;background:#f0faf9;border-radius:12px;text-align:center;">
              <div style="font-size:13px;color:#374151;font-weight:600;">Inclusion &amp; diversite</div>
            </td>
            <td width="4%"></td>
            <td width="33%" style="padding:12px;background:#f0faf9;border-radius:12px;text-align:center;">
              <div style="font-size:13px;color:#374151;font-weight:600;">Ressources pratiques</div>
            </td>
          </tr>
        </table>
      </td></tr>

      <tr><td style="background:#0f1923;border-radius:0 0 16px 16px;padding:28px 40px;text-align:center;">
        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">
          © {{ date('Y') }} Comclusives · <a href="https://comclusives.com" style="color:#4ade80;text-decoration:none;">comclusives.com</a>
        </p>
        <p style="margin:0;font-size:12px;color:#6b7280;">
          Cotonou, Bénin · contact@comclusives.com
        </p>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
