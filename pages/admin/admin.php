<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: ../../index.php");
        exit();
    }
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
        header("Location: ../../index.php");
        exit();
    }

    $orders = json_decode(file_get_contents("../../data/orders.json"), true);
    $newOrders = 0;
    foreach($orders as $order){
        if($order['allapot'] == 3){
            $newOrders++;
        }
    }

    $categories = json_decode(file_get_contents("../../data/products.json"), true);
    $productNum = 0;
    $reviewsNum = 0;
    foreach($categories as $category){
        $productNum += count($category['products']);
        $products = $category['products'];
        foreach($products as $product){
            $reviewsNum += count($product['reviews']);
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
    <link rel="shortcut icon" href="../../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../styles/global_style.css">
    <link rel="stylesheet" href="../../styles/admin_style.css">
    <script src="../../js/regbej.js" defer></script>
</head>
<body>
    <header id="pageHeader">
        <nav class="menuBar" id="adminMenuBar">
            <h3 id="adminTitle"><a href="#">Rönklovagok Admin Felület</a></h3>
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
            <div class="adminMainWrapper" id="adminMetricsWrapper">
            <div class="metricsBox" id="metricTopLeft">
                <p class="metricNumber"><?php echo $newOrders?></p>
                <p class="metricText">új megrendelés</p>
            </div>
            <div class="metricsBox" id="metricTopRight">
                <p class="metricNumber"><?php echo $reviewsNum?></p>
                <p class="metricText">vélemény</p>
            </div>
            <div class="metricsBox" id="metricBottomLeft">
                <p class="metricNumber"><?php echo rand(0, 100)?></p>
                <p class="metricText">új fa szú</p>
            </div>
            <div class="metricsBox" id="metricBottomRight">
                <p class="metricNumber"><?php echo $productNum ?></p>
                <p class="metricText">féle termék</p>
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