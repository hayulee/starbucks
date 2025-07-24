<?php
// 1. 세션 시작
session_start();

// 2. 모든 세션 변수 제거
$_SESSION = [];

// 3. 세션 쿠키 제거 (브라우저 세션 ID 제거)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. 세션 자체 파괴
session_destroy();

// 5. JSON 응답 반환
header('Content-Type: application/json');
echo json_encode(["status" => "success"]);
exit;

?>