$(function(){

    // 로그인
    $('#loginForm').on('submit', function(e){
        e.preventDefault(); // 폼 기본 제출 막기

        $.ajax({
            url: 'user/login',  // → 라우팅에서 POST /login 처리하도록 구성
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
                console.log(res)
                if (res.status === 'success') {
                    closeModal();
                    window.location.href = '/';
                } else {
                    $('#resultMsg').html('<div class="alert alert-danger">' + res.message + '</div>');
                    $('#loginForm')[0].reset(); 
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX 오류 발생');
                console.error('status:', status);
                console.error('error:', error);
                console.error('responseText:', xhr.responseText);
                $('#resultMsg').html('<div class="alert alert-danger">서버 오류가 발생했습니다.</div>');
            }
        });
    });

    // 로그인 취소 시 폼 초기화
    $('#loginModal').on('hidden.bs.modal', function () {
        $('#loginForm')[0].reset();
        $('#resultMsg').html('');
    });

    // 로그아웃
    // $('#logoutForm').on('submit', function(e){
    //     e.preventDefault(); 
        
    //     $.ajax({
    //         url: '/logout', 
    //         method: 'POST',
    //         dataType: 'json',
    //         success: function(res){
    //             if (res.status === 'success') {
    //                 window.location.href = 'starbucks.local';
    //             }
    //         },
    //         error: function(xhr, status, error){
    //             console.error('AJAX 오류 발생');
    //             console.error('status:', status);
    //             console.error('error:', error);
    //             console.error('responseText:', xhr.responseText);
            
    //         }
    //     });
    // });

    // 회원가입
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/user/register',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    $('#registerResult').html('<div class="alert alert-success">' + res.message + '</div>');
                    closeModal();
                } else {
                    $('#registerResult').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX 오류 발생');
                console.error('status:', status);
                console.error('error:', error);
                console.error('responseText:', xhr.responseText);
                $('#registerResult').html('<div class="alert alert-danger">서버 오류가 발생했습니다.</div>');
            }
        });
    });

    // 회원가입 취소 시 폼 초기화
    $('#registerModal').on('hidden.bs.modal', function () {
        $('#registerForm')[0].reset();
        $('#registerResult').html('');
    });

    // 상품 등록
    $('#productModal form').on('submit', function (e) {
        e.preventDefault(); // 기본 폼 제출 막기

        var form = this;
        var formData = new FormData(form); // 이미지 포함 데이터 수집

        $.ajax({
        url: '/product/register',
        method: 'POST', 
        data: formData,
        // data: $(this).serialize(), // 파일 input은 무시함. 그러므로 이미지 전송을 하려면 FormData 써야함.
        processData: false, // jQuery가 data를 query string으로 변환하는 것을 막음. 이미지 전송 시 false 필수.
        contentType: false, // 헤더에 'application/x-www-form-urlencoded' 대신 multipart/form-data가 자동 설정됨. 이미지 전송 시 false 필수.
        success: function (res) {
            if (res.status === 'success') {
                alert('상품이 등록되었습니다!');
                form.reset();
            } else {
                $('#registerResult').html('<div class="alert alert-danger">' + res.message + '</div>');
            }
        },
        error: function () {
            alert('상품 등록 중 오류가 발생했습니다.');
        }
        });
  });
    

    function closeModal() {
        // 모달 숨기기
        $('.modal').modal('hide');
        
        // .modal-backdrop 강제 제거
        $('.modal-backdrop').remove();
        
        // body에서 modal-open 클래스 제거 (스크롤 가능하게 함)
        $('body').removeClass('modal-open');
        
        // 스크롤바 여백 제거
        $('body').css('padding-right', '');
        
        location.reload();
    }

});
