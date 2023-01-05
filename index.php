<?php
session_start();
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once 'controller/UserController.php';
require_once 'controller/BoardController.php';

$userController = new UserController();
$boardController = new BoardController();
$boards = (isset($_SESSION['email'])) ? $boardController->loadBoards($userController->loadUserByEmail($_SESSION['email'])): null;

if(isset($_GET['user']) && isset($_GET['board']) && isset($_GET['list']) && isset($_GET['task'])) {
    $boardController->addTask($_GET['user'], $_GET['board'], $_GET['list'], $_GET['task']);
    echo ($boardController->getLastInsertedId());
    return ;
}

if (empty($_GET['page']))
    require_once 'view/board.html.php';
else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    switch ($url) {
        case $url[0] == 'profile':
            if (empty($url[1]))
                require_once 'view/user.profile.html.php';
            else if ($url[1] == 'update')
                $userController->updateUserProfile();
            break;
        case $url[0] == 'register':
            require_once 'view/register.html.php';
            break;
        case $url[0] == 'registerValidation':
            $userController->newUserValidation();
            break;
        case $url[0] == 'registerComplete':
            require_once 'view/registerComplete.html.php';
            break;
        case $url[0] == 'login':
            require_once 'view/login.html.php';
            break;
        case $url[0] == 'checkUserLogin':
            $userController->checkUserLogin();
            break;
        case $url[0] == 'board':
            $lists = $boardController->getList($url[1], $url[2]);
            require_once 'view/board.html.php';
            break;
        case $url[0] == 'logout':
            $userController->logoutUser();
            break;
        case $url[0] == 'contact':
            require_once 'view/contact.html.php';
            break;
        case $url[0] == 'faq':
            require_once 'view/faq.html.php';
            break;
        default:
            require_once 'view/error.404.html.php';
            break;
    }
}