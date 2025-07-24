<?
include __DIR__.'/../app/views/layouts/header.php';

// require_once __DIR__.'/../core/functions.php';
?>


<style type="text/css">
    html, body {
  margin: 0;
  padding: 0;
}
    main {
  position: relative; 
   min-height: 95vh;
   background-color: 	#F9F6F1;
}
    .main-visual_wrap {
  /* position: relative; */
  /* min-height: 1400px; */
  /* overflow: hidden; */
}


    .pc-drink {display:block;}
    .m-drink {display:none;}
    .set_01, .set_02, .set_03 {position: absolute;}

    .set_01 {top:40.28%; left:51.2%; width:19.5%;}
    .set_02 {top:14.706%; left:40.4%; width:17.5%;}
    .set_03 {top:19.97%; left:62.55%; width:19.5%;}
        .main-visual_slogan, .btn_slogan {position:absolute; width:25.99%; left:10.2%;}
    .main-visual_slogan {top: 40%;}
       .main-visual_slogan .m-slogan {width:100%; display:none;}
    .main-visual_slogan .pc-slogan {display: block;}
    .main-visual_wrap .main-visual_inner {max-width:100%;}
    /* .main-visual_set {height:100%;} */
    /* .main-visual_wrap {height:32.3vw; background-image:url('https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_bg_250519.jpg') */
    /* .main-visual_wrap {height:32.3vw; background-image:url('https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_bg_250519.jpg');}

 
    .set_common .m-slogan {width:100%; display:none;}
    .set_common .pc-slogan {display: block;}

    .set_common:after {display:none;}
    #topWrap {border-top:0}
    

  /* media queries mobile */
  @media screen and (max-width:960px) {
    .main-visual_wrap {width:auto; height:auto;} 
    /* background-image:url('https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_bg_mo_250519.jpg'); background-position:center top; box-sizing:border-box; margin-top:9px;}  */
    .main-visual_slogan .pc-slogan {display: none;} 
    .main-visual_slogan {width:68.75%; top:8.145%; left:50%; transform: translateX(-50%);}
    .main-visual_slogan .m-slogan {width:100%; display:block;}
    .pc-drink {display:none;}
    .m-drink {width:100%; display:block;}
    .set_01 {top:20%; left:4.064%; width:80.314%; max-width:100%;}
    .set_02 {top:45%; left:15.158%; width:94.064%; max-width:100%; overflow: hidden;}
    .set_03 {top:75%; left:5%; width:83.908%; max-width:100%;}
    .set_common {bottom:auto; margin: 0;}
    .set_common {bottom:auto; margin: 0;}
  }


</style>  
<main>
<div class="main-visual_wrap">
    <div class="main-visual_inner">
        <div class="main-visual_slogan">
          <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_slogan_250519.png" alt="LIGHT UP YOUR SUMMER" class="pc-slogan">
          <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_slogan_mo_250519.png" alt="LIGHT UP YOUR SUMMER" class="m-slogan">
        </div>

        <div class="main-visual_set">
            <div class="set_common set_01">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink01_250519.png" alt="자몽 망고 코코 프라푸치노" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink01_mo_250519.png" alt="자몽 망고 코코 프라푸치노" class="m-drink">
            </div>
            <div class="set_common set_02">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink02_250519.png" alt="더블 머스캣 블렌디드" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink02_mo_250519.png" alt="더블 머스캣 블렌디드" class="m-drink">
            </div>
            <div class="set_common set_03">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink03_250519.png" alt="씨솔트 카라멜 콜드 브루" class="pc-drink">
              <img src="https://image.istarbucks.co.kr/upload/common/img/main/2025/2025_summer_top_drink03_mo_250519.png" alt="씨솔트 카라멜 콜드 브루" class="m-drink">
            </div>
        </div>
    </div>
</div>

</main>
<? include __DIR__.'/../app/views/layouts/footer.php';?>