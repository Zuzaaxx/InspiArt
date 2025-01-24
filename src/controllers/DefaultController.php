<?php

require_once 'AppController.php';

class DefaultController extends AppController{
    public function index() {
        $this->render('login');
    }

    public function ideas() {
        $this->render('favourite-ideas');
    }
}