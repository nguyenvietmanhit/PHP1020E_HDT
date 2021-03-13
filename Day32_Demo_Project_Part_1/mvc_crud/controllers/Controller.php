<?php
//controllers/Controller.php
// Là class cha của các controller khác
class Controller {
  // Chứa nội dung của file bất kỳ
  public $content;
  // Tiêu đề trang
  public $page_title;

  // Chứa nội dung lỗi trên trang: validate ...
  public $error;

  // Phương thức lấy nội dung file bất kỳ theo cơ chế
  // truyền biến từ bên ngoài vào
  // - $file_path: đường dẫn tới file muốn lấy nội dung
  // - $variables: mảng dữ liệu truyền vào file trên
  public function render($file_path, $variables = []) {
    // Giải nén mảng data từ bên ngoài để file sử dụng
    extract($variables);
    // Sử dụng cơ chế bộ nhớ đệm để lưu nội dung file
    ob_start();
    // Nhúng file để lưu lại nội dung file
    require "$file_path";
    // Kết thúc lưu vào bộ nhớ đệm, trả về nội dung file
    $render_view = ob_get_clean();
    return $render_view;
  }
}