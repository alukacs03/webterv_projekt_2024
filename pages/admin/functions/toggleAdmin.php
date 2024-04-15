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
        $users = json_decode(file_get_contents("../../../data/users.json"), true);
        foreach($users as &$user){
            if($user['username'] == $username){
                if($user['admin'] == 0){
                    $user['admin'] = 1;
                } else {
                    // ha esetleg sajat jogunkat vennenk el, ne tegyuk azt
                    if($user['username'] == $_SESSION['username']){
                        header("Location: ../felhasznalok.php");
                        $_SESSION['alertMessage'] = "Nem veheted el a saját jogodat.";
                        exit();
                    }
                    $user['admin'] = 0;
                }
            }
        }
        file_put_contents("../../../data/users.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header("Location: ../felhasznalok.php");
        exit();
        }
?>