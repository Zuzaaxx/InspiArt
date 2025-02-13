<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Project.php';
require_once __DIR__ . '/../repository/ProjectRepository.php';

class ProjectController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_FILE_TYPES = ['image/png', 'image/jpeg', 'image/jpg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $projectRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }


    public function addProject()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            //TODO save new project to base
            $project = new Project($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->projectRepository->addProject($project);

            //$url = "http://$_SERVER[HTTP_HOST]";
            //header("Location: {$url}/gallery");

            return $this->render('gallery', ['messages' => $this->messages,
                'projects' => $this->projectRepository->getProjects()
            ]);
        }

        return $this->render('add-idea', ['messages' => $this->messages]);
    }

    private function validate(array $file) : bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "The uploaded file exceeds the maximum allowed size.";
            return false;
        }

        if (!isset($file['type']) && in_array($file['type'], self::SUPPORTED_FILE_TYPES)) {
            $this->messages[] = "File type is not supported.";
            return false;
        }

        return true;
    }

    public function gallery()
    {
        $projects = $this->projectRepository->getProjects();
        $this->render('gallery', ['projects' => $projects]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
    }
}