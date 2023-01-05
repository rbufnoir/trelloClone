<?php

require_once 'model/BoardManager.php';
require_once 'model/ListManager.php';
require_once 'model/TaskManager.php';

class BoardController {
    private $BoardManager;
    private $ListManager;
    private $TaskManager;

    public function __construct() {
        $this->BoardManager = new BoardManager();
        $this->ListManager = new ListManager();
        $this->TaskManager = new TaskManager();
    }

    public function loadBoards($user) {
        $this->BoardManager->loadBoards($user);
        return $this->BoardManager->getBoards();
    }

    public function getList($userId, $board) {
        if ($userId == $_SESSION['user_id']) {
            $this->ListManager->loadLists($board);
            return $this->ListManager->getLists();
        }
    }

    public function getTasks($list) {
        $this->TaskManager->loadTasks($list->getId());
        return $this->TaskManager->getTasks();
    }
}