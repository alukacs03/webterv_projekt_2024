<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Termékek</title>
    <meta name="author" content="Lukács Ákos, Sándor Barnabás">
    <meta name="keywords" content="fa, fa szállítás, faszállítás, tüzép, szeged, gyors, tüzifa">
    <meta name="description" content="Rönklovagok Kft. gyors faszállítás olcsón">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../pictures/profilepics/page_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/global_style.css">
    <link rel="stylesheet" href="../styles/termek_style.css">
    <link rel="stylesheet" href="../styles/termekleiras_style.css">
    <link rel="stylesheet" href="../styles/index_style.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <?php
        include_once("../templates/header.php");
    ?>

    <?php
        $categories = json_decode(file_get_contents("../data/products.json"), true);
        $id = $_GET['id'];
        foreach ($categories as $category){
            $cid = substr($_GET['id'], 0, strpos($_GET['id'], "."));
            if($cid == $category['id']){
                $products = $category['products'];
                foreach ($products as $product){
                    if($id == $product['id']){
                        echo "<div id='termekFelso'><div id='felsoBal'>";

                        $ar = number_format($product['price'], 0, ',', '.');
                        echo "<form id='form_{$product['id']}' method='POST' action='functions/kosarbaRak.php'><div class='productCard'>";
                        echo "<input type='hidden' name='productId' value='{$product['id']}'>";
                        echo "<input type='hidden' name='productPage' value='yes'>";
                        echo "<img src='{$product['image']}' alt='{$product['imagealt']}' class='productImage'>";
                        echo "<div class='productBottomDiv'><div class='productTextWrapper'><p class='productName'>{$product['title']}</p><p class='productPrice'>{$ar} Ft / {$product['measure']}</p></div>";
                        echo "<div class='productPurchaseBar'><input value='1' max='500' class='amountInput' min='1' type='number' name='amountInput'><label>{$product['measure']}</label><button class='productCartButton' name='kosarbaRak' style='border:none; color: white'><img class='cartIcon' src='../pictures/resources/shopping-cart.png' alt='kosár'><h3 class='productCartTitle'>Kosárba</h3></button></div>";
                        if (isset($_SESSION['addedToCart'])){
                            echo "<p class='addedToCartMessage'>{$_SESSION['addedToCart']}</p>";
                            unset($_SESSION['addedToCart']);
                        }
                        echo "</div></div></form>";
                        
                        $reviewMessage = isset($_SESSION['reviewMessage']) ? $_SESSION['reviewMessage'] : "";

                        echo "</div>";
                        echo "<div id='felsoJobb'><div class='jobb'>";
                        echo "<div class='paragraphWrapper'><p class='productParagraph' style='font-size: 1.5rem'>{$product['description']}</p></div>";
                        echo "</div><div class='jobb'>";
                        echo '
                        <div id="formWrapper">
                        <form id="contactForm" action="functions/ertekelesIr.php" method="POST">
                            <h2>Értékelés</h2>
                            <input name="productId" type="hidden" value="'.$id.'"></input>
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
                                <textarea name="contactMessageInput" id="contactMessageInput" cols="30" rows="10" required>' . $reviewMessage . '</textarea>
                            </div>
                        ';
                        if(isset($_SESSION['reviewLoginError'])){
                            echo "<p class='reviewLoginError'>{$_SESSION['reviewLoginError']}</p>";
                            unset($_SESSION['reviewLoginError']);
                        }
                        echo '
                            <button id="contactSubmitButton" name="contactSubmitButton" onClick=\'javascript:return confirm("Biztosan elküldöd az értékelést?");\' type="submit">Értékelés elküldése</button>
                        </form>
                        </div>
                        ';
                        echo "</div></div></div>";
                        echo "<div id='termekAlso'>";
                        $reviews = $product['reviews'];
                        $reviews = array_reverse($reviews);
                        foreach ($reviews as $review) {
                            echo "<div class='reviewCard'>";
                            echo "<div class='reviewLeft'>";
                            echo "<div class='reviewDetails'>";
                            echo "<h2 class='reviewName'>{$review['username']}</h2>";
                            echo "<div class='reviewPepe'>";
                            echo "<p class='reviewDate'>{$review['date']}</p>";
                            echo "<div class='reviewStars'>";
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $review['stars']) {
                                    echo "<img src='../pictures/resources/star.png' alt='Csillagok' class='starFull star'>";
                                } else {
                                    echo "<img src='../pictures/resources/star.png' alt='Csillagok' class='starEmpty star'>";
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
                        echo "</div>";
                        break;                
                    }
                }
                break;
            }
        }
    ?>

    <?php
        include_once("../templates/footer.html");
    ?>
</body>