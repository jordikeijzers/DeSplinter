<!DOCTYPE html>

<?php
    $getal_1 = 10;
    $getal_2 = 8;
    $getal_3 = 7;
?>

<html>
    <head>
        <link rel="stylesheet" href="../../css/header.css">
        <link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/rekenen.css">

        <title>De Splinter - Toetsen - Groep 6 - Plus sommen</title>
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
                    <a href="../../contact.php">Contact</a>
                </nav>
            </div>
        </header>
        <div id="site-content">
            <section>
                <h2>Rekensommen voor groep 6</h2>
                <a href=".">Terug naar som selectie</a>
                <form action="#" method="POST" id="som-input">
                    <div id="sommen">
                        <h2>Plus sommen</h2>
                        <?php
                            function maak_tafel(int $plus_getal) {
                                echo "<section class=\"vragen\">";
                                echo "<h3>Plus sommen met $plus_getal</h3>";

                                $totale_antwoorden = 0;
                                $antwoorden_goed = 0;
                                $antwoord_ingevuld = false;

                                for ($getal = 1; $getal < 11; $getal++) {
                                    $gegeven_antwoord = "";
                                    $is_antwoord_correct = true;

                                    if (isset($_POST["som$plus_getal$getal"])) {
                                        $gegeven_antwoord = $_POST["som$plus_getal$getal"];
                                        $correct_antwoord = intval($getal) + $plus_getal;
                                        $is_antwoord_correct = intval($gegeven_antwoord) == $correct_antwoord;

                                        $antwoord_ingevuld = true;

                                        if ($is_antwoord_correct) {
                                            $antwoorden_goed++;
                                        }
                                    }

                                    $totale_antwoorden++;

                                    echo "<div class=\"som\">";
                                    echo "<label>$getal + $plus_getal =</label>";
                                    echo "<input type=\"text\" value=\"$gegeven_antwoord\" " . ($is_antwoord_correct ? "" : " class=\"incorrect\"") . "placeholder=\"Typ jouw antwoord hier...\" name=\"som$plus_getal$getal\">";
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
            <p>&copy; Basisschool De Splinter, 2020-2021</p>
        </footer>
    </body>
</html>
