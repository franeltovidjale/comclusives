<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Code de vérification – Comclusives</title>
</head>
<body style="margin:0;padding:0;background:#f4f7f6;font-family:'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7f6;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

      {{-- Header --}}
      <tr><td style="background:#0a6b63;border-radius:16px 16px 0 0;padding:32px 40px;text-align:center;">
        <img src="https://comclusives.com/images/logo-horizontal.png" alt="Comclusives" style="height:40px;max-width:180px;">
      </td></tr>

      {{-- Body --}}
      <tr><td style="background:#ffffff;padding:48px 40px;text-align:center;">
        <div style="font-size:32px;margin-bottom:16px;">💬</div>
        <h1 style="margin:0 0 12px;font-size:22px;font-weight:700;color:#111827;">Confirmez votre commentaire</h1>
        <p style="margin:0 0 32px;font-size:15px;color:#4b5563;line-height:1.7;">
          Bonjour {{ $name }},<br>
          Utilisez le code ci-dessous pour valider votre commentaire sur <strong>Comclusives</strong>.
        </p>

        {{-- OTP Code --}}
        <div style="background:#f0faf9;border-radius:16px;padding:32px 40px;display:inline-block;margin-bottom:32px;">
          <p style="margin:0 0 8px;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:#0a6b63;">Votre code</p>
          <p style="margin:0;font-size:48px;font-weight:900;letter-spacing:12px;color:#0a6b63;font-family:'Courier New',monospace;">{{ $otp }}</p>
        </div>

        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">Ce code expire dans <strong>10 minutes</strong>.</p>
        <p style="margin:0;font-size:13px;color:#9ca3af;">Si vous n'avez pas laissé de commentaire, ignorez ce message.</p>
      </td></tr>

      {{-- Footer --}}
      <tr><td style="background:#0f1923;border-radius:0 0 16px 16px;padding:28px 40px;text-align:center;">
        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">
          © {{ date('Y') }} Comclusives ·
          <a href="https://comclusives.com" style="color:#4ade80;text-decoration:none;">comclusives.com</a>
        </p>
        <p style="margin:0;font-size:12px;color:#6b7280;">Cotonou, Bénin · contact@comclusives.com</p>
      </td></tr>

    </table>
  </td></tr>
</table>
</body>
</html>
