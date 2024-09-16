<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(135deg, #4a90e2 20%, #6db3f2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        /* Déconnexion en haut à droite */
        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-link {
            color: #002d62;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: color 0.3s;
        }

        .logout-link:hover {
            color: #cce7f5;
        }

        .logout i {
            color: #002d62;
        }

        .sidebar {
            width: 250px;
            background-color: #002d62;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .profile-icon {
            font-size: 5rem;
            color: #fff;
            margin-bottom: 20px;
            animation: pop 0.5s ease-in-out;
        }

        .user-name {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            margin: 15px 0;
            padding: 10px 0;
            display: block;
            text-align: center;
            transition: background 0.4s;
            border-radius: 10px;
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .content {
            flex: 1;
            padding: 40px;
            text-align: center;
            background-color: #f4f7fb;
            border-radius: 20px;
            margin-left: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .logo-container img {
            width: 150px;
            animation: pop 0.6s ease-out;
            transform: scale(1.1);
        }

        h1 {
            color: #003366;
            margin-top: 20px;
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            animation: fadeIn 1s ease-in-out;
        }

        .media-sections {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 50px;
        }

        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: all 0.4s;
            width: 250px;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) rotate(2deg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .card img {
            width: 180px;
            margin-bottom: 20px;
            transition: transform 0.4s;
        }

        .card:hover img {
            transform: rotate(-2deg) scale(1.1);
        }

        .btn-custom-radio, .btn-custom-tele {
            color: #fff;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-custom-radio {
            background-color: #4682b4;
        }

        .btn-custom-tele {
            background-color: #1e90ff;
        }

        .btn-custom-radio:hover, .btn-custom-tele:hover {
            background-color: #005a9c;
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes pop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<!-- Bouton de déconnexion en haut à droite -->
<div class="logout">
    <i class="fas fa-sign-out-alt"></i>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" class="logout-link">Déconnexion</a>
</div>

<div class="sidebar">
    <i class="fas fa-user-circle profile-icon"></i>
    <div class="user-name">{{ Auth::user()->name }}</div>

    <div class="nav-links">
        <a href="{{ url('/') }}"><i class="fas fa-home"></i> Accueil</a>
        <a href="{{ route('radio.index') }}"><i class="fas fa-microphone"></i> Radio</a>
        <a href="{{ route('television.index') }}"><i class="fas fa-tv"></i> Télévision</a>
    </div>
</div>

<div class="content">
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>
    <h1>Bienvenue dans la page d'accueil des archives !</h1>

    <div class="media-sections">
        <div class="card">
            <img src="{{ asset('images/iradio.png') }}" alt="Logo Radio">
            <a href="{{ route('radio.index') }}" class="btn-custom-radio">Accéder aux archives de la radio</a>
        </div>
        <div class="card">
            <img src="{{ asset('images/itv.png') }}" alt="Logo Télévision">
            <a href="{{ route('television.index') }}" class="btn-custom-tele">Accéder aux archives de la télé</a>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</body>
</html>
