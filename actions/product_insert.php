<?php
// require_once '../includes/config.php';
// require_once '../includes/auth.php';
// // 관리자만 접근 허용 (필요시 체크)

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $name = trim($_POST['name'] ?? '');
//     $price = floatval($_POST['price'] ?? 0);
//     $description = $_POST['description'] ?? '';

//     // 이미지 업로드 처리 (간단한 예)
//     $image = '';
//     if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
//         $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
//         move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image_name);
//         $image = $image_name;
//     }

//     try {
//         $stmt = $pdo->prepare("INSERT INTO products (name, price, description, image, created_at) VALUES (:name, :price, :description, :image, NOW())");
//         $stmt->execute([
//             'name' => $name,
//             'price' => $price,
//             'description' => $description,
//             'image' => $image
//         ]);

//         header('Location: products.php');
//         exit;
//     } catch (PDOException $e) {
//         $error = "상품 등록 실패: " . $e->getMessage();
//     }
// }
?>


<?php
require_once '../includes/config.php';

$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'] ?? '';
$imageName = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/'; // 업로드 폴더 (미리 만들어 주세요)
        
        // 업로드된 임시 파일 경로
        $tmpName = $_FILES['image']['tmp_name'];
        
        // 원본 파일명 (보안상 사용자 입력 검증/변경 권장)
        $originalName = basename($_FILES['image']['name']);
        
        // 저장할 경로 (충돌 방지용으로 uniqid 추가 추천)
        $targetFile = $uploadDir . uniqid() . '_' . $originalName;

        // 파일 이동 (임시 위치 -> 최종 위치)
        if (move_uploaded_file($tmpName, $targetFile)) {
            echo "파일 업로드 성공: " . htmlspecialchars($originalName);
            // 이후 DB에 파일 경로나 정보 저장 가능
        } else {
            echo "파일 업로드 실패";
        }
    } else {
        echo "파일이 업로드되지 않았거나 오류가 있습니다.";
    }
} else {
    echo "POST 요청이 아닙니다.";
}



// 이미지 업로드 처리
if (!empty($_FILES['image']['name'])) {
  $uploadDir = __DIR__ . '/uploads/';
  $imageName = time() . '_' . basename($_FILES['image']['name']);
  $targetPath = $uploadDir . $imageName;

  if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    // 성공
  } else {
    echo "이미지 업로드 실패!";
    exit;
  }
}

// DB 저장
$stmt = $pdo->prepare("INSERT INTO products (name, category, price, description, image) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$name, $category, $price, $description, $imageName]);

header('Location: products.php'); // 등록 후 상품 목록으로 이동









if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

        $uploadDir = __DIR__ . '/uploads/';
        $originalName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $extension;
        $savePath = $uploadDir . $newFileName;
        $relativePath = '/uploads/' . $newFileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $savePath)) {
            // DB 연결 (예시: PDO)
            $pdo = new PDO('mysql:host=localhost;dbname=shop', 'user', 'pass');
            $stmt = $pdo->prepare("
                INSERT INTO product_images (file_name, original_name, file_path, file_size, file_type, created_at)
                VALUES (?, ?, ?, ?, ?, NOW())
            ");
            $stmt->execute([
                $newFileName,
                $originalName,
                $relativePath,
                $fileSize,
                $fileType
            ]);

            echo "이미지 등록 성공!";
        } else {
            echo "파일 이동 실패";
        }
    }
}