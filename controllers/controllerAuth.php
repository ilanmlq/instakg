<?php

require_once './models/database.php';
require_once './models/Images.php';
require_once './models/Auth.php';

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if(empty($action)){
    $action = "login";
}


switch ($action) {

    case 'login':
        include './views/auth/login.php';
        break;


    case 'register':
        include './views/auth/register.php';
        break;
    

    case 'validLogin':
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        include './views/auth/login.php';
        break;
    

    case 'validRegister':
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pwdRepeat = filter_input(INPUT_POST, 'pwdRepeat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION["errorRegister"] = NULL;
        $formValid = false;

        if(empty($email)){
            $_SESSION['errorRegister'] = "<li><span class='error'>L'Email ne doit pas être vide</span></li>";
        }

        if(strlen($pwd) <= 4){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Le mot de passe doit faire plus de 4 caractères</span></li>";
        }

        if($pwd != $pwdRepeat){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Les deux mot de passe ne sont pas identiques</span></li>";
        }

        if($_SESSION["errorRegister"] == NULL){
            $formValid = true;
        }

        if($formValid){
            // Créer un utilisateur
        }
        
        include './views/auth/register.php';
        break;
}
