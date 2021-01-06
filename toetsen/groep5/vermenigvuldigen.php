<!DOCTYPE html>

<?php
    $tafels_1 = 4;
    $tafels_2 = 2;
    $tafels_3 = 5;
?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/rekenen.css">

        <title>De Splinter - Toetsen - Groep 5 - Vermenigvuldigen</title>
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
                        <h2>Tafels</h2>
                        <?php
                            function maak_tafel(int $tafel) {
                                echo "<h3>Tafel van $tafel</h3>";

                                for ($getal = 1; $getal < 11; $getal++) {
                                    $gegeven_antwoord = "";
                                    $is_antwoord_correct = true;

                                    if (isset($_POST["som$tafel$getal"])) {
                                        $gegeven_antwoord = $_POST["som$tafel$getal"];
                                        $correct_antwoord = intval($getal) * $tafel;
                                        $is_antwoord_correct = intval($gegeven_antwoord) == $correct_antwoord;
                                    }

                                    echo "<div class=\"som\">";
                                    echo "<label>$getal x $tafel =</label>";
                                    echo "<input type=\"text\" value=\"$gegeven_antwoord\" " . ($is_antwoord_correct ? "" : " class=\"incorrect\"") . "placeholder=\"Typ jouw antwoord hier...\" name=\"som$tafel$getal\">";
                                    echo "</div>";
                                }
                            }

                            maak_tafel($tafels_1);
                            maak_tafel($tafels_2);
                            maak_tafel($tafels_3);
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
