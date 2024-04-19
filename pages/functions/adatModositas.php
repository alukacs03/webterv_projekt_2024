<?php 
    session_start();
    if(isset($_POST['userChangeSubmit'])){
        $name = $_POST['contactNameInput'];
        $email = $_POST['contactEmailInput'];
        $currPass = $_POST['currPass'];
        $newPass = $_POST['newPass'];
        $userName = $_SESSION['username'];

        $users = json_decode(file_get_contents("../../data/users.json"), true);
        
        foreach($users as &$user){
            if($user['username'] == $_SESSION['username']){
                if(password_verify($currPass, $user['password'])){
                    if($name != ""){
                        $user['username'] = $name;
                        $_SESSION['username'] = $name;
                    }
                    if($email != ""){
                        $user['email'] = $email;
                        $_SESSION['email'] = $email;
                    }
                    if($newPass != ""){
                        $user['password'] = password_hash($newPass, PASSWORD_DEFAULT);
                    }
                    file_put_contents("../../data/users.json", json_encode($users, JSON_PRETTY_PRINT));
                    header("Location: ../profil.php");
                }else{
                    $_SESSION['emptyFields'] = "<p class='error'>Hibás jelszó!</p>";
                    header("Location: ../profil.php");
                }
            }
        }

    }

?>