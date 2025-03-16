<!DOCTYPE html>
<html>
<head>
    <title>Alerte Importateur</title>
</head>
<body>
    <h2>Alerte Achat</h2>
    <p>Bonjour,{{$nom_gestionnaire}}</p>
    <p>Le client <strong>{{ $nom_client }}</strong> a passé une commande d'un montant total de <strong>{{ $total_achat }} FCFA</strong>.</p>
    <p> Entreprise : {{$nom_entreprise}}</p>
    <p>Merci.</p>
</body>
</html>
