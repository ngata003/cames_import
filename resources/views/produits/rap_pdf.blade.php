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
                <th> Nom Produit </th>
                <th> prix unitaire </th>
                <th> Image </th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $prod)
                <tr>
                    <td>{{ $prod->nom_produit }}</td>
                    <td>{{ $prod->prix_unitaire }}</td>
                    <td>  <img src="assets/images/{{ $prod->image_produit }}" alt=""> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
