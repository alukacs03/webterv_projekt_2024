<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../../index.php");
        exit();
    }
    if(isset($_SESSION['username']) && $_SESSION['username'] != $_GET['username']){
        header("Location: ../../index.php");
        exit();
    }

    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $users = json_decode(file_get_contents("../../data/users.json"), true);
        foreach($users as $key => $user){
            if($user['username'] == $username){
                unset($users[$key]);
            }
        }
        file_put_contents("../../data/users.json", json_encode($users, JSON_PRETTY_PRINT));
        unset($_SESSION['username']);
        header("Location: ../../index.php");
        exit();
    }
?>