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
            $password = password_hash(htmlspecialchars($_POST['yourPassword']), PASSWORD_DEFAULT);

            if ($this->UserManager->isUserMailAlredyTaken($email))
                echo "Mail déjà utilisé";
            else {
                if ($this->UserManager->newUserDB($username, $email, $password))
                    header('Location:'.URL.'registerComplete');
            }
        }
    }

    public function checkUserLogin() {
        if ($_POST['yourEmail'] != null && $_POST['yourPassword'] != null) {
            $email = htmlspecialchars($_POST['yourEmail']);
            $password = htmlspecialchars($_POST['yourPassword']);

            $this->UserManager->getUserByEmail($email);
            $user = $this->UserManager->getUser();

            if (password_verify($password, $user->getPassword())) {
                $this->startSession($user);
                header('Location:'.URL);
            }
        }
    }

    private function startSession($user) {
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['profilePicture'] = $user->getProfilePicture();
    }

    public function logoutUser() {
        session_unset();
        session_destroy();
        header('Location:'.URL);
    }
}