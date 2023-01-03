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
        $this->user = new User($req[0]['user_id'], $req[0]['username'], $req[0]['email'], $req[0]['password'], $req[0]['profile_picture_url']);
    }
    
    public function getUserByEmail($email) {
        $req = $this->returnQuery("SELECT * FROM user WHERE email='$email';");
        $this->user = new User($req[0]['user_id'], $req[0]['username'], $req[0]['email'], $req[0]['password'], $req[0]['profile_picture_url']);
    }

    public function newUserDB($username, $email, $password) {
        $req = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password);";

        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $result = $statement->execute();
        
        $statement->closeCursor();
        
        return $result;
    }
    
    public function updateUserInfoDB($username, $email, $id) {
        $req = "UPDATE user SET username=:username, email=:email WHERE user_id=:id;";
        
        $statement = $this->getDB()->prepare($req);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $statement->execute();
        
        $statement->closeCursor();
        $this->loadUserByUsername($username);
        
        return $result;
    }

    public function isUserMailAlredyTaken($email) {
        $req = $this->returnQuery("SELECT * FROM user WHERE email='$email';");
        return !empty($req);
    }

    public function uploadPicture($pic) {
        if (getimagesize(($pic['tmp_name']))) {
            $target = "./assets/img/" . basename(htmlspecialchars($this->user->getEmail()));
            if (move_uploaded_file($pic['tmp_name'], $target)) {
                $req = "UPDATE user SET profile_picture_url=:profilePicture WHERE user_id=:id;";

                $statement = $this->getDB()->prepare($req);
                $statement->bindValue(':profilePicture', $this->user->getEmail(), PDO::PARAM_STR);
                $statement->bindValue(':id', $this->user->getId(), PDO::PARAM_INT);

                $result = $statement->execute();
        
                $statement->closeCursor();
                $this->loadUserByUsername($this->user->getUsername());

                return $result;
            }

        }
    }
}