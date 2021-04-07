<?php
require_once 'controllers/Controller.php';

class UserController extends Controller {
  //Phương thức đăng ký tài khoản
  // index.php?controller=user&action=register
  public function register() {
    // + Lấy nội dung view
    $this->content =
    $this->render('views/users/register.php');
    // + Gọi layout để hiển thị view
    // Do chức năng đăng ký dùng cho các user chưa
    //login,nên ko thể gọi layout main đc, nên
    //cần tạo layout mới -> copy file layout chính,
    //loại bỏ các phần ko cần thiết
    require_once 'views/layouts/main_login.php';
  }

}