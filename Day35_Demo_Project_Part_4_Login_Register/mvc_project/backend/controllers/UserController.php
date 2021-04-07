<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
  //Phương thức đăng ký tài khoản
  // index.php?controller=user&action=register
  public function register() {
    // XỬ LÝ SUBMIT FORM
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // + NẾu user form thì mới xử lý
    if (isset($_POST['submit'])) {
      // + Tạo biến trung gian
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      // + Validate form
      // Tất cả phải nhập
      // Password nhập lại phải đúng
      // Username ko đc trùng trong CSDL
      if (empty($username) || empty($password)
          || empty($password_confirm)) {
        $this->error = "Phải nhập tất cả các trường";
      } elseif ($password != $password_confirm) {
        $this->error = "Password nhập lại chưa đúng";
      } else {
        // Validate username ko đc trùng
        $user_model = new User();
        $is_user_exist = $user_model
            ->isUserExists($username);
//        var_dump($is_user_exist);
        if ($is_user_exist) {
          $this->error =
              "Username $username đã tồn tại";
        }
      }
      // + Xử lý đăng ký tài khoản chỉ khi ko có
      // lỗi xảy ra
      if (empty($this->error)) {
        $user_model = new User();
        // + Ko bao giờ đc lưu mật khẩu dạng plain
        //text vào CSDL, bắt buộc phải mã hóa
        // + Cơ chế mã hóa có nhiều: md5, sha, ...
        // + Sử dụng hàm sau để mã hóa theo thuật
        //toán bcrypt
        $password_encrypt =
        password_hash($password, PASSWORD_BCRYPT);
        $user_model->username = $username;
        $user_model->password = $password_encrypt;
        $is_insert = $user_model->register();
        if ($is_insert) {
          $_SESSION['success'] = 'Đăng ký thành công';
          header('Location: index.php?controller=user&action=login');
          exit();
        }
      }
    }


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

  public function login() {
    // Xử lý submit form
    // + Debug
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // + Ktra nếu submit form thì mới xử lý
    if (isset($_POST['submit'])) {
      // + Tạo biến
      $username = $_POST['username'];
      $password = $_POST['password'];
      // + Validate
      if (empty($username) || empty($password)) {
        $this->error = "Phải nhập";
      }
      // + Xử lý đăng nhập chỉ ko có lỗi
      if (empty($this->error)) {
        // LẤy ra password đã mã hóa dựa vào
        //username
        $user_model = new User();
        // Lấy mảng user để tạo session nếu
        //đăng nhập thành công
        $user = $user_model->getUser($username);
        if (empty($user)) {
          $this->error = 'Username ko tồn tại';
        } else {
          // + Dùng hàm sau để kiểm tra xem mật
          //khẩu mã hóa có đúng với mật khẩu từ
          //form gửi lên hay ko
          // Hàm này chỉ có tác dụng với các mật
          //khẩu đc mã hóa bằng hàm password_hash
          $is_same_password =
          password_verify($password, $user['password']);
          var_dump($is_same_password);
          if ($is_same_password) {
            // Đăng nhập thành công
            $_SESSION['user'] = $user;
            // Chuyển hướng về admin
          } else {
            $this->error = 'Sai tài khoản hoặc mật khẩu';
          }
        }
      }
    }

    // + Lấy view
    $this->content =
    $this->render('views/users/login.php');
    // + Gọi layout
    require_once 'views/layouts/main_login.php';
  }
}