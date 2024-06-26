<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Termékek</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/termek_style.css">
    <script src="../js/script.js" defer></script>
</head>
<body >
    <?php
        include_once("../templates/header.php");
    ?>
    <main id="termekMain">
        <h1 class="termekTitle">Kategóriák</h1>
        <div id="categorySelectBar">
            <?php 
                $categories = json_decode(file_get_contents("../data/products.json"), true);
                foreach ($categories as $category){
                    echo "<a href='#{$category['href']}' class='termek'><div class='catItemWrapper'> <img class='catImage' src='{$category['image']}' alt='{$category['name']}'> <h4 class='catBarTitle'>{$category['name']}</h4></div></a>";
                };
            ?>
        </div>

        <?php
            $categories = json_decode(file_get_contents("../data/products.json"), true);
            foreach ($categories as $category) {
                echo "<div class='categoryTitleWrapper' id='{$category['href']}'>";
                echo "<img class='catImage' src='{$category['image']}' alt='{$category['name']}'> <h2 class='categoryTitle'>{$category['name']}</h2></div>";

                echo "<div class='paragraphWrapper'><p class='productParagraph'>{$category['message']}</p></div>";

                $products = $category['products'];
                echo "<div class='productWrapper woodProducts'>";
                foreach ($products as $product) {
                    $ar = number_format($product['price'], 0, ',', '.');
                    echo "<form id='form_{$product['id']}' method='POST' action='functions/kosarbaRak.php'><div class='productCard'>";
                    echo "<input type='hidden' name='productId' value='{$product['id']}'>";
                    echo "<a href='termekleiras.php?id={$product['id']}'><img src='{$product['image']}' alt='{$product['imagealt']}' class='productImage'></a>";
                    echo "<div class='productBottomDiv'><div class='productTextWrapper'><p class='productName'>{$product['title']}</p><p class='productPrice'>{$ar} Ft / {$product['measure']}</p></div>";
                    echo "<div class='productPurchaseBar'><input value='1' max='500' class='amountInput' min='1' type='number' name='amountInput'><label>{$product['measure']}</label><button class='productCartButton' name='kosarbaRak' style='border:none; color: white'><img class='cartIcon' src='../pictures/resources/shopping-cart.png' alt='kosár'>Kosárba</button></div>";
                    echo "</div></div></form>";
                };
                echo "</div>";
            };
        ?>
        
    </main>
    <a href="#" id="upArrow" class="">
        <div>
            <p>↑</p>
        </div>
    </a>
    <footer id="pageFooter">
        <h2 id="location">6726 Szeged, Rönk utca 1.</h2>
        <div id="footerPhone">
            <img id ="phoneImage" src="../pictures/phone.png" alt="Telefon">
            <h3 id="phoneNumber">+36 20 420 6969</h3>
        </div>
    </footer>
</body>
</html>