<?php
//views/users/register.php
?>
<form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username"
           class="form-control" id="username" />
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password"
           class="form-control" id="password" />
  </div>
  <div class="form-group">
    <label for="password_confirm">
      Nhập lại password
    </label>
    <input type="password" name="password_confirm"
           id="password_confirm" class="form-control" />
  </div>
  <input type="submit" name="submit"
         value="Đăng ký" class="btn btn-primary" />
</form>
