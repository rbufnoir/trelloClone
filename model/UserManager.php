<?php

require_once 'Manager.php';
require_once 'User.php';

class UserManager extends Manager {
    private $user;

    public function getUser() {
        return $this->user;
    }

    public function loadUserByUsername($username) {
        $req = $this->returnQuery("SELECT * FROM user WHERE username='$username';");
        $this->user = new User($req[0]['user_id'], $req[0]['username'], $req[0]['email'], $req[0]['password']);
    }

    public function newUserDB($username, $email, $password) {
        $req = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password);";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $result = $statement->execute();

        $statement->closeCursor();

        if ($result)
            echo 'Success!';
    }

    public function isUserMailAlredyTaken($email) {
        $req = $this->returnQuery("SELECT * FROM user WHERE email='$email';");
        return !empty($req);
    }
}