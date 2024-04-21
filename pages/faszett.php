<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Faszett generátor</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/faszett_style.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php
        include_once("../templates/header.php");
    ?>
    <main id="indexMain">
        <div id="titleBar">
                <h1 id="mainTitle">Faszettek - ház, garázs, felhőkarcoló generátor</h1>


        </div>
        <form id="faszettForm" name="faszettForm" action="faszettDetails.php" method="GET">
        <div class="wrapper">
            <div id="wrapperLeft">
                <h2 class="wrapperLeftItem">Faszettek a Rönklovagok Kft-től</h2>
                <h3>Kattintson a "Tervezés" gombra!</h3>

                <p>A weboldalunk egyedi tervet fog generálni a megadott méretek alapján. A terv tartalmazza:</p>
                <ul>
                    <li>Az épület faszerkezetének részletes anyaglistáját (megfelelő mennyiségben)</li>
                    <li>A szükséges faszerszámok listáját</li>
                    <li>3D-s modell az épületről</li>
                </ul>
                <h3>Ha elégedett a tervvel:</h3>
                <ul>
                    <li>Adja hozzá az összes szükséges anyagot és szerszámot a kosárba.</li>
                    <li>Rendelje meg a termékeket kényelmesen online.</li>
                    <li>Várja a szállítást, és kezdje el építeni álmai otthonát!</li>
                </ul>
            </div>
            <div id="wrapperRight">
            <div id="kategoriaDiv">
                <label for="categorySelector">Kategória:</label>
                <select id="categorySelector" name="kategoria">
                    <option value="haz">Ház</option>
                    <option value="garazs">Garázs</option>
                    <option value="felhokarcolo">Felhőkarcoló</option>
                </select>
            </div>
            <div id="meretDiv">
                <label for="hossz">Hossz:</label>
                <div class="amountDiv">
                    <input class="amountInput" type="number" step="any" name="hossz" id="hossz" min="1" max="1000" required>
                    <p class="amountIndicator">m</p>
                </div>
                <label for="szelesseg">Szélesség:</label>
                <div class="amountDiv">
                    <input class="amountInput" type="number" step="any" name="szelesseg" id="szelesseg" min="1" max="1000" required>
                    <p class="amountIndicator">m</p>
                </div>
                <label for="magassag">Magasság:</label>
                <div class="amountDiv">
                    <input class="amountInput" type="number" step="any" name="magassag" id="magassag" min="1" max="1000" required>
                    <p class="amountIndicator">m</p>
                </div>
            </div>
            <div id="buttonDiv">
                <button id="generateButton" name="generateButton">Generálás</button>
            </div>
            </div>

        </div>
        </form>
    </main>
    <a href="#" id="upArrow" class="">
        <div>
            <p>↑</p>
        </div>
    </a>
    <?php
        include_once("../templates/footer.html");
    ?>
</body>
</html>