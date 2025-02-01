<?php

class User
{
    private $username;
    private $password;
    private $name;
    private $email;

    public function __construct(string $username, string $password, string $name, string $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setSurname(string $email)
    {
        $this->email = $email;
    }


}