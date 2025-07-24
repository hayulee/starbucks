<?php
require_once __dir__.'../../includes/config.php';

$category = $_GET['category'] ?? '';
$category_list = ['B' => '음료', 'F' => '푸드', 'M' => '상품'];
$category_ko = $category_list[$category];

// 상품 가져오기
if ($category) {
  $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ? ORDER BY id DESC");
  $stmt->execute([$category]);
} else {
  $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
}
$products = $stmt->fetchAll();
?>

<?php include __dir__.'../../includes/header.php'; ?>

<div class="container my-5">
  <h3 class="mb-4"><?=$category_ko?> 목록</h3>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    <?php if (empty($products)): ?>
        <p>해당 카테고리에 등록된 상품이 없습니다.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
        <div class="col">
            <div class="card h-100 shadow-sm">
            <?php if (!empty($product['image'])): ?>
                <img src="/uploads/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                <p class="card-text text-muted small"><?= htmlspecialchars($product['category']) ?></p>
                <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <strong><?= number_format($product['price']) ?>원</strong>
                <a href="product_detail.php?id=<?= $product['id'] ?>" class="btn btn-sm btn-outline-primary">상세보기</a>
            </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php include __dir__.'../../includes/footer.php'; ?>