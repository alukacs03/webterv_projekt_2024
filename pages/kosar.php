<?php
    session_start();
    if(!isset($_COOKIE['cart'])){
        setcookie("cart", serialize([]), time() + (60*60*24*30), "/");
    }    
    $vegosszeg = 0;
    $szallitas = 0;
?>
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
        include_once("../templates/header.php");
    ?>
    <main id="indexMain">
        <h1 class="kosarTitle">Kosár</h1>
        <?php 
            if(isset($_SESSION['noUserError'])){
                echo "<h2>{$_SESSION['noUserError']}</h2>";
            }
        ?>
        <div id="cartWrapper">
            <?php
                if(isset($_COOKIE['cart']) && count(unserialize($_COOKIE['cart'])) > 0){
                    $kosar = unserialize($_COOKIE['cart']);

                    foreach ($kosar as $elem){
                        $productId = $elem['id'];
                        $categoryId = explode('.', $productId)[0];
                        $amount = $elem['am'];
                        
                        $categories = json_decode(file_get_contents("../data/products.json"), true);
                        foreach($categories as $category){
                            if($categoryId == $category['id']){
                                $products = $category['products'];
                                foreach($products as $product){
                                    if($productId == $product['id']){
                                        $osszesen = number_format($product['price'] * $amount, 0, ',', '.');
                                        $vegosszeg += $product['price'] * $amount;
                                        $_SESSION['vegosszeg'] = $vegosszeg;
                                        $ar = number_format($product['price'], 0, ',', '.');
                                        echo "
                                        <form action='./functions/kosarbaRak.php' method='POST'>
                                        <div class='cartCard'>
                                        <input type='hidden' name='cartPage' value='yes'>
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
                                                <input type='number' value='{$amount}' min='1' max='100' name='amountInput' id='amountInput' class='amountInput'>
                                                <label for='amountInput'>{$product['measure']}</label>
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
                                            <button class='changeButton' name='kosarbaRak'>Módosítás mentése</button>
                                            <a class='cartCardBinImage' href='functions/kosarbolTorol.php?id={$product['id']}'name='kosarbolTorol'><img src='../pictures/resources/bin.png' alt='kuka' class='cartCardBinImage'></a>
                                        </div>
                                        </div>
                                        </form>
                                        ";
                                    }
                                }
                            }
                        }
                    }
                } else {
                    echo "<h3>A kosarad üres.</h3>";
                    exit;
                }
            ?>
            <div class="cartCard sumCard">
                <div class="sumCardField" id="sumWrapper">
                    <h2 id="summaryTitle">Összegzés</h2>
                </div>
                <div class="sumCardField">
                    <p class="cartCardSummaryText" id="cartCardProductsTitle">Termékek</p>
                    <p class="cartCardSummaryText" id="cartCardTransportTitle">Szállítás</p>
                </div>
                <div class="sumCardField">
                    <p class="cartCardSummaryText" id="cartCardProductsPrice"><?php echo number_format($vegosszeg, 0, ',', '.')?> Ft</p>
                    <p class="cartCardSummaryText" id="cartCardTransportPrice"><?php echo number_format($szallitas, 0, ',', '.')?> Ft</p>
                </div>
                <div class="sumCardField" id="sumCardSumField">
                    <p class="cartCardSummaryText" id="cartCardLastFieldSumTitle">Összesen</p>
                    <p class="cartCardSummaryText" id="cartCardSumPrice"><?php echo number_format($vegosszeg + $szallitas, 0, ',', '.')?> Ft</p>
                </div>
            </div>
            <div class="orderButtonWrapper">
                <a id="makeOrderButton" href="functions/order.php">Rendelés leadása</a>
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