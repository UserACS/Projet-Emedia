<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Afficher le fichier</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .buttons-container {
            position: fixed;
            top: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            justify-content: space-between;
            z-index: 10;
        }
        .btn-primary, .btn-download {
            padding: 10px 20px;
            border-radius: 5px;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-download {
            background-color: #28a745;
        }
        .btn-download:hover {
            background-color: #218838;
        }
        .file-content {
            max-width: 90%;
            width: 700px; 
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 60px; /* Ajouter de l'espace pour les boutons en haut */
        }
        .file-content img, .file-content video, .file-content audio {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="buttons-container">
    <a href="{{ route('television.index') }}" class="btn-primary">Retour</a>
    <a href="{{ asset('storage/' . $file->file_path) }}" class="btn-download">Télécharger</a>

</div>

<div class="file-content">
    @if($fileType == 'image')
        <!-- Afficher l'image -->
        <img src="{{ ('storage/app/files' . $file->file_path) }}" alt="{{ $file->file_name }}">
    @elseif($fileType == 'video')
        <!-- Afficher la vidéo -->
        <video controls>
            <source src="{{ asset('storage/' . $file->file_path) }}" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
    @elseif($fileType == 'audio')
        <!-- Afficher l'audio -->
        <audio controls>
            <source src="{{ asset('storage/' . $file->file_path) }}" type="audio/mpeg">
            Votre navigateur ne supporte pas l'audio.
        </audio>
    @else
        <!-- Afficher un document (PDF par exemple) -->
        <iframe src="{{ asset('storage/' . $file->file_path) }}" width="100%" height="600px"></iframe>
    @endif
</div>

</body>
</html>