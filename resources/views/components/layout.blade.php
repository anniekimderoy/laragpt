@props(["titre" => "LaraGPT"])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    {{ $slot }}
    <style>
        /* Stylisation du défilement vertical pour les navigateurs WebKit */
        .overflow-y-auto::-webkit-scrollbar {
            width: 8px; /* Largeur de la barre de défilement */
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background-color: #4A4E5A; /* Couleur du pouce (partie déplaçable) */
            border-radius: 4px; /* Coins arrondis */
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background-color: #292D36; /* Couleur de la piste (arrière-plan de la barre de défilement) */
        }
    </style>
</body>
</html>
