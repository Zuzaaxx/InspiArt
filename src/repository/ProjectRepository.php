<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Project.php';

class ProjectRepository extends Repository
{
    public function getProject(int $id): ?Project
    {
        $stmt = $this->database->Connect()->prepare('
            SELECT * FROM users_gallery WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $idea = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($idea == false) {
            return null;
            //throw new Exception("User not found");
        }

        return new Project(
            $idea['title'],
            $idea['description'],
            $idea['path']
        );
    }

    public function addProject(Project $project): void
    {
        $date = new DateTime();
        $stmt = $this->database->Connect()->prepare('
            INSERT INTO users_gallery (title, description, path, date, user_id)
            values (?, ?, ?, ?, ?)
        ');

        //TODO get user id
        $user_id = 1;

        $stmt->execute([
            $project->getTitle(),
            $project->getDescription(),
            $project->getImage(),
            $date->format('D-M-Y'),
            $user_id
        ]);
    }
}