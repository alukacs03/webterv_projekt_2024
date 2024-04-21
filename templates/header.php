<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>
<header id="pageHeader">
    <nav class="menuBar">
        <a href="../index.php" class="menuBranding">Rönklovagok Kft.</a>
        <ul class="menu">
            <li class="menuItem">
                <a href="rolunk.php" class="menuLink">Rólunk</a>
            </li>
            <li class="menuItem">
                <a href="termek.php" class="menuLink">Termékek</a>
            </li>
            <li class="menuItem">
                <a href="faszett.php" class="menuLink">Faszettek</a>
            </li>
            <li class="menuItem">
                <a href="kosar.php" class="menuLink">Kosár</a>
            </li>
            <?php
                if(!isset($_SESSION["username"])){
                    echo '
                    <li class="menuItem">
                    <a href="./bejelentkezes.php" class="menuLink">Bejelentkezés</a>
                </li>
                <li class="menuItem">
                    <a href="./regisztracio.php" class="menuLink">Regisztráció</a>
                </li>
                    ';
                } else {
                    echo '
                        <li class="menuItem">
                            <a href="kijelentkezes.php" class="menuLink">Kijelentkezés</a>
                        </li>
                    ';
                    echo '
                    <li class="menuItem">
                        <a href="profil.php" class="menuLink">Profil</a>
                    </li>
                ';
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
                        echo '
                            <li class="menuItem">
                                <a href="./admin/admin.php" class="menuLink">Admin</a>
                            </li>
                        ';
                    }
                }
            ?>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>