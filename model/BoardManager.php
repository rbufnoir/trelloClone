<?php

require_once 'Manager.php';
require_once 'Board.php';

class BoardManager extends Manager
{
    private $boards;

    public function getBoards()
    {
        return $this->boards;
    }

    public function addBoard($board)
    {
        $this->boards[] = $board;
    }

    public function getBoardById($board_id) {
        $req = "SELECT * FROM board WHERE board_id= :id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $board_id, PDO::PARAM_INT);
        $statement->execute();

        $board = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return new Board($board[0]['board_id'], $board[0]['name'], $board[0]['user_id']);
    }

    public function loadBoards(User $user) {
        $this->boards = null;
        $req = "SELECT * FROM board WHERE user_id= :id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $statement->execute();

        $myBoards = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        foreach ($myBoards as $board) {
            $b = new Board($board['board_id'], $board['name'], $user->getId());
            $this->addBoard($b);
        }
    }

    public function editBoard($board_id, $name) {
        $req = "UPDATE board SET name=:name WHERE board_id=:id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $board_id, PDO::PARAM_INT);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function deleteBoard($board_id)
    {
        $req = "DELETE FROM board WHERE board_id=:id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $board_id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    }

    public function deleteBoardById($board_id)
    {
        $req = "DELETE FROM board WHERE board_id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $board_id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    }

    public function insertBoard($user_id, $boardName)
    {
        $req = "INSERT INTO board (name, user_id) VALUES (:name, :user_id);";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindValue(':name', $boardName, PDO::PARAM_STR);

        $statement->execute();
        $statement->closeCursor();
    }
}
