<div class="container my-5">
	<? if (!$product): ?>
		<div class="alert alert-warning">
		해당 상품을 찾을 수 없습니다.
		</div>
	<? else: ?>
		<div class="row">
			<div class="col-md-6">
			<? if (!empty($product['image'])): ?>
				<img 
					src="/uploads/<?= htmlspecialchars($product['image']) ?>" 
					class="img-fluid rounded" 
					alt="<?= htmlspecialchars($product['name']) ?>"
				>
			<? else: ?>
				<img src="/images/no-image.png" class="img-fluid rounded" alt="이미지 없음">
			<? endif; ?>
			</div>
			<div class="col-md-6">
				<h2><?= htmlspecialchars($product['name']) ?></h2>
				<p class="text-muted"><?= htmlspecialchars($product['category']) ?></p>
				<p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
				<h4 class="text-primary"><?= number_format($product['price']) ?>원</h4>

				<a href="/index.php?route=cart/add&id=<?= $product['id'] ?>" class="btn btn-success my-3">장바구니에 담기</a>
				<a href="/product/list?category=<?= $product['category'] ?>" class="btn btn-secondary my-3">목록으로 돌아가기</a>
			</div>
		</div>
	<? endif; ?>
</div>