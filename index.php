<?php
session_start();
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once 'controller/UserController.php';
require_once 'controller/BoardController.php';

$userController = new UserController();
$boardController = new BoardController();
$boards = (isset($_SESSION['email'])) ? $boardController->loadBoards($userController->loadUserByEmail($_SESSION['email'])) : null;

if (isset($_GET['type'])) {

    switch ($_GET['type']) {
        case 'addList':
            $boardController->addList($_SESSION['user_id'], $_GET['board'], $_GET['data']);
            echo $boardController->getLastInsertedId();
            break;
        case 'addCard':
            $boardController->addTask($_SESSION['user_id'], $_GET['board'], $_GET['list'], $_GET['data']);
            echo $boardController->getLastInsertedId();
            break;
        case 'task':
            if ($_GET['data'] === "delete")
                $boardController->deleteTask($_GET['task']);
            else
                $boardController->updateTask($_GET['task'], $_GET['data']);
            break;
        case 'updateList':
            if ($_GET['data'] === "delete")
                $boardController->deleteList($_GET['list']);
            else
                $boardController->updateList($_GET['list'], $_GET['data']);
    }

    return;
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
        case $url[0] == 'createBoard':
            require_once 'view/createBoard.html.php';
            break;
        case $url[0] == 'addBoard':
            $boardController->createBoard();
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
