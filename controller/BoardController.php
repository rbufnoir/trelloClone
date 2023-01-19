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

    public function countLists($userId, $board) {
        if ($userId == $_SESSION['user_id']) {
            return $this->ListManager->countLists($board);
        }
    }

    public function countTasks($userId, $board) {
        if ($userId == $_SESSION['user_id']) {
            return $this->TaskManager->countTasks($board);
        }
    }
    
    public function createBoard() {
        if ($_POST['board'] != null) {
            $this->BoardManager->insertBoard($_SESSION['user_id'], htmlspecialchars($_POST['board']));
            header('Location:'.URL.'board/1/1');
        }
    }

    public function editBoard($board_id) {
        $board = $this->BoardManager->getBoardById($board_id);
        require_once 'view/edit.board.php';
    }

    public function editBoardValidation() {
        if ($_POST['name'] != null && $_POST['board-id'] != null) {
            $this->BoardManager->editBoard($_POST['board-id'], $_POST['name']);
            header('Location:'.URL.'board/'.$_SESSION['user_id'].'/'.$_POST['board-id']);
        }
    }

    public function deleteBoard($board_id) {
        $this->BoardManager->deleteBoard($board_id);
        header('Location:'.URL);
    }

    public function getTasks($list) {
        $this->TaskManager->loadTasks($list->getId());
        return $this->TaskManager->getTasks();
    }

    public function addTask($userId, $boardId, $listId, $taskName) {
        $this->TaskManager->insertTask($userId, $boardId, $listId, $taskName);
    }

    public function deleteTask($taskId) {
        $this->TaskManager->deleteTaskById($taskId);
    }

    public function updateTask($taskId, $taskName) {
        $this->TaskManager->updateTask($taskId, $taskName);
    }

    public function addList($userId, $boardId, $listName) {
        $this->ListManager->insertList($userId, $boardId, $listName);
    }

    public function deleteList($listId) {
        $this->ListManager->deleteListById($listId);
    }

    public function updateList($listId, $listName) {
        $this->ListManager->updateList($listId, $listName);
    }

    public function getLastInsertedId() {
        $req = $this->TaskManager->getLastInsertedId();
        return $req;
    }

    public function updateTaskPos($taskId, $listId, $pos) {
        $req = $this->TaskManager->updatePosition($taskId, $listId, $pos);
        return $req;
    }

    public function updateListPos($listId, $pos) {
        $req = $this->ListManager->updatePosition($listId, $pos);
        return $req;
    }
}