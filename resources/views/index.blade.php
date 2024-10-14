<?php require "layout/html_header.blade.php"; ?>
<?php require "layout/nav.blade.php"; ?>

<h1>
    <?php
    echo $greeting . " World!<br>";
    echo "Resultat: " . $a + $b . "<br>";
    ?>

</h1>
<p>Llista de pelis:</p>
<div>
    <table>
        <thead>
        <tr>
            <th scope="col">
                Id
            </th>
            <th scope="col">
                Film Name
            </th>
            <th scope="col">
                Director
            </th>
            <th scope="col">
                releaseYear
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($films as $film): ?>
        <tr>
            <td>
                    <?=$film->id;?>
            </td>
            <td>
                    <?=$film->name;?>
            </td>
            <td>
                    <?=$film->director;?>
            </td>
            <td>
                    <?=$film->year;?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require "layout/footer.blade.php"; ?>