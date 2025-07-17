<?php
require_once 'includes/config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
    echo "상품을 찾을 수 없습니다.";
    exit;
}

include 'includes/header.php';
include 'templates/product_detail.php';
include 'includes/footer.php';
?>