<?php
session_start();
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
                $offers = json_decode(file_get_contents("./data/offers.json"), true);
                foreach ($offers as $offer) {
                    echo "<div class='offerCard'>";
                    echo "<a href='./pages/termek.html'><img src='{$offer['image']}' alt='{$offer['imagealt']}' class='offerImage'></a>";
                    echo "<div class='offerText'>";
                    echo "<p class='offerTitle'>{$offer['title']}</p>";
                    echo "<p class='offerPrice'>{$offer['price']} Ft / {$offer['measure']}</p>";
                    echo "</div>";
                    echo "<a href='./pages/termek.php' class='cardButton'>";
                    echo "<div>";
                    echo "<p class='cardButtonText'>Tovább</p>";
                    echo "</div></a></div>";
                }
            ?>
        </div>
        <h1 class="indexTitle">Vásárlóink mondták</h1>
        <div id="reviewWrapper">
            <?php
                $reviewsAll = json_decode(file_get_contents("./data/reviews.json"), true);
                $reviewsCut = array_slice($reviewsAll, -5);
                foreach ($reviewsCut as $review) {
                    echo "<div class='reviewCard'>";
                    echo "<div class='reviewLeft'>";
                    echo "<img src='{$review['profilePic']}' alt='{$review['name']}' class='reviewProfilePic'>";
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
                    $messageArray = $review["message"];
                    foreach ($messageArray as $message) {
                        echo "<p class='reviewText'>{$message}</p>";
                    }
                    echo "</div>";
                    echo "</div>";
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
                    <a href="./pages/rolunk.html" id="aboutButton">
                        <div>
                            <p id="aboutButtonText">Szeretnék többet megtudni a Rönklovagokról</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div id="indexFormTitleWrapper" class="indexTitle">
            <h1>Kérdésed van?</h1>
            <h2 class="indexSubTitle">Írd meg nekünk...</h2>
        </div>
        <div id="formWrapper">
            <form id="contactForm" action="index.php" method="POST">
                <div id="contactTopContainer">
                    <div id="contactNameContainer" class="contactContainer">
                        <label for="contactNameInput" class="contactLabel">Név:</label>
                        <input type="text" name="contactNameInput" id="contactNameInput" class="contactInputField" placeholder="Név..." value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" <?php echo isset($_SESSION['username']) ? "readonly" : "" ?> required>
                    </div>
                    <div id="contactSubjectContainer" class="contactContainer">
                        <label for="contactSubjectInput" class="contactLabel">Tárgy:</label>
                        <input type="text" name="contactSubjectInput" id="contactSubjectInput" class="contactInputField" placeholder="Tárgy..." required>
                    </div>
                    <div id="contactEmailContainer" class="contactContainer">
                        <label for="contactEmailInput" class="contactLabel">E-mail:</label>
                        <input type="email" name="contactEmailInput" id="contactEmailInput" class="contactInputField" placeholder="E-mail..." value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" <?php echo isset($_SESSION['email']) ? "readonly" : "" ?> required>
                    </div>
                </div>
                <div id="contactMessageContainer">
                    <label for="contactMessageInput" class="contactLabel" id="contactMessageLabel">Üzenet:</label>
                    <textarea name="contactMessageInput" id="contactMessageInput" cols="30" rows="10" required></textarea>
                </div>
                <button id="contactSubmitButton" name="supportSubmit" type="submit">Üzenet elküldése</button>
            </form>
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