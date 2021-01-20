<?php

function bereken_antwoord(int $getal1, int $getal2, int $methode, int $groep) {
    // Deze switch-statement gebruikt geen break,
    // omdat er al return wordt gebruikt. Hierdoor
    // komt de script nooit tot de break.
    switch ($methode) {
            // Vermenigvuldigen
        case 1:
            return [ $getal1, $getal2, $getal1 * $getal2 ];

            // Aftrekken
        case 2:
            // Groep 4 en 5 krijgen geen min getallen.
            // (Niet bij deze site tenminste)
            if ($groep != 6) {
                // We gebruiken min() en max() zodat het getal
                // niet in de min kan gaan.
                return [ min($getal1, $getal2), max($getal1, $getal2), max($getal1, $getal2) - min($getal1, $getal2) ];
            } else {
                // Groep 6 mag min getallen krijgen.
                return [ $getal1, $getal2, $getal1 - $getal2 ];
            }

            // Plus sommen
        case 3:
            return [ $getal1, $getal2, $getal1 + $getal2 ];

            // Er wordt geen andere methode ondersteund.
        default:
            return null;
    }
}

function maak_input_veld(string $som, string $ingevoerde_antwoord = "", bool $correct = false) {
    if (!$correct) {
        $class = "class=\"incorrect\"";
    } else {
        $class = "";
    }

    echo "
            <div class=\"som\">
                <label>$som</label>
                <input $class type=\"text\" value=\"$ingevoerde_antwoord\" placeholder=\"Typ jouw antwoord hier...\">
            </div>
        ";
}

/**
 * int $soort:
 *      1 = Vermenigvuldigen
 *      2 = Aftrekken
 *      3 = Plus sommen
 */
function maak_sommen(int $methode, int $groep) {
    // Maak titel
    echo "<section class=\"vragen\">\n<h3>";
    switch ($methode) {
        case 1:
            echo "Vermenigvuldigen";
            break;
        case 2:
            echo "Aftrekken";
            break;
        case 3:
            echo "Plus sommen";
            break;
        // Niet ondersteund.
        default:
            return;
    }
    echo "</h3>";

    // Geneneer de sommen.
    for ($som_nummer = 1; $som_nummer < 11; $som_nummer++) {
        // Het getal waarmee gerekend gaat worden.
        $getal1 = rand(1, $groep + 3);
        $getal2 = rand(1, 10);

        // Dit geeft null terug als de methode ongeldig is.
        // Omdat we dit eerder al gecontrolleerd hebben bij de titel,
        // is dat hier niet nodig; het kan nooit null worden.
        $antwoord = bereken_antwoord($getal1, $getal2, $methode, $groep);

        $getal1 = $antwoord[0];
        $getal2 = $antwoord[1];
        $antwoord = $antwoord[2];

        // Genereer een ID voor de som.
        // Dit wordt de 'key' voor $_POST en $_SESSION.
        $som_id = "toets_$getal1$getal2$methode$groep";

        // We gaan ervan uit dat session_start() gebruikt is op de
        // pagina die deze functie aanroept.
        $_SESSION[$som_id] = [
            $getal1,
            $getal2,
            $antwoord
        ];

        $som = "$getal1 ";

        switch ($methode) {
            case 1:
                $som .= "x";
                break;
            case 2:
                $som .= "-";
                break;
            case 3:
                $som .= "+";
                break;
        }

        $som .= " $getal2 =";

        $correct = false;

        if (isset($_POST[$som_id])) {
            $ingevoerde_antwoord = $_POST[$som_id];

            $som_data = $_SESSION[$som_id];
            $goede_antwoord = $som_data[2];

            if ($ingevoerde_antwoord == $goede_antwoord) {
                $correct = true;
            }
        } else {
            $ingevoerde_antwoord = "";
        }

        maak_input_veld($som, $ingevoerde_antwoord, $correct);
    }

    echo "</section>";
}