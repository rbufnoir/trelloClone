<?php

class CheckList {
    private int $id;
    private string $name;
    private int $userId;
    private int $boardId;
    private string $priority;
    private int $position;

    public function __construct($id, $name, $userId, $boardId, $priority, $position) {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
        $this->boardId = $boardId;
        $this->priority = $priority;
        $this->position = $position;
    }

    /**
     * Get the value of id
     */ 
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of boardId
     */ 
    public function getBoardId() {
        return $this->boardId;
    }

    /**
     * Set the value of boardId
     *
     * @return  self
     */ 
    public function setBoardId($boardId) {
        $this->boardId = $boardId;

        return $this;
    }

    /**
     * Get the value of priority
     */ 
    public function getPriority() {
        return $this->priority;
    }

    /**
     * Set the value of priority
     *
     * @return  self
     */ 
    public function setPriority($priority) {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get the value of position
     */ 
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */ 
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId) {
        $this->userId = $userId;

        return $this;
    }
}