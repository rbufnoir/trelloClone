<?php

require_once 'Manager.php';
require_once 'Board.php';

class BoardManager extends Manager {
    private $boards;

    public function getBoards() {
        return $this->boards;
    }

    public function addBoard($board) {
        $this->boards[] = $board;
    }

    public function loadBoards($userId) {
        $myBoards = $this->returnQuery("SELECT * FROM board WHERE user_id=$userId;");

        foreach($myBoards as $board) {
            $b = new Board($board['board_id'], $board['name'], $userId);
            $this->addBoard($b);
        }
    }
}