<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Gestionnaires</title>
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

    <h1>Gestionnaires de l'entreprise: {{ $nom_entreprise }}</h1>

    <table>
        <thead>
            <tr>
                <th> Nom </th>
                <th> Email </th>
                <th> Rôle </th>
                <th> contact</th>
                <th> residence </th>
            </tr>
        </thead>
        <tbody>
            @foreach($gestionnaires as $gestionnaire)
                <tr>
                    <td>{{ $gestionnaire->name }}</td>
                    <td>{{ $gestionnaire->email }}</td>
                    <td>{{ $gestionnaire->role }}</td>
                    <td>{{ $gestionnaire->contact }}</td>
                    <td>{{ $gestionnaire->residence }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
