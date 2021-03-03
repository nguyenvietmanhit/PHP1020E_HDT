<?php
session_start();
require_once 'database.php';
/**
 * crud/create.php
 * Form thêm mới sách
 * books: id, name, amount, created_at
 */
// Xử lý submit form
// + Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Khai báo lỗi
$error = '';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $amount = $_POST['amount'];
  // + Validate form: luôn phải validate bằng PHP, ko đc
  //dựa hoàn toàn vào JS
  // + Lưu vào CSDL chỉ khi ko có lỗi
  if (empty($error)) {
    // + Viết truy vấn dạng tham số để tránh lỗi bảo mật
    // SQL Injection
    $sql_insert = "INSERT INTO books(name, amount) 
VALUES (:name, :amount)";
    // + Cbi obj truy vấn
    $obj_insert = $connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị thật cho tham số trong
    //câu truy vấn
    $inserts = [
        ':name' => $name,
        ':amount' => $amount
    ];
    // + Thực thi
    $is_insert = $obj_insert->execute($inserts);
    var_dump($is_insert);
    if ($is_insert) {
      $_SESSION['success'] = 'Thêm mới thành công';
      header('Location: index.php');
      exit();
    } else {
      $error = 'Thêm thất bại';
    }
  }
}
?>
<form action="" method="post">
  Nhập tên sách:
  <input type="text" name="name" required />
  <br />
  Số lượng sách:
  <input type="number" name="amount" min="0" required />
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>
