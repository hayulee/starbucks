<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <title>STARBUCKS</title>
    <link rel="icon" href="/assets/images/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</head> 
<body>  
    <header> 
        <? include __DIR__.'../modals.php' ?> <!-- 모달 -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- 브랜드 -->
                <a class="navbar-brand" href="http://starbucks.local/">
                <img src="/assets/images/logo.png" alt="로고" width="30" height="30" class="d-inline-block align-text-top">
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
                        <li class="nav-item"><a class="nav-link <?= ($_GET['category'] ?? '') === 'B' ? 'active' : '' ?>" href="/product/list?category=B">음료</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($_GET['category'] ?? '') === 'F' ? 'active' : '' ?>" href="/product/list?category=F">푸드</a></li>
                        <li class="nav-item"><a class="nav-link <?= ($_GET['category'] ?? '') === 'M' ? 'active' : '' ?>" href="/product/list?category=M">상품</a></li>
                        </ul>

                        <!-- 오른쪽 메뉴 -->
                        <ul class="navbar-nav ms-auto">
                        <? if (isset($_SESSION['login_id'])): ?>
                            <? if ($_SESSION['login_user_id']=='admin'): ?>
                            <!-- 상품 등록 버튼 -->
                            <li class="nav-item mb-2 me-2">
                            <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#productModal">메뉴 등록</button>
                            </li>
                            <? endif; ?>
                            <!-- <li class="nav-item"><a class="nav-link" href="mypage.php">마이페이지</a></li> -->
                            <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#logoutModal">로그아웃</button>
                        <? else: ?>
                            <li class="nav-item mb-2 me-2">
                            <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#loginModal">로그인</button>
                            </li>
                            <li class="nav-item mb-2 me-2">
                            <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#registerModal">회원가입</button>
                            </li>
                        <? endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>








