<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px;">
        <h2 style="color: #4F46E5;">Invitation à rejoindre la colocation</h2>
        
        <p>Bonjour,</p>
        <p>Vous avez été invité à rejoindre notre colocation sur <strong>EasyColoc</strong>. Cliquez sur le bouton ci-dessous pour accepter l'invitation :</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('invitations.accept', ['token' => $token]) }}" 
               style="background-color: #4F46E5; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Accepter l'invitation
            </a>
        </div>

        <p style="font-size: 12px; color: #777;">
            Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :<br>
            {{ route('invitations.accept', ['token' => $token]) }}
        </p>
    </div>
</body>
</html>