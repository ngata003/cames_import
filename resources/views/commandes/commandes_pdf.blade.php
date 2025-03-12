<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Voir la facture du client </title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 800px;
    margin: 0 auto;
    background: white;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between; /* Espacement entre les éléments à gauche et à droite */
    align-items: center;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.header img {
    width: 100px;
    height: auto;
    margin-right: 20px; /* Espacement à droite du logo */
}

.header h1 {
    font-size: 24px;
    margin: 0;
    text-align: left; /* Aligner le texte à gauche */
}

.header .header-info {
    text-align: right; /* Aligner les informations à droite */
}

.header .header-info p {
    margin: 5px 0; /* Espacement des informations */
}

.details {
    display: flex;
    justify-content: space-between;
    margin-top: 20px; /* Espacement entre les sections */
}

.details div {
    width: 45%;
}

.details div h3 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

.table th {
    background-color: #f2f2f2;
}

.total-row td {
    font-weight: bold;
}

.footer {
    margin-top: 30px;
    border-top: 2px solid #000;
    padding-top: 10px;
    text-align: center;
}

.footer p {
    margin: 5px 0;
}

.footer .address {
    font-size: 14px;
}

    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <img src="assets/images/{{$entreprise->logo_entreprise}}" alt="Logo">
        <h1>{{$entreprise->nom_entreprise}}</h1>
        <div>
            <p><strong>Facture ID:{{$entreprise->id}}</strong> </p>
            <p><strong>Client:</strong> {{$facture->nom_client}}</p>
        </div>
    </div>

    <div class="details">
        <div>
            <h3>Détails de la facture</h3>
            <p><strong>Date:</strong> {{$facture->created_at->format('d/m/y')}}</p>
            <p><strong>moyen paiement:</strong> {{$facture->moyen_paiement}}</p>
        </div>
        <div>
            <h3>Informations client</h3>
            <p>Nom client: {{$facture->nom_client}}</p>
            <p>email: {{$facture->email_client}}</p>
            <p>Téléphone: {{$facture->contact_client}} </p>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Nom Produit</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($commandes as $commande )
         <tr>
            <td>{{$commande->nom_produit}}</td>
            <td>{{$commande->prix_unitaire}}</td>
            <td>{{$commande->quantite_commandee}}</td>
            <td>{{$commande->total}}</td>
          </tr>
        @endforeach
        <tr class="total-row">
            <td colspan="3">Total</td>
            <td> {{$facture->total_commande}} FCFA </td>
        </tr>
        <tr class="total-row">
            <td colspan="3">Montant Paye </td>
            <td>{{$facture->montant_paye}} FCFA </td>
        </tr>
        <tr class="total-row">
            <td colspan="3">Reste </td>
            <td>{{$facture->reste}}</td>
        </tr>
        </tbody>
    </table>

    <div class="footer">
        <p><strong> Numéro d'entreprise:</strong> {{$entreprise->nom_entreprise}} / {{$entreprise->email_entreprise}}</p>
        <p class="address">localisation: {{$entreprise->localisation}} </p>
        <p> <strong> Site-web: {{$entreprise->site_web}}</strong></p>
        <p> <strong> contact : {{$entreprise->fax_entreprise }}</strong></p>
    </div>
</div>

</body>
</html>

