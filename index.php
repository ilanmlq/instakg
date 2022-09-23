<?php

session_start();

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once 'views/header.php';

if (empty($url)) {
    $url = 'accueil';
}

switch ($url) {
    case 'accueil':
        include('views/home.php');
        break;
    case 'msg':
        include('views/msg.php');
        break;
    case 'upload':
        include('views/upload.php');
        break;
    case 'profile':
        include('views/profile.php');
        break;
}

require_once 'views/footer.php';
