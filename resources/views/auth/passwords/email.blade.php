<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #003366; /* Bleu foncé */
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .reset-container {
            background-color: rgba(255, 255, 255, 0.9); /* Blanc avec opacité pour le logo et le titre */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            color: #003366;
        }

        .reset-title {
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            color: #003366; /* Couleur du texte */
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100px; /* Taille du logo ajustée */
            height: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            color: #000;
        }

        .btn-reset {
            width: 100%;
            padding: 12px;
            background-color: #f5c242;
            color: #000;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-reset:hover {
            background-color: #e0ac1c;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
            color: #f5c242;
            text-decoration: none;
        }

        .login-link a:hover {
            color: #e0ac1c;
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="reset-title">Réinitialisation du mot de passe</div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="btn-reset">Envoyer le lien de réinitialisation</button>
            <div class="login-link">
                <a href="{{ route('login') }}">Retour à la connexion</a>
            </div>
        </form>
    </div>
</body>

</html>
