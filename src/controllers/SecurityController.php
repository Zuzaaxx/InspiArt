<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $userRepository->getUserByUsername($username);

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
}