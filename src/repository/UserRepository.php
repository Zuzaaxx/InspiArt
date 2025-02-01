<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUserByUsername(string $username): ?User
    {
        $stmt = $this->database->Connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.user_details_id = ud.id WHERE username = :username
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
            $user['email']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (name, email)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getEmail()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (username, password, user_details_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getUsername(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users_details WHERE name = :name AND email = :email
        ');
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}