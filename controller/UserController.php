<?php

require_once 'model/UserManager.php';

class UserController
{
    private $UserManager;

    public function __construct() {
        $this->UserManager = new UserManager();
    }

    public function loadUserByEmail($email) {
        $this->UserManager->getUserByEmail($email);
        return $this->UserManager->getUser();
    }

    public function newUserValidation() {
        if ($_POST['yourUsername'] != null && $_POST['yourEmail'] != null && $_POST['yourPassword'] != null) {
            $username = htmlspecialchars($_POST['yourUsername']);
            $email = htmlspecialchars($_POST['yourEmail']);
            $password = password_hash(htmlspecialchars($_POST['yourPassword']), PASSWORD_DEFAULT);

            if ($this->UserManager->isUserMailAlredyTaken($email))
                echo "Mail déjà utilisé";
            else {
                if ($this->UserManager->newUserDB($username, $email, $password))
                    header('Location:' . URL . 'registerComplete');
            }
        }
    }

    public function checkUserLogin() {
        if ($_POST['yourEmail'] != null && $_POST['yourPassword'] != null) {
            $email = htmlspecialchars($_POST['yourEmail']);
            $password = htmlspecialchars($_POST['yourPassword']);

            $user = $this->loadUserByEmail($email);

            if (password_verify($password, $user->getPassword())) {
                if ($_POST['remember'] == "on")
                    $this->startCookies($user);
                $this->startSession($user);
                header('Location:' . URL);
            }
        }
    }

    public function updateUserProfile() {
        $user = $this->loadUserByEmail($_SESSION['email']);
        $username = (!empty($_POST['yourUsername'])) ? htmlspecialchars($_POST['yourUsername']) : $user->getUsername();
        $email = (!empty($_POST['yourEmail'])) ? htmlspecialchars($_POST['yourEmail']) : $user->getEmail();
        if (isset($_FILES['uploadProfilePicture']) && $_FILES['uploadProfilePicture']['name'] != null)
            $this->UserManager->uploadPicture($_FILES['uploadProfilePicture']);
        
        if ($this->UserManager->isUserMailAlredyTaken($email) && $email != $_SESSION['email'])
            echo 'Mail déjà utilisé!';
        else {
            if ($this->UserManager->updateUserInfoDB($username, $email, $user->getId()))
                $user = $this->UserManager->getUser();
                $this->startSession($user);
                header('Location:' . URL . 'profile');
        }
    }

    public function startCookies($user) {
        setcookie("treffoEmail", $user->getEmail(), time() + (60 * 60 * 24 * 30), '/');
        setcookie("treffoPassword", $user->getPassword(), time() + (60 * 60 * 24 * 30), '/');
    }

    public function deleteCookies() {
        setcookie("treffoEmail", "", time() - 3600);
        setcookie("treffoPassword", "", time() - 3600);
    }

    private function startSession($user) {
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['profilePicture'] = $user->getProfilePicture();
        $_SESSION['user_id'] = $user->getId();
    }

    public function logoutUser() {
        session_unset();
        session_destroy();
        header('Location:' . URL);
    }
}
