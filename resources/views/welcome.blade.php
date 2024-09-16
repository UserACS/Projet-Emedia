<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .welcome-container {
            background-color: #fff; /* Cadre blanc */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        .welcome-message {
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: bold;
            color: #003366;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .welcome-message img {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .welcome-message .dsi-sigle {
            font-size: 1.5rem;
            color: #f5c242;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .login-section-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-section {
            background-color: rgba(255, 255, 255, 0.9); /* Fond blanc */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
            color: #003366;
        }

        .login-icon {
            font-size: 3rem;
            color: #003366; /* Couleur de l'icône */
            margin-bottom: 20px;
        }

        .login-title {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #003366;
            font-weight: bold;
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
            border: 2px solid #003366; /* Contour bleu */
            font-size: 1rem;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check input {
            margin-right: 10px;
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
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <div class="welcome-message">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="bienvenue">Bienvenue dans le système d'archivage du groupe E-Media Invest S.A. !</div>
            <div class="dsi-sigle">Direction des Systèmes d'Informations</div>
        </div>

        <div class="login-section-container">
            <div class="login-section">
                <div class="login-icon">
                    <i class="fas fa-user-lock"></i> <!-- Icône d'authentification -->
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
        </div>
    </div>
</body>

</html>
