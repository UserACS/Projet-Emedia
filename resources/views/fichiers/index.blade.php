<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fichiers - {{ $category->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9fafc;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            min-height: 70vh;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 1.8rem;
            color: #4a90e2; /* Bleu clair */
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .search-bar input {
            padding: 10px;
            width: 100%;
            max-width: 450px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
            font-size: 15px;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #357ABD; /* Bleu un peu plus foncé */
        }

        .file-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .file-item {
            background-color: #f1f3f5;
            padding: 15px;
            text-align: center;
            border-radius: 6px;
            transition: box-shadow 0.2s ease;
        }

        .file-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .file-icon {
            font-size: 36px;
            color: #4a90e2; /* Bleu clair */
            margin-bottom: 10px;
        }

        .file-name {
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: #333;
        }

        .btn-primary {
            display: inline-block;
            padding: 8px 12px;
            background-color: #4a90e2;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .return-link {
            display: block;
            margin-bottom: 25px;
            text-align: left;
            color: #4a90e2;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .return-link:hover {
            color: #357ABD;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f1f1f1;
            color: #333;
            margin-top: 50px; /* Footer espacé du contenu */
            position: relative;
        }

        footer p {
            margin: 0;
        }

        @media (max-width: 600px) {
            .file-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Titre de la catégorie -->
    <div class="header">
        <h1>Gestion des fichiers : {{ $category->name }}</h1>
    </div>

    <!-- Lien retour -->
    <a href="javascript:history.back()" class="return-link"><i class="fas fa-arrow-left"></i> Retour</a>

    <!-- Barre de recherche -->
    <form action="{{ route('fichiers.search', $category->id) }}" method="GET" class="search-bar">
        <input type="text" name="query" placeholder="Rechercher un fichier..." required>
        <button type="submit">Rechercher</button>
    </form>

    <!-- Grille des fichiers -->
    <div class="file-grid">
        @foreach($files as $file)
            <div class="file-item">
                <div class="file-icon">
                    @if($file->type == 'image')
                        <i class="fas fa-image"></i>
                    @elseif($file->type == 'video')
                        <i class="fas fa-video"></i>
                    @elseif($file->type == 'audio')
                        <i class="fas fa-music"></i>
                    @else
                        <i class="fas fa-file-alt"></i>
                    @endif
                </div>
                <div class="file-name">{{ $file->file_name }}</div>
                <a href="{{ route('fichiers.view', $file->id) }}" class="btn-primary">Voir</a>
            </div>
        @endforeach
    </div>
</div>

<!-- Pied de page -->
<footer>
    <p>&copy; {{ date('Y') }} e-Media. Tous droits réservés.</p>
</footer>

</body>
</html>
