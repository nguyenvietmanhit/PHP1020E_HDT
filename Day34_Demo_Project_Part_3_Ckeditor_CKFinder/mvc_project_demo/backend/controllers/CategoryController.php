<?php
//backend/controllers/CategoryController.php
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
  //index.php?controller=category&action=create
  public function create() {
    echo "Create";
    // Gọi layout để hiển thị nội dung view
    // Cách ghép layout từ template có sẵn
    // - Copy thư mục: mvc_project/backend/assets
    // paste vào thư mục assets của project hiện
    //tại
    // - Lấy nội dung view
  $this->content =
  $this->render('views/categories/create.php');
  // - Gọi layout để hiển thị view
    require_once 'views/layouts/main.php';
  }
}