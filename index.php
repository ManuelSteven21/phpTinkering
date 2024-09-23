<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo PHP</title>
</head>
<body>
<h1>
    <?php
    $greeting = "Hello";
    echo $greeting . " World!<br>";

    $a = 3;
    $b = 2;
    echo "Resultat: " . ($a + $b) . "<br>";

    $films = [
        [
                "name" => "Dune",
                "director" => "Denis Villeneuve",
                "year" => "2020"
        ], [
                "name" => "Star Wars",
                "director" => "George Lucas",
                "year" => "1977"
        ], [
                "name" => "Blade Runner 2049",
                "director" => "Denis Villeneuve",
                "year" => "2017"
        ], [
                "name" => "Mad Max: Fury Road",
                "director" => "George Miller",
                "year" => "2015"
        ], [
                "name" => "Avatar",
            "director" => "James Cameron",
            "year" => "2009"
        ], [
                "name" => "2001: A Space Odyssey",
                "director" => "Stanley Kubrick",
                "year" => "1968"
        ]
    ];

    function filterByYear($films, $year) {
        $filteredYear = [];
        foreach ($films as $film) {
            if ($film["year"] >= $year) {
                $filteredYear[] = $film;
            }
        }
        return $filteredYear;
    }

    $filteredByYear = filterByYear($films, 2000);

    $filteredFilms = array_filter($films, function ($film)) {
        return $film["year"] >= 2000;
    }
    ?>
</h1>
<p>Llista de pel·lícules a partir del 2000:</p>
<ul>
    <?php foreach ($filteredByYear as $film) : ?>
        <li><?= $film["name"]?> (<?= $film["year"]?>) - By <?= $film["director"]?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>