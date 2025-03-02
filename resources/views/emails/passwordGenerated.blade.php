<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre mot de passe temporaire</title>
</head>
<body>
    <p>Bonjour {{ $user->name }},</p>
    <p>Nous vous envoyons votre mot de passe temporaire pour accéder à votre compte. Voici votre mot de passe :</p>
    <p><strong>{{ $password }}</strong></p>
    <p>Nous vous recommandons de vous connecter dès que possible et de modifier ce mot de passe dans votre profil.</p>
    <p>Si vous avez des questions ou avez besoin d'aide, n'hésitez pas à nous contacter.</p>
    <br>
    <p>Merci et à bientôt,</p>
    <p>L'équipe de support de {{ config('app.name') }}</p>
</body>
</html>
