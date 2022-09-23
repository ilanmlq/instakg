<?php

session_start();

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if (!isset($_SESSION['isConnected'])) {
    $url = "auth";
}

require_once 'views/header.php';

switch ($url) {
    case 'auth':
        include('controllers/controllerAuth.php');
        break;
    case 'accueil':
        include('controllers/controllerHome.php');
        break;
    case 'msg':
        include('controllers/controllerMsg.php');
        break;
    case 'upload':
        include('controllers/controllerUpload.php');
        break;
    case 'profile':
        include('controllers/controllerProfile.php');
        break;
}

require_once 'views/footer.php';
