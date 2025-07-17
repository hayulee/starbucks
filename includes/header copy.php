<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <title>STARBUCKS</title>
  <link rel="icon" href="/starbucks/assets/images/logo.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/starbucks/assets/js/main.js"></script>
</head>
<body>

<?php include __DIR__ . '/modals.php'; ?> <!-- 모달 파일 포함 -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- 브랜드 -->
    <a class="navbar-brand" href="index.php">
      <img src="/starbucks/assets/images/logo.png" alt="로고" width="30" height="30" class="d-inline-block align-text-top">
      <b>STARBUCKS</b>
    </a>

    <!-- 토글 버튼 -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="메뉴 열기">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 메뉴 -->
    <div class="collapse navbar-collapse" id="mainNavbar">
  <div class="d-flex w-100 justify-content-between flex-wrap">
    <!-- 왼쪽 메뉴 -->
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">홈</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php">음료</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php">푸드</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php">상품</a></li>
    </ul>

    <!-- 오른쪽 메뉴 -->
    <ul class="navbar-nav ms-auto">
      <?php if (isset($_SESSION['login_id'])): ?>
        <li class="nav-item"><a class="nav-link" href="mypage.php">마이페이지</a></li>
        <li class="nav-item"><a class="nav-link" href="/starbucks/actions/logout_action.php">로그아웃</a></li>
      <?php else: ?>
        <li class="nav-item">
          <button class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#loginModal">로그인</button>
        </li>
        <li class="nav-item">
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal">회원가입</button>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>
  </div>
</nav>

</body>
</html>








