<?php
    session_start();
    //ha a felhasznalo mar be van jelentkezve, akkor visszairanyitjuk a fooldalra
    if(isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
    if(isset($_POST['regButton'])){
        if(isset($_POST['email']) && trim($_POST['email']) !== "" && isset($_POST['password']) && trim($_POST['password']) !== "" && isset($_POST['passwordAgain']) && trim($_POST['passwordAgain']) !== ""){
            if($_POST['password'] == $_POST['passwordAgain']){
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $users = json_decode(file_get_contents("../data/users.json"), true);
                $newUser = [
                    "email" => $email,
                    "password" => $password,
                    "admin" => 0
                ];
                foreach($users as $user){
                    if($user["email"] == $email){
                        echo "email already in use";
                        return;
                    }
                }
                array_push($users, $newUser);
                file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                $_SESSION["username"] = $email;
                $_SESSION["admin"] = 0;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok - Regisztráció</title>
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
            <form action="regisztracio.php" id="IOForm" method="post">
                <div id="formTitle">
                    <p>Regisztráció</p>
                </div>
                <div id="emailContainer" class="container">
                    <label for="email" class="containerLabel">E-mail cím</label>
                    <input id="email" type="email" name="email" class="containerinput" required>
                </div>
                <div id="passwordContainer" class="container">
                    <label for="password" class="containerLabel">Jelszó</label>
                    <input id="password" type="password" name="password" class="containerinput" required>
                </div>
                <div id="passwordAgainContainer" class="container">
                    <label for="passwordAgain" class="containerLabel">Jelszó újra</label>
                    <input id="passwordAgain" type="password" name="passwordAgain" class="containerinput" required>
                </div>
                <button id="regButton" name="regButton">Regisztráció</button>
                <div id="signIn">
                    <p class="signInText">Már van fiókod?</p>
                    <a href="bejelentkezes.php" id="signInLink">Bejelentkezés →</a>
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