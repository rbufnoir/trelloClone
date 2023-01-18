<?php

require_once 'Manager.php';
require_once 'List.php';

class ListManager extends Manager {
    private $lists;

    public function getLists() {
        return $this->lists;
    }

    public function addList($checklist) {
        $this->lists[] = $checklist;
    }

    public function loadLists($boardId) {
        $myLists = $this->returnQuery("SELECT * FROM list WHERE board_id=$boardId ORDER BY position;");

        foreach($myLists as $list) {
            $l = new CheckList($list['list_id'], $list['name'], $list['user_id'], $boardId, $list['priority'], $list['position']);
            $this->addList($l);
        }
    }

    public function deleteList(CheckList $list) {
        $req = "DELETE FROM list WHERE list_id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $list->getId(), PDO::PARAM_INT);
        
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result)
            unset($list);
    }

    public function deleteListById($list_id) {
        $req = "DELETE FROM list WHERE list_id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $list_id, PDO::PARAM_INT);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function updateList($list_id, $list_name) {
        $req = "UPDATE list SET name=:name WHERE list_id=:id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $list_id, PDO::PARAM_INT);
        $statement->bindValue(':name', $list_name, PDO::PARAM_STR);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function insertList($user_id, $board_id, $listName) {
        $req = "INSERT INTO list (name, user_id, board_id) VALUES (:name, :user_id, :board_id);";
        
        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':name', $listName, PDO::PARAM_STR);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindValue(':board_id', $board_id, PDO::PARAM_INT);

        $result = $statement->execute();

        $statement->closeCursor();
    }

    public function updatePosition($list_id, $position) {
        $req = "UPDATE list SET position=:pos WHERE list_id=:list_id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':pos', $position, PDO::PARAM_INT);
        $statement->bindValue(':list_id', $list_id, PDO::PARAM_INT);

        $statement->execute();
        $statement->closeCursor();
    }
}