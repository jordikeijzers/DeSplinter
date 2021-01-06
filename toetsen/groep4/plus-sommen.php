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

        <title>De Splinter - Toetsen - Groep 4 - Plus sommen</title>
    </head>
    <body>
        <header>
            <div id="header-content">
                <h1>De Splinter</h1>
                <nav>
                    <a href="../../index.html">Home</a>
                    <a href="../../informatie.html">Informatie</a>
                    <a href="../../reken.html">Reken</a>
                    <a href="../../toetsen.html">Toetsen</a>
                    <a href="../../contact.html">Contact</a>
                </nav>
            </div>
        </header>
        <div id="site-content">
            <section>
                <h2>Rekensommen voor groep 5</h2>
                <a href=".">Terug naar som selectie</a>
                <form action="#" method="POST" id="som-input">
                    <div id="tafels">
                        <h2>Plus sommen</h2>
                        <?php
                            function maak_tafel(int $plus_getal) {
                                echo "<h3>Plus sommen met $plus_getal</h3>";

                                for ($getal = 1; $getal < 11; $getal++) {
                                    $gegeven_antwoord = "";
                                    $is_antwoord_correct = true;

                                    if (isset($_POST["tafels_som$plus_getal$getal"])) {
                                        $gegeven_antwoord = $_POST["tafels_som$plus_getal$getal"];
                                        $correct_antwoord = intval($getal) + $plus_getal;
                                        $is_antwoord_correct = intval($gegeven_antwoord) == $correct_antwoord;
                                    }

                                    echo "<div class=\"som\">";
                                    echo "<label>$getal + $plus_getal =</label>";
                                    echo "<input type=\"text\" value=\"$gegeven_antwoord\" " . ($is_antwoord_correct ? "" : " class=\"incorrect\"") . "placeholder=\"Typ jouw antwoord hier...\" name=\"tafels_som$plus_getal$getal\">";
                                    echo "</div>";
                                }
                            }

                            maak_tafel($getal_1);
                            maak_tafel($getal_2);
                            maak_tafel($getal_3);
                        ?>
                    </div>
                    <input type="submit" value="Controleren">
                </form>
            </section>
        </div>
        <footer>
            <p>&copy; Basischool De Splinter, 2020</p>
        </footer>
    </body>
</html>
