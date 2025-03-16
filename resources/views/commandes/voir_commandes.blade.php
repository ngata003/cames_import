<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 150px;
        }

        .logo img {
            width: 100%;
        }

        .facture-info {
            text-align: right;
        }

        .facture-info h2 {
            margin: 0;
        }

        .facture-info p {
            margin: 5px 0;
        }

        .client-info {
            margin-bottom: 30px;
        }

        .client-info h3 {
            margin: 0;
        }

        .client-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .total {
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="assets/images/{{$entreprise->logo_entreprise}}" height="75px" width="35px" alt="Logo">
            </div>
            <div class="facture-info">
                <h2> Reservations </h2>
                <p>DATE: {{$factures->created_at->format('d/m/y')}}</p>
                <p>N° FACTURE: {{$factures->id}}</p>
            </div>
        </div>

        <div class="client-info">
            <h3> nom client : {{$factures->nom_client}}</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Libelle </th>
                    <th>PRIX</th>
                    <th>Qté</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $cmd )
                <tr>
                    <td>{{$cmd->nom_produit}}</td>
                    <td>{{$cmd->prix_unitaire}}</td>
                    <td>{{$cmd->qte_commandee}}</td>
                    <td>{{$cmd->total}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">montant à payer </td>
                    <td class="total">{{$factures->total_achat}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">montant payé </td>
                    <td class="total">{{$factures->montant_paye}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="total"> Reste  </td>
                    <td class="total">{{$factures->reste}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>