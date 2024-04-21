<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Profil</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/index_style.css">
    <link rel="stylesheet" href="../styles/profile_style.css">

    

    <script src="../js/regbej.js" defer></script>
</head>
<body>
    <?php 
        include_once "../templates/header.php";
    ?>
    <main>
        <div id="formWrapper">
            <form autocomplete="off" id="contactForm" action="functions/adatModositas.php" method="POST">
                <h2>Profil adatok - <?php echo $_SESSION['username']; ?></h2>
                <h3>Valamelyik adat módosításához csak írd át az adott adatot.</h3>
                <?php if(isset($_SESSION['emptyFields'])) {echo $_SESSION['emptyFields'];}?>
                <div id="contactTopContainer" style="flex-wrap: wrap">
                    <div id="contactNameContainer" class="contactContainer">
                        <label for="contactNameInput" class="contactLabel">Név</label>
                        <input type="text" name="contactNameInput" id="contactNameInput" class="contactInputField" placeholder="Név..." value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>">
                    </div>
                    <div id="contactEmailContainer" class="contactContainer">
                        <label for="contactEmailInput" class="contactLabel">E-mail</label>
                        <input type="email" name="contactEmailInput" id="contactEmailInput" class="contactInputField" placeholder="E-mail..." value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">
                    </div>
                    <div class="contactContainer">
                        <label for="newPass" class="contactLabel">Új jelszó</label>
                        <input type="password" name="newPass" id="newPass" class="contactInputField" value="" placeholder="Új jelszó...">
                    </div>
                    <div class="contactContainer">
                        <label for="newPassAgain" class="contactLabel">Új jelszó mégegyszer</label>
                        <input type="password" name="newPassAgain" id="newPassAgain" class="contactInputField" value="" placeholder="Új jelszó...">
                    </div>
                    <div class="contactContainer">
                        <label for="currPass" class="contactLabel">Jelenlegi jelszó*</label>
                        <input type="password" name="currPass" id="currPass" class="contactInputField" placeholder="Jelenlegi jelszó..." required>
                        <h6 style="user-select: none;">*A jelenlegi jelszó megadása kötelező.</h6>
                    </div>

                </div>

                <button id="contactSubmitButton" name="userChangeSubmit" type="submit">Adatok módosítása</button>
                <a href="functions/deleteUser.php?username=<?php echo $_SESSION['username'] ?>" onClick="javascript:return confirm('Biztosan törölni akarod a fiókod?')" id="deleteUserButton" style="background-color: red;" class="formButton buttonField">Fiók törlése</a>
            </form>
        </div>
        <h1 id="ordersTitle">Megrendelések</h1>
            <div class="ordersListWrapper">
                <?php 
                    $orders = json_decode(file_get_contents("../data/orders.json"), true);
                    $orders = array_reverse($orders);
                    foreach($orders as $order){
                        if($order['megrendelo'] == $_SESSION['username']) {
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
                                        <a  class="orderCardFieldValue formButton buttonField" href="megrendelesDetailsUser.php?id='. $order['id'] . '">Több információ</a>
                                    </div>
                                </div>
                            ';
                        }

                    }
                ?>
            </div>
            
        </div>
    </main>
    <?php 
        include_once "../templates/footer.html";
    ?>
</body>
</html>