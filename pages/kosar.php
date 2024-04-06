<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kosár</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/kosar_style.css">
    <script src="../js/regbej.js" defer></script>
</head>
<body>
<?php
        include_once("../templates/header.html");
    ?>
    <main id="indexMain">
        <h1 class="kosarTitle">Kosár</h1>
        <div id="cartWrapper">
            <div class="cartCard">
                <div class="cartCardField firstLast">
                    <img src="../pictures/products/bukk.jpg" alt="" class="cartCardProductImage">
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Név</p>
                    <p class="cartCardProductName">Bükk</p>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Mennyiség</p>
                    <div class="cartCardAmountWrapper">
                        <input type="number" value="5" min="1" max="100" name="amountInput" id="amountInput" class="amountInput">
                        <label for="amountInput">m<sup>3</sup></label>
                    </div>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Ár</p>
                    <p class="cartCardPricePerMeasurement">59.900 Ft/m<sup>3</sup></p>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Összesen</p>
                    <p class="cartCardItemPriceSum">299.500 Ft</p>
                </div>
                <div class="cartCardField firstLast">
                    <img src="../pictures/resources/bin.png" alt="kuka" class="cartCardBinImage">
                </div>
            </div>
            <div class="cartCard">
                <div class="cartCardField firstLast">
                    <img src="../pictures/products/akac.jpg" alt="" class="cartCardProductImage">
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Név</p>
                    <p class="cartCardProductName">Akác</p>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Mennyiség</p>
                    <div class="cartCardAmountWrapper">
                        <input type="number" value="10" min="1" max="100" name="amountInput" class="amountInput">
                        <label for="amountInput">m<sup>3</sup></label>
                    </div>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Ár</p>
                    <p class="cartCardPricePerMeasurement">54.900 Ft/m<sup>3</sup></p>
                </div>
                <div class="cartCardField">
                    <p class="cartCardTitle">Összesen</p>
                    <p class="cartCardItemPriceSum">549.000 Ft</p>
                </div>
                <div class="cartCardField firstLast">
                    <img src="../pictures/resources/bin.png" alt="kuka" class="cartCardBinImage">
                </div>
            </div>
            <div class="cartCard sumCard">
                <div class="sumCardField" id="sumWrapper">
                    <h2 id="summaryTitle">Összegzés</h2>
                </div>
                <div class="sumCardField">
                    <p class="cartCardSummaryText" id="cartCardProductsTitle">Termékek</p>
                    <p class="cartCardSummaryText" id="cartCardTransportTitle">Szállítás</p>
                </div>
                <div class="sumCardField">
                    <p class="cartCardSummaryText" id="cartCardProductsPrice">848.500 Ft</p>
                    <p class="cartCardSummaryText" id="cartCardTransportPrice">200.000 Ft</p>
                </div>
                <div class="sumCardField" id="sumCardSumField">
                    <p class="cartCardSummaryText" id="cartCardLastFieldSumTitle">Összesen</p>
                    <p class="cartCardSummaryText" id="cartCardSumPrice">1.048.500 Ft</p>
                </div>
            </div>
            <div class="orderButtonWrapper">
                <button id="makeOrderButton">Rendelés leadása</button>
            </div>
        </div>
    </main>
    <footer id="pageFooter">
        <h2 id="location">6726 Szeged, Rönk utca 1.</h2>
        <div id="footerPhone">
            <img id ="phoneImage" src="../pictures/phone.png" alt="Telefon">
            <h3 id="phoneNumber">+36 20 420 6969</h3>
        </div>
    </footer>
</body>
</html>