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

    if(isset($_SESSION['alertMessage'])){
        echo "<script>alert('{$_SESSION['alertMessage']}');</script>";
        unset($_SESSION['alertMessage']);
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
            <h1 id="ordersTitle">Felhasználók</h1>
            <div class="ordersListWrapper">
                <?php 
                    $users = json_decode(file_get_contents("../../data/users.json"), true);
                    foreach($users as $user){
                        $admin = $user['admin'] == 1 ? "ADMIN" : "FELHASZNÁLÓ";
                        $button = $user['admin'] == 1 ? "Admin jog elvétele" : "Admin jog adás";
                        $buttonbg = $user['admin'] == 1 ? "style='background-color: red;'" : "";
                        $adminConfirmText = $user['admin'] == 1 ? "Biztos, hogy el akarod venni {$user['username']} admin jogát?" : "Biztos, hogy adminná akarod tenni {$user['username']}-t?";
                        $deleteConfirmText = "Biztos, hogy törölni akarod {$user['username']} fiókját?";
                        echo "
                        <div class='orderItemWrapper'>
                        <div class='orderCardField'>
                            <div class='orderCardFieldTitle'>Felhasználónév</div>
                            <div class='orderCardFieldValue orderNameField'>{$user['username']}</div>
                        </div>
                        <div class='orderCardField'>
                            <div class='orderCardFieldTitle'>Típus</div>
                            <div class='orderCardFieldValue orderShipped'>{$admin}</div>
                        </div>
                        <div class='orderCardField'>
                            <div class='orderCardFieldTitle'>E-mail cím</div>
                            <div class='orderCardFieldValue orderDateField'>{$user['email']}</div>
                        </div>
                        <div class='orderCardField'>
                            <a href='./functions/toggleAdmin.php?username={$user['username']}' onClick=\"javascript:return confirm('{$adminConfirmText}');\" class='orderCardFieldValue formButton buttonField'{$buttonbg}>{$button}</a>
                        </div>
                        <div class='orderCardField'>
                            <a href='./functions/deleteUser.php?username={$user['username']}' onClick=\"javascript:return confirm('{$deleteConfirmText}');\" class='orderCardFieldValue formButton buttonField' style='background-color: red; margin: 1rem'>Felhasználó törlése</a>
                        </div>
                    </div>
                        ";
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