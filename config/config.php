<?php

// $host = 'localhost';
// $dbname = 'starbucks';
// $username = 'root';
// $password = '1234';

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("DB 연결 실패: " . $e->getMessage());
// }

// 


define('DB_HOST', 'localhost');
define('DB_NAME', 'starbucks');
define('DB_USER', 'root');
define('DB_PASS', '1234');

try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("DB 연결 실패: " . $e->getMessage());
}

// 전역으로 PDO 공유
// $GLOBALS['pdo'] = $pdo;