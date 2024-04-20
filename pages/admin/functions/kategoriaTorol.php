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
    echo $id;
    $categories = json_decode(file_get_contents("../../../data/products.json"), true);
    foreach($categories as &$category){
        if($category['id'] == $id){
            unset($categories[array_search($category, $categories)]);
            unlink("../../../pictures/categories/".$category['image']);
        }
    }
    file_put_contents("../../../data/products.json", json_encode($categories, JSON_PRETTY_PRINT));
    header("Location: ../kategoriaLista.php");
?>