<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouveau message de contact – Comclusives</title>
</head>
<body style="margin:0;padding:0;background:#f4f7f6;font-family:'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7f6;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

      <tr><td style="background:#0a6b63;border-radius:16px 16px 0 0;padding:32px 40px;text-align:center;">
        <span style="font-size:28px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;font-family:'Helvetica Neue',Arial,sans-serif;">Com<span style="color:#a7f3d0;">clusives</span></span>
      </td></tr>

      <tr><td style="background:#ffffff;padding:48px 40px;">
        <h1 style="margin:0 0 8px;font-size:20px;font-weight:700;color:#111827;">Nouveau message de contact</h1>
        <p style="margin:0 0 32px;font-size:14px;color:#6b7280;">Reçu via le formulaire de contact de comclusives.com</p>

        <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;margin-bottom:28px;">
          <tr style="background:#f9fafb;">
            <td style="padding:12px 16px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;width:130px;">Nom</td>
            <td style="padding:12px 16px;font-size:14px;color:#111827;font-weight:600;">{{ $senderName }}</td>
          </tr>
          <tr style="border-top:1px solid #e5e7eb;">
            <td style="padding:12px 16px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;">E-mail</td>
            <td style="padding:12px 16px;font-size:14px;color:#0a6b63;"><a href="mailto:{{ $senderEmail }}" style="color:#0a6b63;text-decoration:none;">{{ $senderEmail }}</a></td>
          </tr>
          @if($phone)
          <tr style="border-top:1px solid #e5e7eb;">
            <td style="padding:12px 16px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;">Téléphone</td>
            <td style="padding:12px 16px;font-size:14px;color:#111827;">{{ $phone }}</td>
          </tr>
          @endif
          <tr style="border-top:1px solid #e5e7eb;">
            <td style="padding:12px 16px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;">Objet</td>
            <td style="padding:12px 16px;font-size:14px;color:#111827;">{{ $topic }}</td>
          </tr>
        </table>

        <div style="background:#f0faf9;border-radius:12px;padding:24px 28px;margin-bottom:28px;">
          <p style="margin:0 0 10px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#0a6b63;">Message</p>
          <p style="margin:0;font-size:15px;color:#374151;line-height:1.75;white-space:pre-wrap;">{{ $body }}</p>
        </div>

        <a href="mailto:{{ $senderEmail }}" style="display:inline-block;padding:12px 28px;background:#0a6b63;color:#fff;border-radius:50px;font-size:14px;font-weight:600;text-decoration:none;">Répondre à {{ $senderName }}</a>
      </td></tr>

      <tr><td style="background:#0f1923;border-radius:0 0 16px 16px;padding:28px 40px;text-align:center;">
        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">
          © 2025 Comclusives ·
          <a href="https://comclusives.com" style="color:#0d9488;text-decoration:none;">comclusives.com</a>
        </p>
        <p style="margin:0;font-size:12px;color:#6b7280;">Cotonou, Bénin · contact@comclusives.com</p>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
