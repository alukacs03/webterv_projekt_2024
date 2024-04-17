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
                        echo "<div class='productCard'>";
                        echo "<img src='{$product['image']}' alt='{$product['imagealt']}' class='productImage'>";
                        echo "<div class='productBottomDiv'><div class='productTextWrapper'><p class='productName''>{$product['title']}</p><p class='productPrice'>{$product['price']} Ft / {$product['measure']}</p></div>";
                        echo "<div class='productPurchaseBar'><input class='amountInput' type='number'><label style='font-size: 1.5rem'>{$product['measure']}</label><a href='javascript:void(0)'><div class='productCartButton'><img class='cartIcon' src='../pictures/resources/shopping-cart.png' alt='kosár'><h3 class='productCartTitle'>Kosárba</h3></div></a></div>";
                        echo "</div></div></div>";
                        echo "<div id='felsoJobb'><div class='jobb'>";
                        echo "<div class='paragraphWrapper'><p class='productParagraph' style='font-size: 1.5rem'>{$product['description']}</p></div>";
                        echo "</div><div class='jobb'>";
                        echo "
                        <div id='formWrapper'>
                        <form id='contactForm' action='index.php' method='POST'>
                            <div id='contactTopContainer'>
                                <div id='contactNameContainer' class='contactContainer'>
                                    <label for='contactNameInput' class='contactLabel'>Név:</label>
                                    <input type='text' name='contactNameInput' id='contactNameInput' class='contactInputField' placeholder='Név...' required>
                                </div>
                                <div id='contactSubjectContainer' class='contactContainer'>
                                    <label for='contactSubjectInput' class='contactLabel'>Tárgy:</label>
                                    <input type='text' name='contactSubjectInput' id='contactSubjectInput' class='contactInputField' placeholder='Tárgy...' required>
                                </div>
                                <div id='contactEmailContainer' class='contactContainer'>
                                    <label for='contactEmailInput' class='contactLabel'>E-mail:</label>
                                    <input type='email' name='contactEmailInput' id='contactEmailInput' class='contactInputField' placeholder='E-mail...' required>
                                </div>
                            </div>  
                            <div id='contactMessageContainer'>
                                <label for='contactMessageInput' class='contactLabel' id='contactMessageLabel'>Üzenet:</label>
                                <textarea name='contactMessageInput' id='contactMessageInput' cols='30' rows='10' required></textarea>
                            </div>
                            <button id='contactSubmitButton' name='supportSubmit' type='submit'>Üzenet elküldése</button>
                        </form>
                        </div>
                        ";
                        echo "</div></div></div>";
                        echo "<div id='termekAlso'>";
                        $reviews = $product['reviews'];
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