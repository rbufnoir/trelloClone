<?php

require_once 'Manager.php';
require_once 'User.php';

class UserManager extends Manager {
    private $user;

    public function getUser() {
        return $this->user;
    }

    public function loadUserByUsername($username) {
        $req = $this->returnQuery("SELECT * FROM user WHERE username=".$username.";");
        $this->user = new User($req['id'], $req['username'], $req['email'], $req['password'], $req['role']);
    }
}