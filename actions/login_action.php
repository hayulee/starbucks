<?php
session_start();
header('Content-Type: application/json');
require_once(__DIR__ . '/../includes/config.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $username = $_POST['username'] ?? '';
//     $password = $_POST['password'] ?? '';

//     $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
//     $stmt->bind_param('s', $username);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows === 1) {
//         $stmt->bind_result($user_id, $hashed_password);
//         $stmt->fetch();
//         if (password_verify($password, $hashed_password)) {
//             $_SESSION['user_id'] = $user_id;
//             header('Location: index.php');
//             exit;
//         }
//     }
//     $error = "로그인 정보가 올바르지 않습니다.";
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $user_id = $_POST['user_id'] ?? '';
//     $password = $_POST['password'] ?? '';

//     try {
//         $stmt = $pdo->prepare("SELECT id, password, name FROM users WHERE user_id = :user_id");
//         $stmt->execute(['user_id' => $user_id]);
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);

//         if ($user && password_verify($password, $user['password'])) {
//             $_SESSION['login_id'] = $user['id'];
//             $username = $user['name'];
//             // header('Location: index.php');
//             // exit;
//             echo htmlspecialchars($username) . "님, 안녕하세요!";
//         } else {
//             $error = "로그인 정보가 올바르지 않습니다.";
//             echo "로그인 실패";
//         }
//     } catch (PDOException $e) {
//         $error = "데이터베이스 오류: " . $e->getMessage();
//     }
// }


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $stmt = $pdo->prepare("SELECT id, user_id, password, name FROM users WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['login_user_id'] = $user['user_id'];
            $_SESSION['login_id'] = $user['id'];
            $username = $user['name'];

            echo json_encode([
                'status' => 'success',
                'message' => "{$username}님, 안녕하세요!"
            ]);
        } else {
            echo json_encode([
                'status' => 'fail',
                'message' => '로그인 정보가 올바르지 않습니다.'
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => '데이터베이스 오류: ' . $e->getMessage()
        ]);
    }
}

// include __DIR__ .'/../includes/header.php';
// include __DIR__ .'/templates/login.php';
// include __DIR__ .'/../includes/footer.php';
?>