<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('zuzi@pk.edu.pl', 'admin', 'Zuza', 'Kacprzak');

        $username = $_POST["username"];
        $password = $_POST["password"];

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