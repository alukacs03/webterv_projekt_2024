<?php 

session_start();
$productId = $_POST['productId'];

if(!isset($_COOKIE['cart'])){
    setcookie("cart", serialize([]), time() + (60*60*24*30), "/");
}

if(isset($_GET['faszett'])){
    $mennyisegek = unserialize($_SESSION['faszettProducts']);
    $categories = json_decode(file_get_contents("../../data/products.json"), true);
    $kosar = unserialize($_COOKIE['cart']);
    foreach ($categories as $category) {
        $products = $category['products'];
        foreach ($products as $product){
            if(in_array($product['id'],array_keys($mennyisegek), true)){
                // ha mar benne van
                $sajt = false;
                foreach($kosar as &$elem){
                    if($elem['id'] === $product['id']){
                        $elem["am"] = $elem["am"] + $mennyisegek[$product['id']];
                        $sajt = true;
                        break;
                    }
                }
                if($sajt){
                    continue;
                }
                // ha meg nincs benne
                $newAddition = [
                    "id" => $product['id'],
                    "am" => (int)$mennyisegek[$product['id']]
                ];
                array_push($kosar, $newAddition);
            }
        }
    }
    setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
    unset($_SESSION['faszettProducts']);
    header("Location: ../kosar.php");
    exit();
}


if (isset($_POST['kosarbaRak']) && isset($_POST['amountInput']) && trim($_POST['amountInput']) != "" && trim($_POST['amountInput']) != 0){
    $amount = $_POST['amountInput'];
    $products = json_decode(file_get_contents("../data/products.json"), true);

    $kosar = unserialize($_COOKIE['cart']);
    if(isset($_POST['cartPage'])){
        foreach($kosar as &$elem){
            if($elem['id'] === $productId){
                $elem["am"] = $amount;
                setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
                $_SESSION['addedToCart'] = "A termék hozzáadva a kosárhoz!";

                if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
                    header("Location: ../kosar.php");
                } else {
                    header("Location: ../termek.php#form_{$productId}");
                }        
                exit();
            }
        }
    } else if (isset($_POST['faszettPage'])) {
        foreach($kosar as &$elem){
            if($elem['id'] === $productId){
                $elem["am"] = $elem["am"] + $amount;
                setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
                $_SESSION['addedToCart'] = "A termék hozzáadva a kosárhoz!";

                header("Location: ../faszettDetails.php?kategoria={$_POST['kategoria']}&szelesseg={$_POST['szelesseg']}&hossz={$_POST['hossz']}&magassag={$_POST['magassag']}#product{$productId}");   
                exit();
            }
        }
    } else {
        foreach($kosar as &$elem){
            if($elem['id'] === $productId){
                $elem["am"] = $elem["am"] + $amount;
                setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
                $_SESSION['addedToCart'] = "A termék hozzáadva a kosárhoz!";

                if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
                    header("Location: ../kosar.php");
                } else if(isset($_POST['productPage']) && $_POST['productPage'] == "yes"){
                    header("Location: ../termekleiras.php?id={$productId}");
                }else {
                    header("Location: ../termek.php#form_{$productId}");
                }        
                exit();
            }
        }
    }

    $newAddition = [
        "id" => $productId,
        "am" => $amount
    ];
    array_push($kosar, $newAddition);
    setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
    $_SESSION['addedToCart'] = "A termék hozzáadva a kosárhoz!";

}

if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
    header("Location: ../kosar.php");
} else if(isset($_POST['productPage']) && $_POST['productPage'] == "yes"){
    header("Location: ../termekleiras.php?id={$productId}");
} else if ((isset($_POST['faszettPage']) && $_POST['faszettPage'] == "yes")) {
    header("Location: ../faszettDetails.php?kategoria={$_POST['kategoria']}&szelesseg={$_POST['szelesseg']}&hossz={$_POST['hossz']}&magassag={$_POST['magassag']}#product{$productId}");   
} else {
    header("Location: ../termek.php#form_{$productId}");
}   
exit();