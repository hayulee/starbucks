<div class="container mt-4">
  <h2><?= htmlspecialchars($product['name']) ?></h2>
  <img src="uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid mb-3" />
  <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
  <p><strong>가격: </strong><?= number_format($product['price']) ?>원</p>
  <a href="cart.php?action=add&id=<?= $product['id'] ?>" class="btn btn-success">장바구니에 담기</a>
</div>