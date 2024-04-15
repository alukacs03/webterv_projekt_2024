<?php
    session_start();
    //ha a felhasznalo mar be van jelentkezve, akkor visszairanyitjuk a fooldalra
    if(isset($_SESSION['username'])){
        header("Location: ../index.php");
    }
    if(isset($_POST['regButton'])){
        if(isset($_POST['username']) && trim($_POST['username']) !== "" && isset($_POST['email']) && trim($_POST['email']) !== "" && isset($_POST['password']) && trim($_POST['password']) !== "" && isset($_POST['passwordAgain']) && trim($_POST['passwordAgain']) !== ""){
            if($_POST['password'] == $_POST['passwordAgain']){
                $username = $_POST['username'];
                $email = $_POST['email'];
                // megnezzuk, hogy eleg eros-e a jelszo (legalabb 8 karakter, legalabb egy kisbetu, egy nagybetu, egy szam es egy specialis karakter)
                $uppercase = preg_match('@[A-Z]@', $_POST['password']);
                $lowercase = preg_match('@[a-z]@', $_POST['password']);
                $number    = preg_match('@[0-9]@', $_POST['password']);
                $specialChars = preg_match('@[^\w]@', $_POST['password']);
                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 8) {
                    // ezek ahhoz kellenek, hogy a jelszon kivul minden mast alapbol vissza tudjunk tolteni, mikor ujratoltodik az oldal a PHP keres miatt
                    $_SESSION['temp_user'] = $username;
                    $_SESSION['temp_email'] = $email;
                    $_SESSION['pwderror'] = "A jelszónak legalább 8 karakter hosszúnak kell lennie, tartalmaznia kell legalább egy kisbetűt, egy nagybetűt, egy számot és egy speciális karaktert!";
                    header("Location: regisztracio.php");
                    exit();
                }
                // megnezzuk, hogy valid-e az email
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    unset($_SESSION['temp_email']);
                    $_SESSION['temp_user'] = $username;
                    $_SESSION['emailError'] = "Az e-mail cím nem megfelelő formátumú!";
                    header("Location: regisztracio.php");
                    exit();
                }
                //hasheljuk a jelszot
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                //betoltjuk a mar meglevo usereket
                $users = json_decode(file_get_contents("../data/users.json"), true);
                // uj user objektum
                $newUser = [
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "admin" => 0
                ];
                //megnezzuk, hogy van-e mar ilyen username vagy email
                foreach($users as $user){
                    if($user["username"] == $username){
                        unset($_SESSION['temp_user']);
                        $_SESSION['temp_email'] = $email;
                        $_SESSION['userError'] = "A felhasználónév már használatban van!";
                        header("Location: regisztracio.php");
                        exit();
                    }
                    if($user["email"] == $email){
                        unset($_SESSION['temp_email']);
                        $_SESSION['temp_user'] = $username;
                        $_SESSION['emailError'] = "Az e-mail cím már használatban van!";
                        header("Location: regisztracio.php");
                        exit();
                    }

                }
                //ha eddig nem volt hiba, jok vagyunk
                array_push($users, $newUser);
                file_put_contents("../data/users.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                //be is jelentkezunk rogton
                $_SESSION["username"] = $username;
                $_SESSION["admin"] = 0;
                // biztonsag kedveert toroljuk a temp_user es temp_email session valtozokat
                unset($_SESSION['temp_user']);
                unset($_SESSION['temp_email']);
                header("Location: ../index.php");
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
                <div id=="usernameContainer" class="container">
                    <label for="username" class="containerLabel">Felhasználónév</label>
                    <?php 
                        if(isset($_SESSION['userError'])){
                            echo "<p>".$_SESSION['userError']."</p>";
                            unset($_SESSION['userError']);
                        }
                    ?>
                    <input id="username" type="text" value="<?php echo isset($_SESSION['temp_user']) ? $_SESSION['temp_user'] : '' ?>" name="username" class="containerinput" required>
                </div>
                <div id="emailContainer" class="container">
                    <label for="email" class="containerLabel">E-mail cím</label>
                    <?php 
                        if(isset($_SESSION['emailError'])){
                            echo "<p>".$_SESSION['emailError']."</p>";
                            unset($_SESSION['emailError']);
                        }
                    ?>
                    <input id="email" type="email" value="<?php echo isset($_SESSION['temp_email']) ? $_SESSION['temp_email'] : '' ?>" name="email" class="containerinput" required>
                </div>
                <div id="passwordContainer" class="container">
                    <label for="password" class="containerLabel">Jelszó</label>
                    <?php 
                        if(isset($_SESSION['pwderror'])){
                            echo "<p>".$_SESSION['pwderror']."</p>";
                            unset($_SESSION['pwderror']);
                        }
                    ?>
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