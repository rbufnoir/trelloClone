<?php

class Board {
    private int $id;
    private string $name;
    private int $userId; //Est-ce pertinent comme info???

    public function __construct($id, $name, $userId) {
        $this->id = $id;
        $this->name = $name;
        $this->userId = $userId;
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
}