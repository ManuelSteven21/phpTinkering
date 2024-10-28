<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen bg-cover bg-center" style="background-image: url('/images/fondo.jpg');">
<div class="flex flex-col min-h-screen">
    <?php require "../resources/views/layout/header.blade.php"; ?>

    <main class="flex-grow">
        <!-- Contenidor principal -->
        <div class="bg-gray-800 bg-opacity-75 mx-4 sm:mx-auto mt-8 sm:mt-12 max-w-3xl p-6 sm:p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl sm:text-3xl font-bold text-white mb-4 sm:mb-6">Benvingut a la pàgina de Pel·lícules i Videojocs</h1>

            <!-- Seccions Pel·lícules i Videojocs -->
            <div class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-center gap-4 sm:gap-6">

                <!-- Secció de Pel·lícules -->
                <div class="bg-gray-700 bg-opacity-80 p-4 sm:p-6 rounded-lg shadow-md w-full sm:w-72 text-center mx-auto sm:mx-0">
                    <h2 class="text-lg sm:text-xl font-semibold text-blue-400 mb-2 sm:mb-3">Pel·lícules</h2>
                    <p class="text-white text-sm sm:text-base mb-3 sm:mb-4">Aquesta és la teva destinació per a les millors pel·lícules. Explora, afegeix i gestiona les teves pel·lícules preferides.</p>
                    <a href="/films" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Veure Pel·lícules</a>
                </div>

                <!-- Secció de Videojocs -->
                <div class="bg-gray-700 bg-opacity-90 p-4 sm:p-6 rounded-lg shadow-md w-full sm:w-72 text-center mx-auto sm:mx-0">
                    <h2 class="text-lg sm:text-xl font-semibold text-blue-400 mb-2 sm:mb-3">Videojocs</h2>
                    <p class="text-white text-sm sm:text-base mb-3 sm:mb-4">Descobreix els videojocs més populars i gestiona la teva col·lecció. Properament podràs afegir i editar videojocs.</p>
                    <a href="/games" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Veure Videojocs</a>
                </div>

            </div>
        </div>
    </main>

    <?php require "../resources/views/layout/footer.blade.php"; ?>
</div>
</body>
</html>