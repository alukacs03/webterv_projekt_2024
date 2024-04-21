<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
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
    <link rel="shortcut icon" href="../../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/global_style.css">
    <link rel="stylesheet" href="../../styles/admin_style.css">
    <link rel="stylesheet" href="../../styles/kosar_style.css">
    <script src="../../js/regbej.js" defer></script>
</head>
<body>
    <header id="pageHeader">
        <nav class="menuBar" id="adminMenuBar">
            <h3 id="adminTitle"><a href="admin.php">Rönklovagok Admin Felület</a></h3>
            <ul class="menu" id="adminBackToPage">
                <li class="menuItem"><a class="menuLink" href="../../index.php">Vissza az oldalra</a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <main>
        <?php include_once "../../templates/adminSideNav.php"; ?>

        <div class="adminMainWrapper productsPageWrapper">
            <h1 id="productsTitle" style="margin: 2rem 0">Termékek</h1>
            <h3 style="color: red;">Vigyázat! A törlés a kategória törlése az összes benne lévő termék törlését vonja maga utás!</h3>
            <div class="productsListWrapper">
                <?php 
                    $categories = json_decode(file_get_contents("../../data/products.json"), true);
                    foreach($categories as $category){
                        $productDb = count($category['products']);
                        $deleteConfirmText = "Biztos, hogy törölni akarod a {$category['name']} kategóriát?";
                            echo '
                            <div class="termekWrapper" style="grid-template-columns: 1fr 1fr 1fr 1fr">
                                <div>
                                    <img src='.$category["image"].' alt='.$category["href"].' class="cartCardProductImage">
                                </div>
                                <div>
                                    <div class="orderCardFieldTitle">Név</div>
                                    <div class="orderCardFieldValue orderNameField">'.$category['name'].'</div>
                                </div>
                                <div>
                                    <div class="orderCardFieldTitle">Termékek</div>
                                    <div class="orderCardFieldValue orderNameField">'.$productDb.' db</div>
                                </div>
                                <div>
                                    <a class="cartCardBinImage" onClick=\'javascript:return confirm("'.$deleteConfirmText.'");\' href="./functions/kategoriaTorol.php?id='. $category['id'].'" name="kategoriaTorol"><img src="../../pictures/resources/bin.png" alt="kuka" class="cartCardBinImage"></a>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            
        </div>
    </main>
    <footer id="pageFooter">
        <h2 id="location">6726 Szeged, Rönk utca 1.</h2>
        <div id="footerPhone">
            <img id ="phoneImage" src="../../pictures/phone.png" alt="Telefon">
            <h3 id="phoneNumber">+36 20 420 6969</h3>
        </div>
    </footer>
</body>
</html>