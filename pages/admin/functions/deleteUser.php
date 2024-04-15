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

    if(isset($_GET['username'])){
        $username = $_GET['username'];
        if($username == $_SESSION['username']){
            header("Location: ../felhasznalok.php");
            $_SESSION['alertMessage'] = "Nem törölheted a saját fiókod!";
            exit();
        }
        $users = json_decode(file_get_contents("../../../data/users.json"), true);
        foreach($users as $key => $user){
            if($user['username'] == $username){
                unset($users[$key]);
            }
        }
        file_put_contents("../../../data/users.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header("Location: ../felhasznalok.php");
        exit();
    }
?>