<?php 
    $id=$_GET['id'];
    $i = 0;

    if(isset($_COOKIE['cart'])){
        $kosar=unserialize($_COOKIE['cart']);
        echo var_dump($kosar);
        echo "<br>";

        foreach($kosar as $elem){

            if($elem['id'] === $id){
                echo $i;
                array_splice($kosar, $i, 1);
            }
            $i++;
        }
        setcookie("cart", serialize($kosar), time() + (60*60*24*30), "/");
    }
header("Location: ../kosar.php");