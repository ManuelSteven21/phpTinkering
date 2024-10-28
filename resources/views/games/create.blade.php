<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
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
    <div class="max-w-md mx-auto bg-white bg-opacity-80 shadow-lg rounded-lg p-8 mt-6 mb-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-black">Add New Game</h1>
        <form action="/games/store" method="POST">

        <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter game title">
            </div>

            <div class="mb-5">
                <label for="director" class="block text-sm font-medium text-gray-700">Developers:</label>
                <input type="text" name="developers" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter developers name">
            </div>

            <div class="mb-5">
                <label for="year" class="block text-sm font-medium text-gray-700">Release Year:</label>
                <input type="number" name="year" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter release year">
            </div>

            <div class="mb-5">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre:</label>
                <input type="text" name="genre" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter genre">
            </div>

            <div class="mb-5">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" rows="4" maxlength="500" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter film description (max 255 characters)"></textarea>
                <p class="text-gray-500 text-sm">Max 255 characters</p>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Add Game</button>
        </form>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>