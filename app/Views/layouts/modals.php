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
        <input type="password" name="user_pw" class="form-control mb-2" placeholder="비밀번호" required>
        <input type="text" name="user_name" class="form-control mb-2" placeholder="이름" required>
        <!-- <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" value="남자" required>
          <label class="form-check-label" for="male">남자</label>
        </div>
        <div class="form-check form-check-inline mb-2">
          <input class="form-check-input" type="radio" name="gender" id="female" value="여자">
          <label class="form-check-label" for="female">여자</label>
        </div> -->
        <input type="tel" name="phone" class="form-control mb-2" placeholder="핸드폰 번호" required>
        <input type="text" name="address" class="form-control mb-2" placeholder="주소" required>
        <input type="email" name="email" class="form-control mb-2" placeholder="이메일" required>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">취소</button>
        <button class="btn btn-primary" type="submit">가입</button>
      </div>
    </form>
  </div>
</div>

<!-- 로그인 -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="loginForm">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">로그인</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="닫기"></button>
        </div>
        <div class="modal-body">
          <div id="resultMsg"></div>
          <input type="text" name="login_id" placeholder="아이디" class="form-control mb-2" required>
          <input type="password" name="login_pw" placeholder="비밀번호" class="form-control mb-2" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
          <button type="submit" class="btn btn-primary">로그인</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- 로그아웃 -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="logoutForm" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">로그아웃</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="닫기"></button>
      </div>
      <div class="modal-body">
        정말 로그아웃하시겠습니까?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">아니오</button>
        <button type="button" class="btn btn-danger" onclick="location.href='/logout'">예</button>
      </div>
    </form>
  </div>
</div>

<!-- 상품 등록 모달 -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">상품 등록</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="닫기"></button>
      </div>
      <div class="modal-body">
        <form action="product_add_action.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">상품명</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">카테고리</label>
            <select name="category" class="form-select" required>
              <option value="">선택</option>
              <option value="Beverage">음료</option>
              <option value="Food">푸드</option>
              <option value="Merchandise">상품</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">가격</label>
            <input type="number" name="price" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">설명</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">이미지</label>
            <input type="file" name="image" class="form-control">
          </div>

          <div class="modal-footer p-0 pt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
            <button type="submit" class="btn btn-primary">등록</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

