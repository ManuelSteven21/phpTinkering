<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/fondo.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
<?php require "../resources/views/layout/header.blade.php"; ?>

<main class="flex-grow px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg p-8 mt-6 mb-6">
        <h1 class="text-4xl font-bold mb-4 text-center text-black"><?= htmlspecialchars($game->name) ?></h1>
        <div class="border-t border-gray-300 mt-4 pt-4">
            <p class="text-gray-800 text-lg"><strong>Director:</strong> <span class="text-gray-600"><?= htmlspecialchars($game->director) ?></span></p>
            <p class="text-gray-800 text-lg"><strong>Year:</strong> <span class="text-gray-600"><?= htmlspecialchars($game->year) ?></span></p>
            <p class="text-gray-800 text-lg"><strong>Genre:</strong> <span class="text-gray-600"><?= htmlspecialchars($game->genre) ?></span></p>
            <p class="text-gray-800 text-lg"><strong>Description:</strong> <span class="text-gray-600"><?= htmlspecialchars($game->description) ?></span></p>
        </div>
        <div class="mt-6 text-center">
            <?php if ($poster): ?>
            <img src="<?= htmlspecialchars($poster) ?>" alt="<?= htmlspecialchars($game->name) ?> Poster" class="mx-auto mb-4 w-1/2 rounded-lg shadow-lg">
            <?php else: ?>
            <p class="text-gray-500">Poster no disponible</p>
            <?php endif; ?>
        </div>

        <div class="mt-6">
            <a href="/games" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300 text-center block mx-auto">Return to Games</a>
        </div>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>