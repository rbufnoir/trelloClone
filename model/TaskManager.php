<?php

require_once 'Manager.php';
require_once 'Task.php';

class TaskManager extends Manager {
    private $tasks;

    public function getTasks() {
        return $this->tasks;
    }

    public function addTasks($task) {
        $this->tasks[] = $task;
    }

    public function loadTasks($listId) {
        $this->tasks = null;
        $myTasks = $this->returnQuery("SELECT * FROM task WHERE list_id=$listId;");

        foreach($myTasks as $task) {
            $t = new Task($task['task_id'], $task['name'], $listId, $task['user_id'], $task['board_id'], $task['position'], $task['priority']);
            $this->addTasks($t);
        }
    }

    public function deleteTask(Task $task) {
        $req = "DELETE FROM task WHERE task_id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function deleteTaskById($task_id) {
        $req = "DELETE FROM task WHERE task_id=:id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $task_id, PDO::PARAM_INT);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function updateTask($task_id, $task_name) {
        $req = "UPDATE task SET name=:name WHERE task_id=:id;";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $task_id, PDO::PARAM_INT);
        $statement->bindValue(':name', $task_name, PDO::PARAM_STR);
        
        $statement->execute();
        $statement->closeCursor();
    }

    public function insertTask($user_id, $board_id, $list_id, $taskName) {
        $req = "INSERT INTO task (name, list_id, user_id, board_id) VALUES (:name, :list_id, :user_id, :board_id);";
        
        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':name', $taskName, PDO::PARAM_STR);
        $statement->bindValue(':list_id', $list_id, PDO::PARAM_INT);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindValue(':board_id', $board_id, PDO::PARAM_INT);

        $result = $statement->execute();

        $statement->closeCursor();
    }

    public function getLastInsertedId() {
        $req = ($this->returnQuery("SELECT LAST_INSERT_ID();"));
        return ($req[0]['LAST_INSERT_ID()']);
    }
}