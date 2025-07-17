<?php
require_once '../includes/config.php';
require_once '../includes/auth.php';
// 관리자만 접근 허용 (필요시 체크)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = floatval($_POST['price'] ?? 0);
    $description = $_POST['description'] ?? '';

    // 이미지 업로드 처리 (간단한 예)
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image_name);
        $image = $image_name;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, description, image, created_at) VALUES (:name, :price, :description, :image, NOW())");
        $stmt->execute([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image
        ]);

        header('Location: products.php');
        exit;
    } catch (PDOException $e) {
        $error = "상품 등록 실패: " . $e->getMessage();
    }
}
?>