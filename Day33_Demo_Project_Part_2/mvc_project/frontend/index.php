<?php
session_start();
//backend/index.php
// Set múi giờ
date_default_timezone_set
('Asia/Ho_Chi_Minh');
// URL MVC phải có dạng sau:
//index.php?controller=category&action=create
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home';
$action = isset($_GET['action']) ?
    $_GET['action'] : 'index';
// - Biến đổi controller thành tên file
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// - Tạo biến lưu đường dẫn đến file controller
$path_controller = "controllers/$controller.php";
if (!file_exists($path_controller)) {
  die('Trang bạn tìm ko tồn tại');
}

require_once "$path_controller";
// - Tạo đối tượng từ class
// bên trong file controller
$obj = new $controller();

if (!method_exists($obj, $action)) {
  die("Ko tồn tại phương thức 
  $action của controller $controller");
}
$obj->$action();

