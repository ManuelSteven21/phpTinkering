<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Game</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estil per a la imatge de fons */
        body {
            background-image: url('/images/fondo.jpg');
            background-size: cover; /* Evitar la repetició */
            background-position: center;
            background-repeat: no-repeat; /* Evitar la repetició */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<main class="flex-grow px-4 sm:px-6 lg:px-8"> <!-- Afegit padding lateral -->
    <div class="max-w-md mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg p-8 mt-6 mb-6">
        <h1 class="text-3xl font-bold mb-4 text-center text-black">Delete Game</h1>
        <p class="text-center text-gray-700">Vols eliminar el videojoc "<strong><?= htmlspecialchars($game->name) ?></strong>"?</p>
        <form action="/games/destroy" method="POST" class="mt-4 text-center">
            <input type="hidden" name="id" value="<?= $game->id ?>">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Delete</button>
        </form>
        <a href="/games" class="text-gray-500 hover:underline mt-4 block text-center">Cancel·lar</a>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>