<div class="container my-5">
	<h3 class="mb-4">
		<?= htmlspecialchars($categoryName) ?> 목록
	</h3>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
		<? if (empty($products)): ?>
			<p>해당 카테고리에 등록된 상품이 없습니다.</p>
		<? else: ?>
			<? foreach ($products as $product): ?>
				<div class="col">
					<div class="card h-100 shadow-sm">

						<div class="card-body">
							<img src="/uploads/<?=$imgFolderName?>/<?= urlencode($product['img_name']) ?>" 
									alt="<?= htmlspecialchars($product['name']) ?>" 
									class="img-fluid mb-3">
							<h5 class="card-title">
								<?= htmlspecialchars($product['name']) ?>
							</h5>
							<p class="card-text text-muted small">
								<?= htmlspecialchars($product['category']) ?>
							</p>
							<p class="card-text">
								<?= htmlspecialchars($product['description']) ?>
							</p>
						</div>
						<div class="card-footer d-flex justify-content-between align-items-center">
							<strong><?= number_format($product['price']) ?>원</strong>
							<a href="/product/detail?id=<?=$product['id']?>&category=<?=$product['category']?>" class="btn btn-sm btn-outline-primary">상세보기</a>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		<? endif; ?>
	</div>
</div>