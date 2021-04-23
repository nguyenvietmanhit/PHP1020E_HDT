<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
  public function add() {
    // + Lấy id của sp truyền lên
    $product_id = $_POST['product_id'];
    var_dump($product_id);
    // + LẤy thông tin sp trong db dựa vào id
    $product_model = new Product();
    $product = $product_model
        ->getById($product_id);
    // + Tạo mảng lưu thông tin cần thiết cho giỏ
    $cart = [
        'name' => $product['title'],
        'price' => $product['price'],
        'avatar' => $product['avatar'],
        'quantity' => 1
    ];
    // + Xử lý thêm vào giỏ hàng (session)
    // Nếu giỏ hàng chưa từng tồn tại
    if (!isset($_SESSION['cart'])) {
      // Tạo mới giỏ hàng, thêm phần tử đầu tiên
//      cho giỏ
      $_SESSION['cart'][$product_id] = $cart;
    }
    // ngược lại giỏ hàng đã tồn tại
    else {
      // Nếu sp thêm vào đã tồn tại thì chỉ cập
      //nhật số lượng tăng lên 1, ko thêm phần
      //tử mới, kiểm tra product id mới thêm có
      //tồn tại trong các key của giỏ hàng hay ko
      if (array_key_exists($product_id,
          $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id]['quantity']++;
      } else {
        $_SESSION['cart'][$product_id] = $cart;
      }
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
  }
}