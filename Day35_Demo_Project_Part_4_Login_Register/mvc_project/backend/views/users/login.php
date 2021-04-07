<?php
//views/users/login.php
?>
<div class="container">
  <h1>Form login</h1>
  <form action="" method="POST">
    <div class="form-group">
      <label for="username">Nhập username</label>
      <input type="text" name="username"
             id="username" class="form-control" />
    </div>
    <div class="form-group">
      <label for="password">Nhập password</label>
      <input type="password" name="password"
             id="password" class="form-control" />
    </div>
    <div class="form-group">
      <input type="submit" name="submit"
             value="Đăng nhập"
             class="btn btn-success" />
    </div>
  </form>
</div>
