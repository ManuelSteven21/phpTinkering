<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
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
    <div class="max-w-4xl mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg p-6 mt-8 mb-6">
        <h1 class="text-3xl font-bold mb-4 text-center text-gray-900">Games</h1>

        <!-- Contenidor per al botó i la taula amb marges -->
        <div class="space-y-4">
            <div class="add-film flex justify-end mb-4">
                <a href="/games/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Add New Game</a>
            </div>

            <!-- Taula amb scroll horitzontal -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Developers</th>
                        <th class="py-3 px-6 text-left">Year</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                        <th class="py-3 px-6 text-center">Details</th> <!-- Nova columna per a mostrar més informació -->
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <?php if (empty($games)): ?>
                    <tr>
                        <td colspan="6" class="py-3 px-6 text-center">No hi ha videojocs disponibles.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($games as $game): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                        <td class="py-3 px-6"><?= $game['id'] ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['name']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['developers']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($game['year']) ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="/games/edit/<?= $game['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4 transition duration-300">Edit</a>
                            <a href="/games/delete/<?= $game['id'] ?>" class="text-red-500 hover:text-red-700 transition duration-300">Delete</a>
                        </td>
                        <td class="py-3 px-6 text-center"> <!-- Columna de Detalls -->
                            <a href="/games/show/<?= $game['id'] ?>" class="text-green-500 hover:text-green-700 transition duration-300">Show More Info</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>