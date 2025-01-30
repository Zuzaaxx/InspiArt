<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUserByUsername(string $username): ?User
    {
        $stmt = $this->database->Connect()->prepare('
            SELECT * FROM users WHERE username = :username
        ');

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
            //throw new Exception("User not found");
        }

        return new User(
            $user['username'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }
}