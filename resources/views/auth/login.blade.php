<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
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

        .login-container {
            background-color: rgba(255, 255, 255, 0.9); /* Blanc avec opacité pour le logo et le titre */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            color: #003366;
        }

        .login-title {
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
            color: #003366; /* Couleur du texte de la connexion */
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 80px; /* Taille du logo ajustée */
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

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check input {
            margin-right: 10px;
        }

        .form-check label {
            font-size: 1rem;
        }

        .btn-login {
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

        .btn-login:hover {
            background-color: #e0ac1c;
        }

        .forgot-password,
        .register-link {
            margin-top: 15px;
            text-align: center;
        }

        .forgot-password a,
        .register-link a {
            color: #f5c242;
            text-decoration: none;
        }

        .forgot-password a:hover,
        .register-link a:hover {
            color: #e0ac1c;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="login-title">Connexion</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Se souvenir de moi</label>
            </div>
            <button type="submit" class="btn-login">Se connecter</button>
            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </div>
            <div class="register-link">
                <a href="{{ route('register') }}">Créer un compte</a>
            </div>
        </form>
    </div>
</body>

</html>
