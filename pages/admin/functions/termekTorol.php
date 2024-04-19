<?php 

session_start();
if(!isset($_SESSION['admin'])){
    header("Location: ../../../index.php");
    exit();
}
if(isset($_SESSION['admin']) && $_SESSION['admin'] == 0){
    header("Location: ../../../index.php");
    exit();
}

    $id = $_GET['id'];
    $categories = json_decode(file_get_contents("../../../data/products.json"), true);
    foreach($categories as &$category){
        $products = &$category["products"];
        foreach ($products as $product){
            if($product['id'] === $id){
                unset($products[array_search($product, $products)]);
                unlink("../../../pictures/products/".$product['image']);
            }
        }
    }
    file_put_contents("../../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT));
    header("Location: ../termekLista.php");
?>