<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Relevé {{$facture->id}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }
        .bg-blue {
            background-color: #0073e6;
            color: #fff;
        }
        .text-end {
            text-align: right;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <td colspan="2">
                <img src="assets/images/{{$entreprise->logo_entreprise}}" height="60" alt="Logo">
            </td>
            <td colspan="2" class="text-end">
                <strong>Facture #{{$facture->id}}</strong><br>
                <span>Date: {{$facture->created_at->format('d/m/Y')}}</span>
            </td>
        </tr>
        <tr class="bg-blue">
            <th colspan="2">Entreprise</th>
            <th colspan="2">Client</th>
        </tr>
        <tr>
            <td>Nom :</td><td>{{$entreprise->nom_entreprise}}</td>
            <td>Nom :</td><td>{{$facture->nom_client}}</td>
        </tr>
        <tr>
            <td>Email :</td><td>{{$entreprise->email_entreprise}}</td>
            <td>Email :</td><td>{{$facture->email_client}}</td>
        </tr>
        <tr>
            <td>Fax :</td><td>{{$entreprise->fax_entreprise}}</td>
            <td>Contact :</td><td>{{$facture->numero_client}}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="no-border text-start heading" colspan="5">
                produits
            </th>
        </tr>
        <tr class="bg-blue">
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Total</th>
        </tr>
        @foreach ($commandes as $commande)
        <tr>
            <td>{{$commande->nom_produit}}</td>
            <td>{{$commande->qte_commandee}}</td>
            <td>{{$commande->prix_unitaire}}</td>
            <td>{{$commande->total}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="total">Total Commande :</td>
            <td class="total">{{$facture->total_achat}}</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Montant Payé :</td>
            <td class="total">{{$facture->montant_paye}}</td>
        </tr>
        <tr>
            <td colspan="3" class="total">Reste :</td>
            <td class="total">{{$facture->reste}}</td>
        </tr>
    </table>

    <p class="text-center">
        {{$entreprise->localisation}} | {{$entreprise->fax_entreprise}} | {{$entreprise->site_web}} | {{$entreprise->email_entreprise}}
    </p>

</body>
</html>
