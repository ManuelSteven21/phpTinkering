<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film</title>
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
    <div class="max-w-lg mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg p-6 mt-6 mb-6">
        <h1 class="text-3xl font-bold mb-4 text-center text-black">Edit Film</h1>
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Title:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($film->name) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="director" class="block text-gray-700">Director:</label>
                <input type="text" name="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-gray-700">Release Year:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($film->year) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="genre" class="block text-gray-700">Genre:</label>
                <input type="text" name="genre" value="<?= htmlspecialchars($film->genre) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-gray-700">Duration (mins):</label>
                <input type="number" name="duration" value="<?= htmlspecialchars($film->duration) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="cast" class="block text-gray-700">Cast:</label>
                <input type="text" name="cast" value="<?= htmlspecialchars($film->cast) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" rows="4" maxlength="500" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required><?= htmlspecialchars($film->description) ?></textarea>
                <p class="text-gray-500 text-sm">Max 500 characters</p>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Edit</button>
        </form>
        <a href="/films" class="text-gray-500 hover:underline mt-4 block text-center">Return</a>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>