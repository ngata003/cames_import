<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Compte Créé </title>
</head>
<body>
    <p>Bonjour {{ $name }},</p>

    <p>Votre compte a été créé avec succès.</p>

    <p>Voici vos informations de connexion :</p>
    <ul>
        <li><strong>Email :</strong> {{ $email }}</li>
        <li><strong>Mot de passe :</strong> {{ $password }}</li>
        <p> le lien de connexion est : </p>
    </ul>

    <p>Nous vous recommandons de modifier votre mot de passe après votre première connexion.</p>

    <p>Cordialement,</p>
    <p><strong> CAMES ORGANISATION </strong></p>
</body>
</html>

