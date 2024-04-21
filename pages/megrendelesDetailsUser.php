<?php
    session_start();
    $orderId = $_GET['id'];
    $orders = json_decode(file_get_contents("../data/orders.json"), true);
    foreach($orders as $order){
        if($order['id'] == $orderId){
            if($order['megrendelo'] != $_SESSION['username']){
                header("Location: profil.php");
                exit();
            }
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
    <link rel="stylesheet" href="../styles/megrendeles_style.css">

    <script src="../js/regbej.js" defer></script>
</head>
<body>
    <?php include_once "../templates/header.php"; ?>
    <main>
        <div class="adminMainWrapper ordersPageWrapper">
            <div id="topbar">
                <a href="profil.php" class="button">Vissza</a>
                <h1 id="ordersTitle">Megrendelés #<?php echo $_GET['id']?></h1>
            </div>
            <div class="ordersListWrapper">
                <?php 
                    $orders = json_decode(file_get_contents("../data/orders.json"), true);
                    foreach($orders as $order){
                        $products = $order['products'];
                        if($order['id'] != $_GET['id']){
                            continue;
                        } else {
                            $id = $order['id'];
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
                                </div>
                            ';
                        foreach($products as $product){
                            $categoryId = explode(".", $product['id'])[0];
                            $categories = json_decode(file_get_contents("../data/products.json"), true);
                            foreach($categories as $category){
                                if($category['id'] == $categoryId){
                                    $catProducts = $category['products'];
                                    foreach($catProducts as $catProduct){
                                        if($catProduct['id'] == $product['id']){
                                            $vegosszeg = number_format($catProduct['price'] * $product['am'], 0, ',', '.');
                                            $price = number_format($catProduct['price'], 0, ',', '.');
                            
                                            echo '
                                            <div class="orderItemWrapper">
                                                <div class="orderCardField">
                                                    <div class="orderCardFieldTitle">Termék</div>
                                                    <div class="orderCardFieldValue orderNameField">'.$catProduct['title'].'</div>
                                                </div>
                                                <div class="orderCardField">
                                                    <div class="orderCardFieldTitle">Mennyiség</div>
                                                    <div class="orderCardFieldValue">'.$product['am']. '</div>
                                                </div>
                                                <div class="orderCardField">
                                                    <div class="orderCardFieldTitle">Ár/'. $catProduct['measure'] .'</div>
                                                    <div class="orderCardFieldValue orderDateField">' . $price . ' Ft</div>
                                                </div>
                                                <div class="orderCardField">
                                                    <div class="orderCardFieldTitle">Végösszeg</div>
                                                    <div class="orderCardFieldValue orderSumField">'.$vegosszeg.' Ft</div>
                                                </div>
                                            </div>
                                        ';
                                        }
                                    }
                                }
                            }

                            }
                        }
                    }
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