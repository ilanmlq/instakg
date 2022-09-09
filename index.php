<?php

session_start();

$url = filter_input(INPUT_GET,'url', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require_once 'views/header.php';

if (empty($url)) {  
    $url = 'home';
}

switch($url){
    case 'home' :
        include('views/home.php');
        break;

}

require_once 'views/footer.php';