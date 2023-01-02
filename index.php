<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

if (empty($_GET['page']))
    require_once 'view/board.html.php';
else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    var_dump($_GET['page']);
    switch ($url) {
        case $url[0] == 'profile':
            require_once 'view/user.profile.html.php';
            break;
        case $url[0] == 'register':
            require_once 'view/register.html.php';
            break;
        case $url[0] == 'login':
            require_once 'view/login.html.php';
            break;
        default:
        require_once 'view/error.404.html.php';
        break;
    }
}