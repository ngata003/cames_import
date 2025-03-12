<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport pdf des factures enregistrées </title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <img src="assets/images/{{$logo_entreprise }}" alt="">
    <h1>Gestionnaires de l'entreprise: {{ $nom_entreprise }}</h1>

    <table>
        <thead>
            <tr>
                <th> Nom Client </th>
                <th> Email Client </th>
                <th> Contact Client </th>
                <th> Total Achat</th>
                <th> Montant paye </th>
                <th> Reste </th>
                <th> moyen paiement </th>
                <th> date achat </th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $invoice)
                <tr>
                    <td>{{ $invoice->nom_client }}</td>
                    <td>{{ $invoice->email_client }}</td>
                    <td>{{ $invoice->numero_client }}</td>
                    <td>{{ $invoice->total_achat }}</td>
                    <td>{{ $invoice->montant_paye }}</td>
                    <td> {{$invoice->reste}}</td>
                    <td> {{$invoice->moyen_paiement}}</td>
                    <td>{{$invoice->created_at->format('d/m/y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
