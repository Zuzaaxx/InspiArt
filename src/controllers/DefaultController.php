<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index()
    {
        $this->render('login');
    }

    public function start()
    {
        $this->render('Start');
    }

    public function favourites()
    {
        $this->render('favourite-ideas');
    }

    public function profile()
    {
        $this->render('profile');
    }

    public function register()
    {
        $this->render('register');
    }

}