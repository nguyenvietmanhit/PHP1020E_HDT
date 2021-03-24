<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
  //index.php?controller=user&action=register
  public function register() {
    // xử lý submit form
    // + DEbug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      // + Validate form
      // Các trường ko để trống
      // Password nhập lại phải trùng
      // + Xử lý đky user
      // Ko bao giờ đc lưu mật khẩu trong CSDL
      //dưới dạng plain text, bắt buộc phải mã hóa
      //trc khi lưu -> demo cơ chế md5
      if (empty($this->error)) {
//        // + Cần check nếu chưa tồn tại user trong
        //CSDL thì mới cho đky
        $user_model = new User();
        $user = $user_model->getUser($username);
        if (!empty($user)) {
          $this->error = "Username $username đã tồn tại";
        } else {
          // Đky user
          $user_model->username = $username;
          // Mã hóa pass bằng md5
          $user_model->password = md5($password);
          $is_insert = $user_model->register();
          var_dump($is_insert);
        }

      }
    }

    // Goị layout để hiển thị view
    $this->content
    = $this->render('views/users/register.php');
    require_once 'views/layouts/main_login.php';
  }
}