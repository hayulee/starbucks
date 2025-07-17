<!-- 회원 가입 -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="registerForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">회원가입</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="registerResult"></div>
        <input type="text" name="user_id" class="form-control mb-2" placeholder="아이디" required>
        <input type="text" name="name" class="form-control mb-2" placeholder="이름" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="비밀번호" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">닫기</button>
        <button class="btn btn-primary" type="submit">가입</button>
      </div>
    </form>
  </div>
</div>

<!-- 로그인 -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="ajaxModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="loginForm">
        <div class="modal-header">
          <h5 class="modal-title" id="ajaxModalLabel">로그인</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="닫기"></button>
        </div>
        <div class="modal-body">
          <div id="resultMsg"></div>
          <input type="text" name="user_id" placeholder="아이디" class="form-control mb-2" required>
          <input type="password" name="password" placeholder="비밀번호" class="form-control mb-2" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
          <button type="submit" class="btn btn-primary">로그인</button>
        </div>
      </form>
    </div>
  </div>
</div>



