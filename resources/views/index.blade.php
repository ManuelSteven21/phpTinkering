<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo PHP</title>
</head>
<body>
<h1>
    <?php
    echo $greeting . " World!<br>";
    echo "Resultat: " . $a + $b . "<br>";
    ?>

</h1>
<p>Llista de pelis:</p>
<ul>
    <?php foreach ($films as $film) : ?>
    <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
    <?php endforeach; ?>
</ul>
<p>Llista de pelis de Denis Villeneuve en filtro:</p>
<ul>
    <?php foreach ($films as $film) : ?>
        <?php if ($film["director"] === "Denis Villeneuve") : ?>
    <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
    <?php endif; ?>
    <?php endforeach; ?>
</ul>
<p>Llista de pelis de Denis Villeneuve en funcions:</p>
<ul>
    <?php foreach (filterByDirector($films, "Denis Villeneuve") as $film) : ?>
    <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
    <?php endforeach; ?>
</ul>
<p>Llista de pelis a partir del 2000:</p>
<ul>
    <?php foreach (filterByYear($films) as $film) : ?>
    <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
    <?php endforeach; ?>
</ul>
<p>Llista de pelis entre 2010 i 2020 en lambda:</p>
<ul>
    <?php foreach ($filteredFilms as $film) : ?>
    <li><?= $film['name'] ?> (<?= $film['year'] ?>) - By <?= $film['director'] ?></li>
    <?php endforeach; ?>
</ul>
<p> Agafem la peli 3: <?= $films[2]['name'] ?></p>
</body>
</html>