<?php
// 회원 문의 예시
require_once 'includes/config.php';
require_once 'includes/auth.php';
require_login(); // 로그인된 사용자만 작성 가능

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content, created_at) VALUES (:user_id, :title, :content, NOW())");
        $stmt->execute([
            'user_id' => $user_id,
            'title'   => $title,
            'content' => $content
        ]);

        header('Location: board_list.php');
        exit;
    } catch (PDOException $e) {
        $error = "게시글 등록 실패: " . $e->getMessage();
    }
}

?>