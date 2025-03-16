<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport pdf des commandes </title>
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
            </td>
        </tr>
        <tr class="bg-blue">
            <th colspan="4"> Entreprise Details </th>
        </tr>
        <tr>
            <td>Nom :</td><td>{{$entreprise->nom_entreprise}}</td>
            <td>Email Entreprise  :</td><td>{{$entreprise->email_entreprise}}</td>
        </tr>
        <tr>
            <td> Fax Entreprise :</td><td>{{$entreprise->fax_entreprise}}</td>
            <td> Localisation :</td><td>{{$entreprise->localisation}}</td>
        </tr>
        <tr>
            <td> Site Web  :</td><td>{{$entreprise->fax_entreprise}}</td>
            <td> Nom responsable :</td><td>{{$entreprise->nom_gestionnaire}}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="no-border text-start heading" colspan="5">
                Toutes les commandes Enregistrées
            </th>
        </tr>
        <tr class="bg-blue">
            <th> Nom client</th>
            <th> Email Client </th>
            <th> Montant paye </th>
            <th> Total commande </th>
            <th> reste </th>
            <th> moyen paiement </th>
        </tr>
        @foreach ($factures  as $fact)
        <tr>
            <td>{{$fact->nom_client}}</td>
            <td>{{$fact->email_client}}</td>
            <td>{{$fact->montant_paye}}</td>
            <td>{{$fact->total_achat}}</td>
            <td>{{$fact->reste}}</td>
            <td>{{$fact->moyen_paiement}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
