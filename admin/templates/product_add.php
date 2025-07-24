<?php include '../../includes/header.php'; ?>

<div class="container my-5" style="max-width: 600px;">
  <h2 class="mb-4">상품 등록</h2>
  <form action="product_add_action.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
    <label class="form-label">상품명</label>
    <input type="text" name="name" class="form-control" required>
    </div>

  <div class="mb-3">
    <label class="form-label">카테고리</label>
    <select name="category" class="form-select" required>
      <option value="">선택</option>
      <option value="Beverage">음료</option>
      <option value="Food">푸드</option>
      <option value="Merchandise">상품</option>
    </select>
  </div>

  <div class="mb-3">
    <label class="form-label">가격</label>
    <input type="number" name="price" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">설명</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">이미지</label>
    <input type="file" name="image" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">등록</button>
  </form>
</div>

<?php include '../../includes/footer.php'; ?>