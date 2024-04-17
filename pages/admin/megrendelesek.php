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

        <div class="adminMainWrapper ordersPageWrapper">
            <h1 id="ordersTitle">Megrendelések</h1>
            <div class="ordersListWrapper">
                <?php 
                    $orders = json_decode(file_get_contents("../../data/orders.json"), true);
                    foreach($orders as $order){
                        $allapot = $order['allapot'] == 1 ? "KISZÁLLÍTVA" : ($order['allapot'] == 2 ? "FOLYAMATBAN" : "FIZETÉSRE VÁR");
                        $allapotColor = $order['allapot'] == 1 ? "green" : ($order['allapot'] == 2 ? "orange" : "red");
                        $vegosszeg = number_format($order['vegosszeg'], 0, ',', '.');
                        echo '
                            <div class="orderItemWrapper">
                                <div class="orderCardField">
                                    <div class="orderCardFieldTitle">Név</div>
                                    <div class="orderCardFieldValue orderNameField">'.$order['megrendelo'].'</div>
                                </div>
                                <div class="orderCardField">
                                    <div class="orderCardFieldTitle">Állapot</div>
                                    <div class="orderCardFieldValue orderShipped" style=background-color:' . $allapotColor .';>'.$allapot.'</div>
                                </div>
                                <div class="orderCardField">
                                    <div class="orderCardFieldTitle">Rendelés beérkezett</div>
                                    <div class="orderCardFieldValue orderDateField">'.$order['datum'].'</div>
                                </div>
                                <div class="orderCardField">
                                    <div class="orderCardFieldTitle">Végösszeg</div>
                                    <div class="orderCardFieldValue orderSumField">'.$vegosszeg.' Ft</div>
                                </div>
                                <div class="orderCardField">
                                    <a  class="orderCardFieldValue formButton buttonField" href="megrendelesDetails.php?id='. $order['id'] . '">Több információ</a>
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