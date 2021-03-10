<?php
require_once 'controllers/Controller.php';
//controllers/CategoryController.php
//index.php?controller=category&action=create
class CategoryController extends Controller {

  // Chức năng Thêm mới danh mục
  public function create() {
    // - Xử lý submit form phía trên HTML
    // + Debug
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    // + Xử lý submit form
    if (isset($_POST['submit'])) {
      // Tạo biến trung gian
      $name = $_POST['name'];
      $avatar_arr = $_FILES['avatar'];
      // + Validate form
      // - Tên ko đc để trống
      // - File upload phải là ảnh
      // - File upload dung lượng <= 2Mb
      if (empty($name)) {
        $this->error = 'Tên ko đc để trống';
      }
      // nếu có tải file lên
      elseif ($avatar_arr['error'] == 0) {
        // + File upload phải là ảnh
        // Lấy đuôi file
        $extension = pathinfo($avatar_arr['name'],
            PATHINFO_EXTENSION);
        $extension = strtolower($extension);
//        var_dump($extension);
        // Tạo mảng chứa đuôi file ảnh hợp lệ
        $allowed = ['png', 'jpg', 'jpeg', 'gif'];
        if (!in_array($extension, $allowed)) {
          $this->error = 'File upload phải là ảnh';
        }
        // + File upload phải <= 2Mb
        // 1Mb = 1024KB = 1024 * 1024 B
        $filesize_b = $avatar_arr['size'];
        $filesize_mb = $filesize_b / 1024 / 1024;
        // Giữ lại 2 số thập phân sau dấu .
        $filesize_mb = round($filesize_mb, 2);
        if ($filesize_mb > 2) {
          $this->error = 'File upload phải <= 2MB';
        }
      }

      // - Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
      if (empty($this->error)) {
        // Lưu tên file nếu có
        $avatar = '';
        // + Xử lý upload file nếu có
        if ($avatar_arr['error'] == 0) {
         // Tạo đường dẫn thư mục để chứa file upload
          $dir_upload = 'assets/uploads';
          // Kiểm tra nếu chưa tồn tại thư mục thì mới tạo
          if (!file_exists($dir_upload)) {
            mkdir($dir_upload);
          }
          // Tạo file mang tính duy nhất
          $avatar = time() . "-" . $avatar_arr['name'];
          // Upload file: chuyển file từ đường dẫn tạm
          // -> đường dẫn đích
          move_uploaded_file($avatar_arr['tmp_name'],
              "$dir_upload/$avatar");
        }

        // + Gọi Model để nhờ Model lưu thông tin vào
        // CSDL
      }
    }


    // - Gọi view để hiển thị form thêm mới cho user,
    // là code đầu tiên khi code chức năng
    // - View cần theo cơ chế layout động: chỉ phần
    // nội dung động theo từng trang sẽ thay đổi, còn
    // header, footer ... chung cho tất cả các trang

    // - Set các giá trị tương ứng cho các nội dung
    // động để hiển thị ra layout
    // Tiêu đề trang
    $this->page_title = 'Trang thêm mới danh mục';
    // View của trang
    $this->content =
    $this->render('views/categories/create.php');

    // - Xây dựng layout động trước:
    // views/layouts/main.php
    // - Controller gọi file layout
    require_once 'views/layouts/main.php';
  }
}