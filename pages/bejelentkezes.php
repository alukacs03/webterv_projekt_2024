<?php
    session_start();
    //ha a felhasznalo mar be van jelentkezve, akkor visszairanyitjuk a fooldalra
    if(isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
    if (isset($_POST["regButton"])) {
        if (isset($_POST["username"]) && trim($_POST["username"]) !== "" && isset($_POST["password"]) && trim($_POST["password"]) !== "") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $users = json_decode(file_get_contents("../data/users.json"), true);
            foreach($users as $user){
                if($user["username"] == $username){
                    if(password_verify($password, $user["password"])){
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["email"] = $user["email"];
                        $_SESSION["admin"] = $user["admin"];
                        header("Location: ../index.php");
                        unset($_SESSION["loginError"]);
                        exit();
                    }
                }
            }
            $_SESSION["loginError"] = "Hibás felhasználónév vagy jelszó!";
            header("Location: bejelentkezes.php");
            exit();
        }
    }

?>
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
        include_once("../templates/header.php");
    ?>
    <main>
        <div id="signIOWapper">
            <form action="bejelentkezes.php" id="IOForm" method="post">
                <div id="formTitle">
                    <p>Felhasználói bejelentkezés</p>
                </div>
                <div id="usernameContainer" class="container">
                    <?php 
                        if(isset($_SESSION["loginError"])){
                            echo "<p style='align-self: center'>".$_SESSION["loginError"]."</p>";
                            unset($_SESSION["loginError"]);
                        }
                    ?>
                    <label for="username" class="containerLabel">Felhasználónév</label>
                    <input id="username" type="text" name="username" class="containerinput" required>
                </div>
                <div id="passwordContainer" class="container">
                    <label for="password" class="containerLabel">Jelszó</label>
                    <input id="password" type="password" name="password" class="containerinput" required>
                </div>
                <button id="regButton" name="regButton" type="submit">Bejelentkezés</button>
                <div id="signIn">
                    <a href="#" class="signInText" id="iForgetMyPassword">Elfelejtettem a jelszavamat</a>
                    <p class="signInText">Még nem regisztráltál?</p>
                    <a href="regisztracio.php" id="signInLink">Hozd létre a fiókod →</a>
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