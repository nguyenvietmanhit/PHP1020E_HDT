<?php
//views/users/register.php
// Dựng form đky dùng Boostrap
?>
<div class="container">
  <h1>Form đăng ký</h1>
  <form action="" method="POST">
    <div class="form-group">
      <label for="username">Nhập username</label>
      <input type="text"
             name="username" id="username"
             class="form-control" />
    </div>
    <div class="form-group">
      <label for="password">Nhập password</label>
      <input type="password" name="password"
             id="password" class="form-control" />
    </div>
    <div class="form-group">
      <label for="password_confirm">
        Nhập lại password
      </label>
      <input type="password"
             name="password_confirm"
             id="password_confirm"
             class="form-control" />
    </div>
    <div class="form-group">
      <input type="submit" name="submit"
             value="Đăng ký"
             class="btn btn-primary" />
    </div>
  </form>
  Nếu đã có tài khoản, đăng nhập tại
  <a href="index.php?controller=user&action=login">
    đây
  </a>
</div>
