<!DOCTYPE html>

<?php
    $email_verzonden = false;

    // Als één van de velden bestaat, moeten
    // de andere ook bestaan. Dit komt doordat
    // ze allemaal uit dezelfde form komen.
    if (isset($_POST["email"])) {
        $email_verzonden = true;
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/contact.css">

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <title>De Splinter</title>
    </head>
    <body>
        <header>
            <div id="header-content">
                <h1>De Splinter</h1>
                <nav>
                    <a href="index.html">Home</a>
                    <a href="informatie.html">Informatie</a>
                    <a href="reken.html">Reken</a>
                    <a href="toetsen.html">Toetsen</a>
                    <a href="contact.php">Contact</a>
                </nav>
            </div>
        </header>
        <div id="site-content">
            <section>
                <div id="email-div">
                    <h2>E-mail</h2>
                    <form action="contact.php" method="POST">
                        <div class="form-input">
                            <label for="email">E-mailadres:</label>
                            <input type="email" name="email" id="email" placeholder="Typ jouw e-mailadres hier..." required>
                        </div>
                        <div class="form-input">
                            <label for="onderwerp">Onderwerp:</label>
                            <input type="text" name="onderwerp" id="onderwerp" placeholder="Typ het onderwerp hier..." required>
                        </div>
                        <div class="form-input">
                            <label for="bericht">Bericht:</label>
                            <textarea name="bericht" id="bericht" placeholder="Typ jouw bericht hier..." required></textarea>
                        </div>
                        <input type="submit" id="email-verzonden" value="Versturen">
                    </form>
                    <?php
                        // Ik ontvang liever geen mails van mensen
                        // die ik niet ken. Omdat dit openbaar op
                        // GitHub staat, werkt het versturen van mails niet.
                        // Dit kan werkend gemaakt worden met de mail() functie.
                        if ($email_verzonden) {
                            echo "<p><strong>E-mails versturen wordt (nog) niet ondersteund. De mail is niet verstuurd.</strong></p>";
                        }
                    ?>
                </div>
            </section>
        </div>
        <footer>
            <p>&copy; Basischool De Splinter, 2020-2021</p>
        </footer>
    </body>
</html>