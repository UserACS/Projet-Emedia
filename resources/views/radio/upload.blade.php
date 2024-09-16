<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Fichier Audio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styles similaires à ceux de ta page actuelle */
        body {
            background-color: #003366;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        
        .form-container {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            max-width: 100%;
            text-align: center;
        }
        
        .form-container h1 {
            color: #003366;
        }
        
        .form-container input[type="text"], .form-container select, .form-container input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-container button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .form-container button:hover {
            background-color: #218838;
        }
        
        .form-container a {
            display: block;
            margin-top: 10px;
            color: #f5c242;
            text-decoration: none;
        }
        
        .form-container a:hover {
            color: #ffcc33;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Ajouter un Fichier Audio</h1>
        <form action="{{ route('radio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom du Fichier:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="type">Catégorie:</label>
            <select name="type" id="type" required>
                <option value="images">Images</option>
                <option value="documents">Documents</option>
                <option value="videos">Vidéos</option>
                <option value="audios">Audios</option>
            </select>
            
            <label for="audio">Fichier Audio:</label>
            <input type="file" name="audio" id="audio" accept="audio/*" required>
            
            <button type="submit">Envoyer</button>
        </form>
        <a href="{{ route('radio.index') }}">Retour à la Liste</a>
    </div>
</body>

</html>
