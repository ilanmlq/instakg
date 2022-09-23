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
        $mdpHash = filter_input(INPUT_POST, 'mdpHash', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION['errorLogin'] = NULL;

        if(User::login($email, $mdpHash) != 0){
            $_SESSION['errorLogin'] = "<span class='error'>Les informations de connexion de sont pas bonnes</span>";
        }

        if(User::login($email, $mdpHash) == 0){
            header("Location: index.php?url=accueil");
            exit;
        }

        include './views/auth/login.php';
        break;
    

    case 'validRegister':
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdpHash = filter_input(INPUT_POST, 'mdpHash', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdpHashRepeat = filter_input(INPUT_POST, 'mdpHashRepeat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pp = filter_input(INPUT_POST, 'pp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $_SESSION["errorRegister"] = NULL;
        $formValid = false;

        if(empty($email)){
            $_SESSION['errorRegister'] = "<li><span class='error'>L'Email ne doit pas être vide</span></li>";
        }
        if(strlen($pseudo) <= 3){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Le nom d'utilisateur doit faire plus de 3 caractères</span></li>";
        }
        if(strlen($mdpHash) <= 4){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Le mot de passe doit faire plus de 4 caractères</span></li>";
        }
        if($mdpHash != $mdpHashRepeat){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Les deux mot de passe ne sont pas identiques</span></li>";
        }
        if(empty($pp)){
            $_SESSION['errorRegister'] .= "<li><span class='error'>Vous devez choisir une photo de profil</span></li>";
        }

        if($_SESSION["errorRegister"] == NULL){
            $formValid = true;
        }

        if($formValid){
            User::register($pseudo, $email, $pwd, $pp);
        }
        
        include './views/auth/register.php';
        break;
}
