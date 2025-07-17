<div class="container mt-4">
  <h2>로그인</h2>
  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="post" action="login.php">
    <div class="mb-3">
      <label for="username" class="form-label">아이디</label>
      <input type="text" class="form-control" id="user_id" name="user_id" required />
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">비밀번호</label>
      <input type="password" class="form-control" id="password" name="password" required />
    </div>
    <button type="submit" class="btn btn-primary">로그인</button>
  </form>
</div>