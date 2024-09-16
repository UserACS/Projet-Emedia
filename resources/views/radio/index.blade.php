<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télévisions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

.sidebar {
            width: 250px;
            background-color: #002d62;
            padding: 30px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-icon {
            font-size: 4rem;
            color: #fff;
            margin-bottom: 15px;
        }

        .user-name {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
        }

        .logout-link {
            color: #aad1e6; /* Couleur bleu doux */
            text-decoration: none;
            font-weight: 1000;
            margin-top: 200px;
            transition: color 0.3s;
        }

        .logout-link:hover {
            color: #cce7f5;
        }

        .nav-links {
            margin-top: 40px;
            width: 100%;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            padding: 15px 0;
            display: block;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: background 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: #003366;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
        }

        .container {
            width: 1100px;
            margin: 0 auto;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: center; /* Centrer le contenu */
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centrer horizontalement */
            margin-bottom: 20px;
        }

        .header img {
            max-width: 300px;
            height: auto;
            margin-bottom: 10px; /* Espace entre le logo et le titre */
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            justify-content: center; /* Centrer les boutons */
            gap: 10px;
            margin-top: 20px; /* Espace sous le titre */
        }

        .btn {
            padding: 10px 15px;
            background-color: #28a745; #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .filter-bar {
            margin-bottom: 20px;
            margin-top: 50px;
        }

        .filter-bar select {
            width: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .categories-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
            justify-content: center;
            margin-top: 50px;
        }

        .category, .folder, .file {
            width: 150px;
            text-align: center;
            cursor: pointer;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .category:hover, .folder:hover, .file:hover {
            background-color: #f0f0f0;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .category-icon {
            font-size: 4rem;
            color: #4A90D9; #003366; #f5c242;  
        }

        .category-name, .folder-name, .file-name {
            margin-top: 10px;
            font-size: 1rem;
            color: #003366;
        }

        .open-btn, .close-btn {
           
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .open-btn {
            background-color: #f5c242; #28a745;
            color: white;
        }

        .bouton {
            margin-top: 25px;
        }

        .open-btn:hover {
            background-color: #218838;
        }

        .close-btn {
            background-color: #dc3545;
            color: white;
        }

        .close-btn:hover {
            background-color: #c82333;
        }

        .category-content {
            display: none;
        }

        .category-content.open {
            display: block;
        }

        .filter-bar, .actions {
            display: flex;
            justify-content: center; /* Centrer les éléments horizontalement */
            gap: 20px; /* Espacement entre les éléments */
            margin-bottom: 20px; /* Espace sous la barre de recherche et les boutons */
        }

        .filter-bar select {
            width: 50px; /* Ajuster la largeur */
            flex: 3; /* Prendre la largeur restante */
            height: 50px;
            margin-top: 15px;
        }

        .actions {
            flex: 2; /* Ajuster la largeur pour les boutons */
        }

        .footer {
            text-align: center;
            margin-top: 65px;
            font-size: 0.9rem;
            color: black;
        }

    </style>
</head>

<body>

<div class="sidebar">
    <i class="fas fa-user-circle profile-icon"></i>
    <div class="user-name">{{ Auth::user()->name }}</div>
    
    <!-- Navigation Links -->
    <div class="nav-links">
        <a href="{{ url('/home') }}"><i class="fas fa-home"></i> Accueil</a>
        <a href="{{ route('radio.index') }}"><i class="fas fa-microphone"></i> Radio</a>
        <a href="{{ route('television.index') }}"><i class="fas fa-tv"></i> Télévision</a>
    </div>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="logout-link">Déconnexion</a>

</div>

    <div class="container">
        <div class="header">
            <img src="{{ asset('images/iradio.png') }}" alt="Logo">
        </div>

        <div class="filter-bar">
            <select id="category-select">
                <option value="">Toutes les catégories</option>
                <option value="images">Images</option>
                <option value="documents">Documents</option>
                <option value="videos">Vidéos</option>
                <option value="audios">Audios</option>
            </select>

            <!-- Section pour les boutons -->
            <div class="actions">
                <a href="{{ route('radio.create') }}" class="btn">
                    <i class="fas fa-upload"></i> Ajouter un fichier
                </a>
            </div>
        </div>

        <!-- Section pour les catégories -->
        <div class="categories-container">

            <div id="images" class="category">
                <i class="fas fa-image category-icon"></i>
                <div class="category-name">Images</div>
                <div class="bouton"><a href="{{ route('fichiers.showByCategory', 'images') }}" class="open-btn">Ouvrir</a></div>
            </div>


            <div id="documents" class="category">
                <i class="fas fa-file-alt category-icon"></i>
                <div class="category-name">Documents</div>
                <div class="bouton"><a href="{{ route('fichiers.showByCategory', 'documents') }}" class="open-btn">Ouvrir</a></div>
            </div>

            <div id="videos" class="category">
                <i class="fas fa-video category-icon"></i>
                <div class="category-name">Vidéos</div>
                <div class="bouton"><a href="{{ route('fichiers.showByCategory', 'videos') }}" class="open-btn">Ouvrir</a></div>
            </div>

            <div id="audios" class="category">
                <i class="fas fa-music category-icon"></i>
                <div class="category-name">Audios</div>
                <div class="bouton"><a href="{{ route('fichiers.showByCategory', 'audios') }}" class="open-btn">Ouvrir</a></div>
            </div>
        </div>

        <!-- Contenu des catégories -->
        <div id="images-content" class="category-content">
            <button class="close-btn" onclick="closeCategory('images-content')">Fermer</button>
            <div class="categories-container">
                <!-- Contenu des images ici -->
            </div>
        </div>

        <div id="documents-content" class="category-content">
            <button class="close-btn" onclick="closeCategory('documents-content')">Fermer</button>
            <div class="categories-container">
                <!-- Contenu des documents ici -->
            </div>
        </div>

        <div id="videos-content" class="category-content">
            <button class="close-btn" onclick="closeCategory('videos-content')">Fermer</button>
            <div class="categories-container">
                <!-- Contenu des vidéos ici -->
            </div>
        </div>

        <div id="audios-content" class="category-content">
            <button class="close-btn" onclick="closeCategory('audios-content')">Fermer</button>
            <div class="categories-container">
                <!-- Contenu des audios ici -->
            </div>
        </div>

        <?php
            echo 'upload_max_filesize: ' . ini_get('upload_max_filesize') . '<br>';
echo 'post_max_size: ' . ini_get('post_max_size');

        ?>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 E-Media. Tous droits réservés.
        </div>

        
    </div>

    <script>
        document.getElementById('category-select').addEventListener('change', function() {
            var selectedValue = this.value;

            // Masquer toutes les catégories
            document.querySelectorAll('.category').forEach(function(category) {
                category.style.display = 'none';
            });

            // Masquer le contenu de toutes les catégories
            document.querySelectorAll('.category-content').forEach(function(content) {
                content.classList.remove('open');
            });

            // Afficher la catégorie sélectionnée
            if (selectedValue) {
                document.getElementById(selectedValue).style.display = 'block';
            } else {
                // Si "Toutes les catégories" est sélectionné, afficher toutes les catégories
                document.querySelectorAll('.category').forEach(function(category) {
                    category.style.display = 'block';
                });
            }
        });

        function toggleCategory(contentId) {
            var content = document.getElementById(contentId);
            content.classList.toggle('open');
        }

        function closeCategory(contentId) {
            var content = document.getElementById(contentId);
            content.classList.remove('open');
        }

    </script>
</body>

</html>