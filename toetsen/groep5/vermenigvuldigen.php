<!DOCTYPE html>

<?php
    $getal_1 = 5;
    $getal_2 = 4;
    $getal_3 = 8;
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
                                echo "<section class=\"vragen\">";
                                echo "<h3>Tafel van $tafel</h3>";

                                $totale_antwoorden = 0;
                                $antwoorden_goed = 0;
                                $antwoord_ingevuld = false;

                                for ($getal = 1; $getal < 11; $getal++) {
                                    $gegeven_antwoord = "";
                                    $is_antwoord_correct = true;

                                    if (isset($_POST["som$tafel$getal"])) {
                                        $gegeven_antwoord = $_POST["som$tafel$getal"];
                                        $correct_antwoord = intval($getal) * $tafel;
                                        $is_antwoord_correct = intval($gegeven_antwoord) == $correct_antwoord;
                                    }

                                    $antwoord_ingevuld = true;
                                    $totale_antwoorden++;

                                    if ($is_antwoord_correct) {
                                        $antwoorden_goed++;
                                    }

                                    echo "<div class=\"som\">";
                                    echo "<label>$getal x $tafel =</label>";
                                    echo "<input type=\"text\" value=\"$gegeven_antwoord\" " . ($is_antwoord_correct ? "" : " class=\"incorrect\"") . "placeholder=\"Typ jouw antwoord hier...\" name=\"som$tafel$getal\">";
                                    echo "</div>";
                                }

                                if ($antwoord_ingevuld) {
                                    $cijfer = $antwoorden_goed / $totale_antwoorden * 9 + 1;

                                    echo "<p><strong>Je hebt $antwoorden_goed van de $totale_antwoorden antwoorden goed. Jouw cijfer voor dit onderdeel is dus een $cijfer.</strong></p>";
                                    echo "</section>";

                                    return $cijfer;
                                }

                                echo "</section>";
                            }

                            $cijfers = array();

                            $cijfers[] = maak_tafel($getal_1);
                            $cijfers[] = maak_tafel($getal_2);
                            $cijfers[] = maak_tafel($getal_3);

                            $cijfer = 0;
                            $aantal_cijfers = 0;

                            foreach ($cijfers as $_ => $onderdeel_cijfer) {
                                $cijfer += $onderdeel_cijfer;
                                $aantal_cijfers++;
                            }

                            if ($aantal_cijfers > 0) {
                                $cijfer = $cijfer / $aantal_cijfers;

                                $color = $cijfer >= 5.5 ? "#00aa00" : "#aa0000";

                                echo "<p style=\"color: $color\"><strong>Jouw punt voor deze toets is een $cijfer</strong></p>";
                            }
                        ?>
                    </div>
                    <input type="submit" value="Controleren">
                </form>
            </section>
        </div>
        <footer>
            <p>&copy; Basisschool De Splinter, 2020</p>
        </footer>
    </body>
</html>
