<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Film</title>
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
        <h1 class="text-3xl font-bold mb-6 text-center text-black">Add New Film</h1>
        <form action="/store" method="POST">
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter film title">
            </div>

            <div class="mb-5">
                <label for="director" class="block text-sm font-medium text-gray-700">Director:</label>
                <input type="text" name="director" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter director's name">
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
                <label for="duration" class="block text-sm font-medium text-gray-700">Duration (mins):</label>
                <input type="number" name="duration" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter duration in minutes">
            </div>

            <div class="mb-5">
                <label for="cast" class="block text-sm font-medium text-gray-700">Cast:</label>
                <input type="text" name="cast" required class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter main cast">
            </div>

            <div class="mb-5">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" rows="4" maxlength="500" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter film description (max 500 characters)"></textarea>
                <p class="text-gray-500 text-sm">Max 500 characters</p>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">Add Film</button>
        </form>
    </div>
</main>

<?php require "../resources/views/layout/footer.blade.php"; ?>
</body>
</html>