<?php
    session_start();
        $szelesseg = $_GET['szelesseg'];
        $hossz = $_GET['hossz'];
        $magassag = $_GET['magassag'];
        $szuksegesSzarufa = ceil((($hossz * $szelesseg) / (2 * 0.6)) * 0.8);
        $szuksegesDeszka = ceil((($hossz * $szelesseg) / (1.5)) * 1.1);
        $szuksegesGerenda = ceil((($magassag * $szelesseg) / (2 * 0.4)) * 0.4);
        $szuksegesOSB6 = ceil((($hossz * $szelesseg * $magassag)) * 0.06 * 1.4);
        $szuksegesOSB12 = ceil((($hossz * $szelesseg * $magassag)) * 0.12 * 1.4);
        $szuksegesFaszeg = ceil((($hossz * $szelesseg * $magassag) / 1.253));
        $szuksegesBarazdaltFaszeg = ceil((($hossz * $szelesseg * $magassag) / 0.8411));
        $szuksegesFembetetesFaszeg = ceil((($hossz * $szelesseg * $magassag) / 1.146));
        $mennyisegek = [
            "2.3" => $szuksegesSzarufa,
            "2.1" => $szuksegesDeszka,
            "2.2" => $szuksegesGerenda,
            "3.1" => $szuksegesOSB6,
            "3.2" => $szuksegesOSB12,
            "6.1" => $szuksegesFaszeg,
            "6.2" => $szuksegesBarazdaltFaszeg,
            "6.3" => $szuksegesFembetetesFaszeg
        ];
        $_SESSION['faszettProducts'] = serialize($mennyisegek);

        $kategoria = $_GET['kategoria'];
        //megfelelo kep kivalasztasa
        if($kategoria == 'haz'){
            if($szelesseg * $magassag * $hossz < 200){
                $imgSrc = '../pictures/faszettek/faszett_house_small.jpeg';
            } else if($szelesseg * $magassag * $hossz < 400){
                $imgSrc = '../pictures/faszettek/faszett_house_medium.jpeg';
            } else {
                $imgSrc = '../pictures/faszettek/faszett_house_big.jpeg';
            }
        } else if ($kategoria == 'garazs') {
            if($szelesseg * $magassag * $hossz < 40){
                $imgSrc = '../pictures/faszettek/faszett_garage_small.jpeg';
            } else if($szelesseg * $magassag * $hossz < 230){
                $imgSrc = '../pictures/faszettek/faszett_garage_medium.jpeg';
            } else {
                $imgSrc = '../pictures/faszettek/faszett_garage_big.jpeg';
            }
        } else {
            if($szelesseg * $magassag * $hossz < 10000){
                $imgSrc = '../pictures/faszettek/faszett_skyscraper_small.jpeg';
            } else if($szelesseg * $magassag * $hossz < 60000){
                $imgSrc = '../pictures/faszettek/faszett_skyscraper_medium.jpeg';
            } else {
                $imgSrc = '../pictures/faszettek/faszett_skyscraper_big.jpeg';
            }
        }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Admin</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/faszettdetails_style.css">
    <link rel="stylesheet" href="../styles/kosar_style.css">


    <script src="../js/regbej.js" defer></script>
</head>
<body>
    <?php include_once "../templates/header.php"; ?>
    </header>
    <main>
        <div class="adminMainWrapper ordersPageWrapper">
            <div id="topbar">
                <a href="faszett.php" class="button">Vissza</a>
                <h1 id="ordersTitle">Generált faszett </h1>
            </div>
            <div class="ordersListWrapper">
                <?php 
                    echo '
                        <div class="orderItemWrapper">
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szélesség</div>
                                <div class="orderCardFieldValue orderShipped">'.$szelesseg.' m</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Hossz</div>
                                <div class="orderCardFieldValue orderShipped">'.$hossz.' m</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Magasság</div>
                                <div class="orderCardFieldValue orderShipped">'.$magassag.' m</div>
                            </div>
                        </div>';
                    echo '
                        <div class="imageWrapper">
                            <h2 style="color: white; margin-bottom: 2rem; font-size: 3rem;">Látványterv</h2>
                            <img src="'.$imgSrc.'" id="epuletKep" alt="faszett generált épület">
                        </div>
                    ';
                    echo '
                        <div class="orderItemWrapper">
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges szarufa</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesSzarufa.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges deszka</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesDeszka.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges gerenda</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesGerenda.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges OSB 6mm</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesOSB6.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges OSB 12mm</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesOSB12.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges faszeg</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesFaszeg.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges barázdált faszeg</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesBarazdaltFaszeg.' db</div>
                            </div>
                            <div class="orderCardField">
                                <div class="orderCardFieldTitle">Szükséges fémbetétes faszeg</div>
                                <div class="orderCardFieldValue orderShipped">'.$szuksegesFembetetesFaszeg.' db</div>
                            </div>
                        </div>';
                    $categories = json_decode(file_get_contents('../data/products.json'), true);
                    $vegosszeg = 0;
                    foreach ($categories as $category) {
                        $products = $category['products'];
                        foreach ($products as $product){
                            if(in_array($product['id'],array_keys($mennyisegek), true)){
                                $amount = $mennyisegek[$product['id']];
                                $ar = number_format($product['price'], 0, ',', '.');
                                $osszesen = number_format($product['price'] * $amount, 0, ',', '.');
                                $vegosszeg += $product['price'] * $amount;
                                echo "
                                <form action='./functions/kosarbaRak.php' method='POST'>
                                        <div class='cartCard' id='product{$product['id']}'>
                                        <input type='hidden' name='faszettPage' value='yes'>
                                        <input type='hidden' name='kategoria' value='{$kategoria}'>
                                        <input type='hidden' name='szelesseg' value='{$szelesseg}'>
                                        <input type='hidden' name='hossz' value='{$hossz}'>
                                        <input type='hidden' name='magassag' value='{$magassag}'>
                                        <input type='hidden' name='productId' value='{$product['id']}'>
                                        <div class='cartCardField firstLast'>
                                            <img src='{$product["image"]}' alt='' class='cartCardProductImage'>
                                        </div>
                                        <div class='cartCardField'>
                                            <p class='cartCardTitle'>Név</p>
                                            <p class='cartCardProductName'>{$product['title']}</p>
                                        </div>
                                        <div class='cartCardField'>
                                            <p class='cartCardTitle'>Mennyiség</p>
                                            <div class='cartCardAmountWrapper'>
                                                <input type='number' value='{$amount}' min='1' max='500' name='amountInput' id='amountInput{$product['id']}' class='amountInput' readonly>
                                                <label for='amountInput{$product['id']}'>{$product['measure']}</label>
                                            </div>
                                        </div>
                                        <div class='cartCardField'>
                                            <p class='cartCardTitle'>Ár</p>
                                            <p class='cartCardPricePerMeasurement'>{$ar} Ft/{$product['measure']}</p>
                                        </div>
                                        <div class='cartCardField'>
                                            <p class='cartCardTitle'>Összesen</p>
                                            <p class='cartCardItemPriceSum'>{$osszesen} Ft</p>
                                        </div>
                                
                                        <div class='cartCardField firstLast'>
                                            <button style='grid-row: 1/3;' class='changeButton' name='kosarbaRak'>Kosárba rak</button>
                                        </div>
                                        </div>
                                        </form>
                                        ";
                                
                            }
                        }
                    }
                    echo "
                        <a style='height: fit-content; width: fit-content; padding: 1rem; font-size: 4rem;' class='changeButton' name='kosarbaRak' href='functions/kosarbaRak.php?faszett=true'>Minden termék a kosárba</a>
                    ";
                ?>
                
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