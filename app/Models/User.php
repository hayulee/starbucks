<?php
namespace App\Models;

class User {
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByUserId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC); // 연관 배열, false 반환
    }

    public function registerUser($user_info) {
        $user_id = $user_info['user_id'];
        $user_pw = $user_info['user_pw'];
        $user_name = $user_info['user_name'];
        $phone_number = $user_info['phone_num'];

        $stmt = $this->pdo->prepare("INSERT INTO users (user_id, password, name, phone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$user_id, $user_pw, $user_name, $phone_number]); // true, false 반환
    }

}