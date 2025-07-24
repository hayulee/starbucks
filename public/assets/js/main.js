$(function(){

    // 로그인
    $('#loginForm').on('submit', function(e){
        e.preventDefault(); // 폼 기본 제출 막기

        $.ajax({
            url: '/login',  // → 라우팅에서 POST /login 처리하도록 구성
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
            url: '/starbucks/actions/user_register.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    $('#registerResult').html('<div class="alert alert-success">' + res.message + '</div>');
                    $('#registerForm')[0].reset();
                } else {
                    $('#registerResult').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            },
            error: function () {
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
        var formData = new FormData(form); // form 데이터 + 파일까지 자동 수집

        $.ajax({
        url: '/starbucks/actions/product_insert.php',
        type: 'POST', 
        data: formData,
        processData: false, // jQuery가 data를 query string으로 변환하는 것을 막음
        contentType: false, // 헤더에 'application/x-www-form-urlencoded' 대신 multipart/form-data가 자동 설정됨
        success: function (res) {
            alert('상품이 등록되었습니다!');
            closeModal()
            // 필요하면 모달 닫기
            $('#productModal').modal('hide');
            // 필요하면 폼 초기화
            form.reset();
            // 필요하면 목록 새로고침 등 추가 동작
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
