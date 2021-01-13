<!DOCTYPE html>

<?php
    $tafel_van = 7;
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/rekenen.css">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <title>De Splinter - Rekenen - Groep 6</title>
    </head>
    <body>
        <header>
            <div id="header-content">
                <h1>De Splinter</h1>
                <nav>
                    <a href="../index.html">Home</a>
                    <a href="../informatie.html">Informatie</a>
                    <a href="../reken.html">Reken</a>
                    <a href="../toetsen.html">Toetsen</a>
                    <a href="../contact.php">Contact</a>
                </nav>
            </div>
        </header>
        <div id="site-content">
            <section>
                <h2>Rekensommen voor groep 6</h2>
                <a href="../reken.html">Terug naar groep selectie</a>
                <form action="#" method="POST" id="som-input">
                    <div id="tafels">
                        <h2>Tafels</h2>
                        <h3>Tafel van <?php echo $tafel_van; ?></h3>
                        <?php
                            for ($getal = 1; $getal < 11; $getal++) {
                                $gegeven_antwoord = "";
                                $is_antwoord_correct = true;

                                if (isset($_POST["tafels_som$getal"])) {
                                    $gegeven_antwoord = $_POST["tafels_som$getal"];
                                    $correct_antwoord = intval($getal) * $tafel_van;
                                    $is_antwoord_correct = intval($gegeven_antwoord) == $correct_antwoord;
                                }

                                echo "<div class=\"som\">";
                                echo "<label>$getal x $tafel_van =</label>";
                                echo "<input type=\"text\" value=\"$gegeven_antwoord\" " . ($is_antwoord_correct ? "" : " class=\"incorrect\"") . "placeholder=\"Typ jouw antwoord hier...\" name=\"tafels_som$getal\">";
                                echo "</div>";
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
