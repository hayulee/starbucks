<!-- <h2>상품 목록</h2>
<div class="row">
<?php if (count($products) === 0): ?>
  <p>등록된 상품이 없습니다.</p>
<?php else: ?>
  <?php foreach ($products as $product): ?>
    <div class="col-md-4">
      <div class="card mb-4">
        <img src="uploads/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
        <div class="card-body">
          <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
          <p class="card-text"><?= number_format($product['price']) ?>원</p>
          <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-primary">상세보기</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
</div> -->