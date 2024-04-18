<?php 
    if(isset($_POST['contactSubmitButton'])){
        $name = $_POST['contactNameInput'];
        $email = $_POST['contactEmailInput'];
        $currPass = $_POST['currPass'];
        $newPass = $_POST['newPass'];

        if(trim($name) == "" || trim($email) == "" || trim($currPass) == ""){
            $_SESSION['emptyFields'] = "Minden mező kitöltése kötelező!";
            header("Location: ../profil.php");
            exit();
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailError'] = "Hibás e-mail formátum!";
            header("Location: ../profil.php");
            exit();
        }

        $users = json_decode(file_get_contents("../data/users.json"), true);
        foreach($users as &$user){
            if($user['email'] == $email){
                $_SESSION['emailError'] = "Ez az e-mail cím már foglalt!";
                header("Location: ../profil.php");
                exit();
            }
        }

        
    }

?>