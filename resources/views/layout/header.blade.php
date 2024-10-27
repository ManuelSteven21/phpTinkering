<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        /* Estils per a la barra de navegació */
        .navbar {
            background-color: black; /* Fondo negre per a la barra de navegació */
            padding: 30px 0; /* Espai intern vertical */
            text-align: center; /* Centra el contingut */
            width: 100%; /* Amplada completa */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5); /* Sombra per a la barra */
        }

        /* Estils per als enllaços */
        .nav-links a {
            color: white; /* Text blanc */
            text-decoration: none; /* Treu el subratllat */
            padding: 10px 20px; /* Espai intern */
            text-transform: uppercase; /* Majúscules */
            transition: background 0.3s ease, color 0.3s ease; /* Transicions suaus */
            font-size: 1rem;
            font-weight: normal;
        }

        /* Estils quan un enllaç està actiu o es passa el ratolí per sobre */
        .nav-links a:hover, .nav-links a.active {
            color: black; /* Text negre */
            background: rgba(255, 255, 255, 0.5); /* Fons blanc semitransparent */
            border-radius: 5px; /* Cantonades arrodonides */
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-links">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Inici</a>
        <a href="/films" class="{{ request()->is('films') ? 'active' : '' }}">Pel·lícules</a>
        <a href="/games" class="{{ request()->is('games') ? 'active' : '' }}">Videojocs</a>
    </div>
</nav>

</body>
</html>