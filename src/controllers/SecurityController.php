<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUserByUsername($username);

        if (!$user) {
            return $this->render('login', ['messages' => ['wrong username']]);
        }

        // Use password_verify for secure password verification
        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['wrong password']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/start");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $email = $_POST['email'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        // Use password_hash for secure password hashing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = new User($username, $hashedPassword, $name, $email);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
    }
}
