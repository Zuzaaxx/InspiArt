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
        if(!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userRepository->getUserByUsername($username);

        if (!$user) {
            return $this->render('login', ['messages' => ['wrong username']]);
        }

        if($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['wrong username']]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['wrong password']]);
        }

//        return $this->render('start');

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

    //TODO try to use better hash function
    $user = new User($username, md5($password), $name, $email);

    $this->userRepository->addUser($user);

    return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
}
}