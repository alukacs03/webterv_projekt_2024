<?php 
    session_start();

    if(!isset($_SESSION['username'])){
        $_SESSION['noUserError'] = 'A megrendelés leadásához kérlek lépj be.';
        header("Location: ../kosar.php");
        exit;
    } else {
        unset($_SESSION['noUserError']);
    }

    if(isset($_COOKIE['cart'])){
        $kosar = unserialize($_COOKIE['cart']);
        $orders = json_decode(file_get_contents("../../data/orders.json"), true);
        $last = end($orders);
        $id = $last['id'] + 1;
        $megrendelo = $_SESSION['username'];
        $allapot = 3;
        $datum = date("Y.m.d H:i");
        $vegosszeg = $_SESSION['vegosszeg'];
        $products = $kosar;
        $newOrder = [
            'id' => $id,
            'megrendelo' => $megrendelo,
            'allapot' => $allapot,
            'datum' => $datum,
            'vegosszeg' => $vegosszeg,
            'products' => $products
        ];
        array_push($orders, $newOrder);
        file_put_contents("../../data/orders.json", json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        setcookie("cart", "", time() - 3600, "/");
        unset($_SESSION['vegosszeg']);
    }

header("Location: ../../index.php");