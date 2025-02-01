<?php

class Project
{
    private $title;
    private $description;
    private $path;

    public function __construct($title, $description, $path)
    {
        $this->title = $title;
        $this->description = $description;
        $this->path = $path;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage() : string
    {
        return $this->path;
    }

    public function setImage($path)
    {
        $this->path = $path;
    }



}