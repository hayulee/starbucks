<?php session_start(); ?>

<?php include __DIR__ . '/modals.php'; ?> <!-- 모달 파일 포함 -->

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- 브랜드 -->
            <a class="navbar-brand" href="index.php">
            <img src="/starbucks/assets/images/logo.png" alt="로고" width="30" height="30" class="d-inline-block align-text-top">
            <b>STARBUCKS</b>
            </a>

            <!-- 토글 버튼 -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="메뉴 열기">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 메뉴 -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <div class="d-flex w-100 justify-content-between flex-wrap">
                    <!-- 왼쪽 메뉴 -->
                    <ul class="navbar-nav me-auto">
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
                        <li class="nav-item mb-2 me-2">
                        <button class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#loginModal">로그인</button>
                        </li>
                        <li class="nav-item mb-2 me-2">
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#registerModal">회원가입</button>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>









