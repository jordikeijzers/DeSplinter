<!DOCTYPE html>

<?php
    $getal_1 = 4;
    $getal_2 = 2;
    $getal_3 = 5;
?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/rekenen.css">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <title>De Splinter - Toetsen - Groep 4 - Aftrekken</title>
    </head>
    <body>
        <?php include_once("../../components/header.html"); ?>
        <div id="site-content">
            <section>
                <h2>Rekensommen voor groep 4</h2>
                <a href=".">Terug naar som selectie</a>
                <form action="#" method="POST" id="som-input">
                    <div id="aftrekken">
                        <h2>Aftrekken</h2>
                        <?php
                            include_once("../../components/toets.php");

                            maak_sommen(1, 4);
                            maak_sommen(2, 4);
                            maak_sommen(3, 4);
                        ?>
                    </div>
                    <input type="submit" value="Controleren">
                </form>
            </section>
        </div>
        <footer>
            <p>&copy; Basisschool De Splinter, 2020-2021</p>
        </footer>
    </body>
</html>
