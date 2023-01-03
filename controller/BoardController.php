<?php

require_once 'model/BoardManager.php';

class BoardController {
    private $BoardManager;

    public function __construct() {
        $this->BoardManager = new BoardManager();
    }

    public function loadBoards($user) {
        $this->BoardManager->loadBoards($user);
        return $this->BoardManager->getBoards();
    }
}