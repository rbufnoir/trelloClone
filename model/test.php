<?php

require_once 'UserManager.php';
require_once 'BoardManager.php';
require_once 'ListManager.php';
require_once 'TaskManager.php';

$userManager = new UserManager();
$userManager->loadUserByUsername("rbufnoir");
$username = $userManager->getUser();
var_dump($username);

$boardManager = new BoardManager();
$boardManager->loadBoards($username->getId());
$boards = $boardManager->getBoards();
var_dump($boards);

$listManager = new ListManager();
foreach($boards as $board) {
    $listManager->loadLists($board->getId());
    $list = $listManager->getLists();
    var_dump($list);

    foreach ($list as $l) {
        $taskManager = new TaskManager();
        $taskManager->loadTasks($l->getId());
        $tasks = $taskManager->getTasks();
        var_dump($tasks);
    }
}