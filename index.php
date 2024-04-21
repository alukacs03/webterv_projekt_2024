<?php
session_start();

if(!isset($_COOKIE['cart'])){
    setcookie("cart", serialize([]), time() + (60*60*24*30), "/");
}

if (isset($_POST['supportSubmit'])) {
        $name = $_POST['contactNameInput'];
        $email = $_POST['contactEmailInput'];
        $message = $_POST['contactMessageInput'];
        $subject = $_POST['contactSubjectInput'];
        $jsonObject = [
            "name" => $name,
            "email" => $email,
            "message" => $message,
            "subject" => $subject,
            "date" => date("Y-m-d H:i"),
            "ip" => $_SERVER['REMOTE_ADDR'] // the secret ingredient is crime (es meg csak a sutiket sem kellett elfogadni)
        ];
        $filePath = "./data/support.json";
        if (!is_writable($filePath)) {
            echo "<script>alert('A fajl nem irhato. Kedves gyakorlatvezeto kerlek ird at a file jogait, hogy szegeny apache webszerver is dolgozhasson vele :(')</script>";
        } else {
            $jsonArray = json_decode(file_get_contents($filePath), true);
            array_push($jsonArray, $jsonObject);
            file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Rönklovagok Kft.</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/index_style.css">
    <link rel="stylesheet" href="./styles/global_style.css">
    <script src="./js/script.js" defer></script>
</head>
<body>
<header id="pageHeader">
    <nav class="menuBar">
        <a href="index.php" class="menuBranding">Rönklovagok Kft.</a>
        <ul class="menu">
            <li class="menuItem">
                <a href="./pages/rolunk.php" class="menuLink">Rólunk</a>
            </li>
            <li class="menuItem">
                <a href="./pages/termek.php" class="menuLink">Termékek</a>
            </li>
            <li class="menuItem">
                <a href="./pages/faszett.php" class="menuLink">Faszettek</a>
            </li>
            <li class="menuItem">
                <a href="./pages/kosar.php" class="menuLink">Kosár</a>
            </li>
            
            <?php
                if(!isset($_SESSION["username"])){
                    echo '
                    <li class="menuItem">
                    <a href="./pages/bejelentkezes.php" class="menuLink">Bejelentkezés</a>
                </li>
                <li class="menuItem">
                    <a href="./pages/regisztracio.php" class="menuLink">Regisztráció</a>
                </li>
                    ';
                } else {
                    echo '
                        <li class="menuItem">
                        <a href="./pages/kijelentkezes.php" class="menuLink">Kijelentkezés</a>
                        </li>
                    ';
                    echo '
                    <li class="menuItem">
                    <a href="./pages/profil.php" class="menuLink">Profil</a>
                    </li>
                ';
                
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1){
                        echo '
                            <li class="menuItem">
                                <a href="./pages/admin/admin.php" class="menuLink">Admin</a>
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

    <main id="indexMain">
        <h1 class="indexTitle" id="elso">Kiemelt ajánlataink</h1>
        <div id="offerWrapper">
            <?php
                $categories = json_decode(file_get_contents("./data/products.json"), true);
                $products = [];
                foreach ($categories as $category) {
                    $products = array_merge($products, $category['products']);
                }
                shuffle($products);
                $offers = array_slice($products, 0, 5);
                foreach ($offers as $offer) {
                    echo "<div class='offerCard'>";
                    echo "<a href='./pages/termekleiras.php?id={$offer['id']}'><img src='{$offer['image']}' alt='{$offer['imagealt']}' class='offerImage'></a>";
                    echo "<div class='offerText'>";
                    echo "<p class='offerTitle'>{$offer['title']}</p>";
                    echo "<p class='offerPrice'>{$offer['price']} Ft / {$offer['measure']}</p>";
                    echo "</div>";
                    echo "<a href='./pages/termekleiras.php?id={$offer['id']}' class='cardButton'>";
                    echo "<div>";
                    echo "<p class='cardButtonText'>Tovább</p>";
                    echo "</div></a></div>";
                }
            ?>
        </div>
        <h1 id="reviewTitle" class="indexTitle">Vásárlóink mondták</h1>
        <div id="reviewWrapper">
            <?php
                $reviewsAll = json_decode(file_get_contents("./data/reviews.json"), true);
                $reviewsCut = array_slice($reviewsAll, -5);
                foreach ($reviewsCut as $review) {
                    echo "<div class='reviewCard'>";
                    echo "<div class='reviewLeft'>";
                    echo "<div class='reviewDetails'>";
                    echo "<h2 class='reviewName'>{$review['name']}</h2>";
                    echo "<div class='reviewPepe'>";
                    echo "<p class='reviewDate'>{$review['date']}</p>";
                    echo "<div class='reviewStars'>";
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $review['stars']) {
                            echo "<img src='./pictures/resources/star.png' alt='Csillagok' class='starFull star'>";
                        } else {
                            echo "<img src='./pictures/resources/star.png' alt='Csillagok' class='starEmpty star'>";
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='reviewRight'>";
                    echo "<p class='reviewText'>{$review['message']}</p>";
                    echo "</div>";
                    echo "</div>";
                }
                if(isset($_SESSION['username'])){
                    $indexReviewMessage = isset($_SESSION['indexReviewMessage']) ? $_SESSION['indexReviewMessage'] : '';
                    echo '
                    <div id="formWrapper">
                            <form id="contactForm" action="pages/functions/ertekelesIr.php" method="POST">
                                <h2>Értékelés</h2>
                                <input name="indexIdentifier" type="hidden" value="yes"></input>
                                <div class="starDiv">
                                    <input name="star" class="radioStar" id="s5" value="5" type="radio">
                                    <label for="s5">★</label>
                                    <input name="star" class="radioStar" id="s4" value="4" type="radio">
                                    <label for="s4">★</label>
                                    <input name="star" class="radioStar" id="s3" value="3" type="radio">
                                    <label for="s3">★</label>
                                    <input name="star" class="radioStar" id="s2" value="2" type="radio">
                                    <label for="s2">★</label>
                                    <input name="star" class="radioStar" id="s1" value="1" type="radio">
                                    <label for="s1">★</label>
                                </div>  
                                <div id="contactMessageContainer">
                                    <label for="contactMessageInput" class="contactLabel" id="contactMessageLabel">Üzenet:</label>
                                    <textarea name="contactMessageInput" id="contactMessageInput" cols="30" rows="10" required>' . $indexReviewMessage . '</textarea>
                                </div>
                            ';
                            if(isset($_SESSION['reviewLoginError'])){
                                echo "<p class='reviewError'>".$_SESSION['reviewLoginError']."</p>";
                                unset($_SESSION['reviewLoginError']);
                            }
                            echo '
                                <button id="contactSubmitButton" name="contactSubmitButton" onClick=\'javascript:return confirm("Biztosan elküldöd az értékelést?");\' type="submit">Értékelés elküldése</button>
                            </form>
                            </div>
                            ';
                            echo "</div></div></div>";
                }

            ?>

        </div>
        <h1 class="indexTitle">Kik vagyunk mi?</h1>
        <div id="aboutUsWrapper">
            <div id="aboutUsCard">
                <div id="aboutUsLeft">
                    <img src="./pictures/profilepics/ronklovagok.jpeg" id="aboutUsPicture" alt="mi, a Rönklovagok">
                </div>
                <div id="aboutUsRight">
                    <div id="aboutUsTextDiv">
                        <p>A Rönklovagok Kft., elkötelezett és szenvedélyes faszállítók csapata. Az erdőgazdálkodás iránti mély elkötelezettség vezérel minket, és az évek során kiemelkedő szakértelmet szereztünk a faszállítás művészetében.</p>
                        <p>Mi, a Rönklovagok, büszkén viseljük ezt a címet, és szenvedéllyel végzünk minden feladatot. A fa, amit szállítunk, nem csupán anyag, hanem egy történet része, amelyet tisztelettel és gondoskodással kezelünk. Mint faszállítók, közösségünk minden tagja részt vesz a természet megóvásában és a minőségi szolgáltatások nyújtásában. A Rönklovagok nem csupán vállalkozás, hanem egy összetartó csapat, amely elkötelezetten szolgálja a fenntartható faipart és a környezetvédelmi célokat...</p>
                    </div>
                    <a href="./pages/rolunk.php" id="aboutButton">
                        <div>
                            <p id="aboutButtonText">Szeretnék többet megtudni a Rönklovagokról</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <a href="#" id="upArrow" class="">
        <div>
            <p>↑</p>
        </div>
    </a>
    <?php
        include_once("./templates/footer.html");
    ?>
</body>
</html>