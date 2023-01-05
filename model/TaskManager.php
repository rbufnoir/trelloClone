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
        $req = "DELETE FROM task WHERE id = :id";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        
        $result = $statement->execute();
        $statement->closeCursor();
        
        if ($result)
            unset($game);
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
}