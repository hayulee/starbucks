<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\User;

class UserController extends BaseController {

    // public function loginForm() {
    //     $this->view('user/login');
    // }

    public function login() {
        $id = $_POST['login_id'] ?? '';
        $pw = $_POST['login_pw'] ?? '';

        $userModel = new User($this->pdo);
        $user = $userModel->findByUserId($id);

        if (!$user || !password_verify($pw, $user['password'])) {
            echo json_encode([
                'status' => 'fail',
                'message' => '아이디 또는 비밀번호가 잘못되었습니다.'
            ]);
            exit;
        }

        $_SESSION['login_id'] = $user['id'];
        $_SESSION['login_user_id'] = $user['user_id'];

        echo json_encode([
            'status' => 'success',
            'message' => '로그인 성공'
        ]);
        exit;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header("Location: /");
        exit;
    }

    // public function mypage() {
    //     if (!isset($_SESSION['user'])) {
    //         header("Location: /index.php?route=login");
    //         exit;
    //     }
    //     $user = $_SESSION['user'];
    //     $this->view('user/mypage', ['user' => $user]);
    // }
}