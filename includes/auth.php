<?php
session_start();

// 로그인 상태 확인 함수
function is_logged_in() {
    return isset($_SESSION['login_id']);
}

// 로그인 필요 페이지에서 사용
function require_login() {
    if (!is_logged_in()) {
        // 로그인 페이지로 리다이렉트
        header('Location: login.php');
        exit;
    }
}

// 로그인
function login_user($login_id) {
    $_SESSION['login_id'] = $login_id;
}

// 로그아웃
function logout_user() {
    $_SESSION = [];
    session_destroy();
}
?>