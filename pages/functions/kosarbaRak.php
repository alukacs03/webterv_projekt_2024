<?php 

$productId = $_POST['productId'];


if (isset($_POST['kosarbaRak']) && isset($_POST['amountInput']) && trim($_POST['amountInput']) != "" && trim($_POST['amountInput']) != 0){
    $amount = $_POST['amountInput'];
    $products = json_decode(file_get_contents("../data/products.json"), true);

    $kosar = unserialize($_COOKIE['cart']);
    if(!isset($_POST['cartPage'])){
        foreach($kosar as &$elem){
            if($elem['id'] === $productId){
                $elem["am"] = $elem["am"] + $amount;
                setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
                if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
                    header("Location: ../kosar.php");
                } else {
                    header("Location: ../termek.php#form_{$productId}");
                }        
                exit();
            }
        }
    } else {
        foreach($kosar as &$elem){
            if($elem['id'] === $productId){
                $elem["am"] = $amount;
                setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
                if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
                    header("Location: ../kosar.php");
                } else {
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
}

if(isset($_POST['cartPage']) && $_POST['cartPage'] == "yes"){
    header("Location: ../kosar.php");
} else {
    header("Location: ../termek.php#form_{$productId}");
}
exit();