<?php
namespace Core;

use PDO;

class BaseController {
    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    protected function view($template, $data = []) {
        extract($data);
        require "../app/Views/layouts/header.php";
        require "../app/Views/{$template}.php";
        require "../app/Views/layouts/footer.php";
    }
}