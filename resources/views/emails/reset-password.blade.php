<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Réinitialisation de mot de passe – Comclusives</title>
</head>
<body style="margin:0;padding:0;background:#f4f7f6;font-family:'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f7f6;padding:40px 0;">
  <tr><td align="center">
    <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

      <tr><td style="background:#0a6b63;border-radius:16px 16px 0 0;padding:32px 40px;text-align:center;">
        <span style="font-size:28px;font-weight:900;color:#ffffff;letter-spacing:-0.5px;font-family:'Helvetica Neue',Arial,sans-serif;">Com<span style="color:#a7f3d0;">clusives</span></span>
      </td></tr>

      <tr><td style="background:#ffffff;padding:48px 40px;text-align:center;">
        <div style="width:64px;height:64px;background:#f0faf9;border-radius:50%;margin:0 auto 24px;display:flex;align-items:center;justify-content:center;">
          <span style="font-size:28px;">🔑</span>
        </div>
        <h1 style="margin:0 0 12px;font-size:22px;font-weight:700;color:#111827;">Réinitialisation de mot de passe</h1>
        <p style="margin:0 0 32px;font-size:15px;color:#4b5563;line-height:1.7;">
          Bonjour {{ $name }},<br>
          Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le bouton ci-dessous pour choisir un nouveau mot de passe.
        </p>

        <a href="{{ $resetUrl }}" style="display:inline-block;background:#0a6b63;color:#ffffff;text-decoration:none;font-size:15px;font-weight:700;padding:16px 40px;border-radius:50px;margin-bottom:32px;">
          Réinitialiser mon mot de passe
        </a>

        <p style="margin:0 0 8px;font-size:13px;color:#9ca3af;">Ce lien expire dans <strong>60 minutes</strong>.</p>
        <p style="margin:0 0 24px;font-size:13px;color:#9ca3af;">Si vous n'avez pas demandé cette réinitialisation, ignorez ce message.</p>

        <div style="border-top:1px solid #f3f4f6;padding-top:24px;margin-top:8px;">
          <p style="margin:0;font-size:12px;color:#d1d5db;">Si le bouton ne fonctionne pas, copiez ce lien dans votre navigateur :</p>
          <p style="margin:8px 0 0;font-size:12px;color:#0a6b63;word-break:break-all;">{{ $resetUrl }}</p>
        </div>
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
