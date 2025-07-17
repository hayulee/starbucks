<?php
session_start();
header('Content-Type: application/json');

require_once(__DIR__ . '/../includes/config.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = trim($_POST['username'] ?? '');
//     $password = $_POST['password'] ?? '';
//     $email = $_POST['email'] ?? '';

//     // 비밀번호 해시화
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     try {
//         $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
//         $stmt->execute([
//             'username' => $username,
//             'password' => $hashed_password,
//             'email'    => $email
//         ]);

//         $_SESSION['user_id'] = $pdo->lastInsertId();
//         header('Location: index.php');
//         exit;
//     } catch (PDOException $e) {
//         $error = "회원가입 실패: " . $e->getMessage();
//     }
// }





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? '';
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    if (strlen($user_id) < 3 || strlen($password) < 4) {
        echo json_encode([
            'status' => 'fail',
            'message' => '아이디 또는 비밀번호가 너무 짧습니다.'
        ]);
        exit;
    }

    try {
        // 중복 확인
        $stmt = $pdo->prepare("SELECT id FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        if ($stmt->fetch()) {
            echo json_encode([
                'status' => 'fail',
                'message' => '이미 사용 중인 아이디입니다.'
            ]);
            exit;
        }

        // 회원 등록
        $stmt = $pdo->prepare("INSERT INTO users (user_id, name, password) VALUES (:user_id, :name, :password)");
        $stmt->execute([
            'user_id' => $user_id,
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        echo json_encode([
            'status' => 'success',
            'message' => "{$name}님, 가입이 완료되었습니다!"
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'DB 오류: ' . $e->getMessage()
        ]);
    }
}
?>