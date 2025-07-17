<h2 class="mb-4">회원가입</h2>
<form method="post" action="register.php">
  <div class="mb-3">
    <label for="username" class="form-label">아이디</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">비밀번호</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">이메일</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <button type="submit" class="btn btn-primary">회원가입</button>
</form>