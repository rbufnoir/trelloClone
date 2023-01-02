<?php

require_once 'model/UserManager.php';

class UserController {
    private $UserManager;

    public function __construct() {
        $this->UserManager = new UserManager();
    }

    public function newUserValidation() {
        var_dump($_POST);
        if ($_POST['yourUsername'] != null && $_POST['yourEmail'] != null && $_POST['yourPassword'] != null) {
            $username = htmlspecialchars($_POST['yourUsername']);
            $email = htmlspecialchars($_POST['yourEmail']);
            $password = htmlspecialchars($_POST['yourPassword']);

            if ($this->UserManager->isUserMailAlredyTaken($email))
                echo "Mail déjà utilisé";
            else {
                if ($this->UserManager->newUserDB($username, $email, $password))
                    header('Location:'.URL.'registerComplete');
            }
        }
    }
}