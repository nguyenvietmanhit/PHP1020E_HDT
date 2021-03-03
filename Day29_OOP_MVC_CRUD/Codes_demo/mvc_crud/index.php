<?php
session_start();
// Khởi tạo session
/**
 * localhost/mvc_crud/index.php
 * Xây dựng ứng dụng CRUD danh mục dựa trên mô hình
 * MVC
 * 1 - Tạo cấu trúc thư mục MVC
 * mvc_crud/
 *         /index.php: file index gốc của ứng dụng
 *         /.htaccess: rewrite url, cấu hình ứng dụng
 *         /assets: chứa các file frontend của ứng dụng
 *                /css:
 *                    /style.css: file css chính
 *                /images: chứa các ảnh tĩnh
 *                /js:
 *                   /script.js: file js chính
 *                /fonts
 *                /webfonts
 *         /configs: chứa file cấu hình hệ thống:
 *                /Database.php : class chứa hằng số
 *                                kết nối CSDL
 *         /controllers: chứa các class controller - C
 *                     /Controller.php: controller cha
 *                     /CategoryController.php
 *                     /ProductController.php
 *         /models: chứa class model - M
 *                /Model.php: model cha
 *                /Category.php
 *                /Product.php
 *         /views: chứa các view
 *               /categories/
 *                          /index.php: list
 *                          /create.php: thêm mới
 *                          /update.php: sửa
 *                          /detail.php: chi tiết
 *               /products/
 *                         /index.php: list
 *                          /create.php: thêm mới
 *                          /update.php: sửa
 *                          /detail.php: chi tiết
 *               /layouts: bố cục trang
 *                       /main.php: file layout chính
 *
 * 2 - Đi code
 * + mvc_crud/index.php: là file code đầu tiên của ứng
 * dụng MVC, file này có nhiệm vụ phân tích url -> gọi
 * controller tương ứng để xử lý
 * Các url trong MVC đều phải tuân theo quy tắc do bạn
 * định nghĩa ra, với MVC hiện tại mọi url đều phải có
 * định dạng như sau:
 * index.php?controller=<tên controller sẽ xử lý>&action=<tên phương thức tương ứng của controller>
 * VD: url thêm mới danh mục
 * index.php?controller=category&action=create
 * Url trên tham chiếu đến CategoryController và
 * phương thức = create
 * VD: URl thêm mới sản phẩm
 * index.php?controller=product&action=create
 * + Quy tắc đặt tên file và class trong MVC
 * Với file controller: BookController, CategoryController
 * , ProductController, UserController ...
 * Với file model: Book.php, Category.php, Product.php,
 * User.php ....
 * Chú ý tên file và tên class trùng nhau
 * + File index gốc là nơi đầu tiên nhận request từ
 * trình duyệt gửi lên, khởi tạo các thông tin chung của
 * hệ thống tại file này, ví dụ khởi tạo session, set
 * múi giờ hệ thống ...
 * + Chạy ứng dụng MVC ntn ? bắt buộc phải chạy từ file
 * index gốc của ứng dụng, mọi quy tắc đường dẫn nhúng
 * file trong MVC đều cần tư duy là đang đứng từ file
 * index gốc để nhúng
 */
// - Set múi giờ cho hệ thống
//echo time();
//d: ngày, m: tháng, Y: 4 số của năm, y: 2 số cuối của năm
//H: giờ, i: phút, s: giây
// Cần set lại múi giờ Việt Nam cho hệ thống
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('d-m-Y H:i:s');

// - Phân tích url, lấy giá trị của controller và action
// Demo với url thêm mới danh mục
// index.php?controller=category&action=create
// + Lấy giá trị của controller, nếu không truyền lên
//tham số controller lên url -> set controller mặc định
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'home'; //category
// + Lấy giá trị của action tương tự
$action = isset($_GET['action']) ?
    $_GET['action'] : 'index';//create
// Debug
//index.php?controller=category&action=create
//var_dump($controller);
//var_dump($action);
// - Chuyển đổi biến controller thành tên file controller
// tương ứng để chuẩn bị nhúng file controller
// category -> CategoryController
$controller = ucfirst($controller); //Category
//var_dump($controller);
$controller .= "Controller"; //CategoryController
// Tạo 1 biến chứa đường dẫn tới file controller sẽ nhúng
$path_controller = "controllers/$controller.php";
//controllers/CategoryController.php
//var_dump($path_controller);
// - Kiểm tra nếu đường dẫn tới controller ko tồn tại
// -> not found -> 404
if (!file_exists($path_controller)) {
    die("Trang bạn tìm ko tồn tại");
}

// - Nhúng file controller để sử dụng class bên trong file
//này
require_once "$path_controller";

// - Khởi tạo đối tượng từ class controller
$obj = new $controller();

//index.php?controller=category&action=create
// - Dùng đối tượng vừa khởi tạo gọi/truy cập phương thức
// của class đó
if (!method_exists($obj, $action)) {
  die("Ko tồn tại phương thức $action của controller 
  $controller");
}

$obj->$action();
