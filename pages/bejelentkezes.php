<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Bejelentkezés</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/beRe_style.css">
    <script src="../js/regbej.js" defer></script>
</head>
<body>
    <?php
        include_once("../templates/header.html");
    ?>
    <main>
        <div id="signIOWapper">
            <form action="index.html" id="IOForm" method="post">
                <div id="formTitle">
                    <p>Felhasználói bejelentkezés</p>
                </div>
                <div id="emailContainer" class="container">
                    <label for="email" class="containerLabel">E-mail cím</label>
                    <input id="email" type="email" name="email" class="containerinput" required>
                </div>
                <div id="passwordContainer" class="container">
                    <label for="password" class="containerLabel">Jelszó</label>
                    <input id="password" type="password" name="password" class="containerinput" required>
                </div>
                <button id="regButton" onclick="return false;">Bejelentkezés</button>
                <div id="signIn">
                    <a href="#" class="signInText" id="iForgetMyPassword">Elfelejtettem a jelszavamat</a>
                    <p class="signInText">Még nem regisztráltál?</p>
                    <a href="regisztracio.html" id="signInLink">Hozd létre a fiókod →</a>
                </div>
            </form>
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