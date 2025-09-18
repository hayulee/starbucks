<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\User;

class UserController extends BaseController {

    public function register() {
        $user_id    = $_POST['user_id'];
        $user_pw    = $_POST['user_pw'];
        $user_name  = $_POST['user_name'];
        $phone_num  = $_POST['phone'];

        // User 모델 인스턴스 생성
        $userModel = new User($this->pdo);

        // 아이디 중복 확인
        $id_confirm = $userModel->findByUserId($user_id);

        if ($id_confirm) {
            echo json_encode([
                'status' => 'fail',
                'message' => '이미 사용 중인 아이디입니다. 다른 아이디를 사용해 주세요.'
            ]);
            exit;
        }

        // 비밀번호 암호화
        $hashed_pw = password_hash($user_pw, PASSWORD_DEFAULT);

        $user_info = [
                        'user_id'=> $user_id,
                        'user_pw'=> $hashed_pw,
                        'user_name'=> $user_name,
                        'phone_num'=> $phone_num     
        ];

        // 회원 가입 처리
        $register = $userModel->registerUser($user_info);

        if($register) {
            echo json_encode([
                    'status' => 'success',
                    'message' => '가입을 환영합니다.'
            ]);
            exit;
        }

    }

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

}