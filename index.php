<?php
require_once 'includes/config.php';

// // 상품 목록 조회
// $sql = "SELECT * FROM products ORDER BY created_at DESC";
// $result = $conn->query($sql);

// $products = [];
// if ($result) {
//     while ($row = $result->fetch_assoc()) {
//         $products[] = $row;
//     }
// }



// include 'templates/product_list.php';

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <title>STARBUCKS</title>
    <link rel="icon" href="/starbucks/assets/images/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/starbucks/assets/js/main.js"></script>
    <style>
.navbar-nav .btn {
    max-width: 120px;
          width: 100%;
  padding: 0.4rem 0.4rem;
  font-size: 0.8rem;
  line-height: 1.5;
  border-radius: 0.375rem;
  text-align: center;

}

/* 2. 버튼 사이에 세로 간격 추가 */
.navbar-nav .btn + .btn {
  margin-top: 0.5rem;   /* 버튼 사이 간격 */
}
/* 3. 토글 메뉴 패딩/마진 조절 (토글 메뉴 내부 여백) */
.collapse.navbar-collapse {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

/* 4. 토글 버튼과 펼쳐진 메뉴 사이 간격 */
/* 보통 부트스트랩에서 자동 처리되지만 부족하면 아래처럼 */
.navbar-toggler {
margin-top: 0.75rem;
margin-bottom: 0.75rem;
} */

    </style>
</head>
<body>
    <?php include 'includes/header.php';?>
    <main style="height:1000px;">


    </main>
    <?php include 'includes/footer.php';?>
</body>
</html>

<!-- <style type="text/css">
  .main-visual_wrap {height:32.3vw; background-image:url('https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_bg_250519.jpg');}
  .main-visual_wrap .main-visual_inner {max-width:100%;}
  .main-visual_slogan, .btn_slogan {position:absolute; width:25.99%; left:10.2%;}
  .main-visual_slogan {top: 33.7466%;}
  .btn_slogan {z-index: 10; top: 60.3722%; left:10.3%; text-align: center;}
  .btn_slogan a {width:25.053%; min-width:125px; margin:0 auto; color: #f29440; border:2px solid #f29440; transition:background-color .7s, color .7s, border-color .7s; -webkit-transition:background-color .7s, color .7s, border-color .7s; text-decoration: none;}
  .btn_slogan a:hover {background-color:#f29440; color: #fff; text-decoration: underline;}
  .main-visual_set {height:100%;}
  .set_01 {z-index: 9; top:20.28%; left:51.2%; width:19.5%;}
  .set_02 {z-index: 8; top:14.706%; left:40.4%; width:17.5%;}
  .set_03 {z-index: 8; top:19.97%; left:62.55%; width:19.5%;}
  /* .set_04 {z-index: 8; top:27.55%; left:42.89%; width:12%;}
  .set_05 {z-index: 8; top:21.51%; left:69.25%; width:11.4%;} */
  .set_common:after {display:none;}
  .reserve_magazine_wrap .reserve_detail-btn_wrap {width:100% !important;} /* (필수)리저브 매거진 */
  #topWrap {border-top:0}
  /* media queries pc */
  /* @media screen and (max-width:1400px) {
      .main-visual_wrap {background-position:36% bottom;}
      .main-visual_slogan, .btn_slogan {left:-6%; width: 400px;}
      .set_01 {top: 35.7%; left: 34.5%;}
      .set_02 {top: 35.7%; right: 7.2%;}
      .set_03 {top: 16.3%; left: 35%;}
      .set_04 {top: 19.7%; right: -6.5%;}
      .btn_slogan {top:63.5%;}
  } */
  @media screen and (min-width:960px) and (max-width:1340px) { /* 기존 1130px */
      /*
      .main-visual_wrap {height:41vw; background-position:28% bottom;}
      .main-visual_wrap .main-visual_inner {max-width:100%;}
      .main-visual_slogan, .btn_slogan {top: 34%; left: 6.5%; width: 28%;}
      .btn_slogan {top:62%;}
      .set_01 {top: 34%; left: 41.5%; width: 25%;}
      .set_02 {top: 33.5%; right: 15.2%; width: 20.5%;}
      .set_03 {top: 16.1%; left: 42%; width: 21%;}
      .set_04 {top: 18%; right: 5.4%; width: 23%;}
      */
      .btn_slogan a {font-size: 15px; width:34%}
  }
  /* media queries mobile */
  @media screen and (max-width:960px) {
      .layer_floating {top:108px; width:25.7%; right:1.8%;} /* 시즌 음료 가림 */
      .main-visual_wrap {width:auto; height:268.594vw; background-image:url('https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_bg_mo_250519.jpg'); background-position:center top; box-sizing:border-box; margin-top:9px;}
      .main-visual_slogan {width:68.75%; top:8.145%; left:50%; transform: translateX(-50%);}
      .main-visual_slogan .m-slogan {width:100%; display:block;}
      .main-visual_slogan .pc-slogan {display: none;}
      .pc-drink {display:none;}
      .m-drink {display:block;}
      .set_common {bottom:auto; margin: 0;}
      .set_01 {z-index:8; top:18.907%; left:4.064%; width:80.314%; max-width:100%;}
      .set_02 {z-index:9; top:39.384%; left:15.158%; width:94.064%; max-width:100%; overflow: hidden;}
      .set_03 {z-index:10; top:62.362%; left:5%; width:83.908%; max-width:100%;}
      /* .set_04 {z-index: 10;top:60.25%; left:14.69%;width:69.69%;max-width: 100%;}
      .set_05 {z-index: 10;top:75.29%; left:15.62%;width:87.19%;max-width: 100%;} */
      .btn_slogan {z-index:10; top:87.959%; left:50%; transform:translateX(-50%); width:100%; margin:0 auto; padding-top:0; height:auto; bottom:auto;}
      .btn_slogan a {width:36%; color:#006e3f; border-color:#006e3f; line-height:10vw; font-size:25px; font-weight:bold; border-radius: 3px;}
      .btn_slogan a:hover {background-color:#006e3f;}
  }
  @media screen and (max-width:480px) {
    .btn_slogan a {font-size:16px;}
  }
  @media screen and (max-width:320px) {
      /* .main-visual_wrap {height:273.8vw;} */
  }
</style> -->
<!-- 
<div class="main-visual_wrap">
    <div class="main-visual_inner">
        <div class="main-visual_slogan" style="opacity: 1;">
          <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_slogan_250519.png" alt="LIGHT UP YOUR SUMMER" class="pc-slogan">
          <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_slogan_mo_250519.png" alt="LIGHT UP YOUR SUMMER" class="m-slogan">
        </div>

        <div class="main-visual_set">
            <div class="set_common set_01" style="opacity: 1;">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink01_250519.png" alt="자몽 망고 코코 프라푸치노" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink01_mo_250519.png" alt="자몽 망고 코코 프라푸치노" class="m-drink">
            </div>
            <div class="set_common set_02" style="opacity: 1;">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink02_250519.png" alt="더블 머스캣 블렌디드" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink02_mo_250519.png" alt="더블 머스캣 블렌디드" class="m-drink">
            </div>
            <div class="set_common set_03" style="opacity: 1;">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink03_250519.png" alt="씨솔트 카라멜 콜드 브루" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink03_mo_250519.png" alt="씨솔트 카라멜 콜드 브루" class="m-drink">
            </div>
        </div>

        <div class="btn_slogan" style="opacity: 1;">
            <a href="https://www.starbucks.co.kr/whats_new/campaign_view.do?pro_seq=2896">자세히 보기</a>
        </div>
    </div>
</div> -->

