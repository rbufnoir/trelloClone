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
        $myLists = $this->returnQuery("SELECT * FROM list WHERE board_id=$boardId;");

        foreach($myLists as $list) {
            $l = new CheckList($list['list_id'], $list['name'], $list['user_id'], $boardId, $list['priority'], $list['position']);
            $this->addList($l);
        }
    }

    public function deleteList(CheckList $list) {
        $req = "DELETE FROM list WHERE id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $list->getId(), PDO::PARAM_INT);
        
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result)
            unset($list);
    }
}