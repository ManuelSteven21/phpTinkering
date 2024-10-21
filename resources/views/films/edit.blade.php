<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Film</h1>
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($film->name) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="director" class="block text-gray-700">Director:</label>
                <input type="text" name="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-gray-700">Year:</label>
                <input type="number" name="year" value="<?= htmlspecialchars($film->year) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edit</button>
        </form>
        <a href="/" class="text-gray-500 hover:underline mt-4 block">Return</a>
    </div>
</body>
</html>