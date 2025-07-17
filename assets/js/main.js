$(function(){

    $('#loginForm').on('submit', function(e){
        e.preventDefault(); // 폼 기본 제출 막기
        
        // AJAX 요청
        $.ajax({
        url: '/starbucks/actions/login_action.php', 
        type: 'POST',
        data: $(this).serialize(),
        success: function(res){
            console.log(res)
            if (res.status === 'success') {
                // $('#resultMsg').html('<div class="alert alert-success">' + res.message + '</div>');
                closeModal()
            } else {
                $('#resultMsg').html('<div class="alert alert-danger">' + res.message + '</div>');
            }
        //   $('#resultMsg').html('<div class="alert alert-success">' + response + '</div>');
            $('#loginForm')[0].reset(); 
        },
        error: function(){
            $('#resultMsg').html('<div class="alert alert-danger">서버 오류가 발생했습니다.</div>');
        }
        });
    });

    $('#registerForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/starbucks/actions/register_action.php',
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
