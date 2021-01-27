<?php
session_start();
require_once 'database.php';
/**
 * crud/index.php
 * Liệt kê danh sách book
 */
// Lấy tất bản ghi trong books theo chiều giảm dần của
//trường ngày tạo
// + Viết truy vấn:
$sql_select_all = "SELECT * FROM books 
ORDER BY created_at DESC";
// + Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// + Thực thi
$obj_select_all->execute();
// + Trả về mảng các bản ghi
$books = $obj_select_all
    ->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($books);
echo "</pre>";

?>
<table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Created_at</th>
    <th></th>
  </tr>
  <?php foreach($books AS $book): ?>
  <tr>
    <td><?php echo $book['id']; ?></td>
    <td><?php echo $book['name']; ?></td>
    <td><?php echo $book['amount']; ?></td>
<!--  2021-01-27 19:41:20  -->
    <td>
<!--      27/01/2021 19:41:20-->
      <?php
      echo date('d/m/Y H:i:s',
          strtotime($book['created_at']));
      ?>
    </td>
    <td>
      <a href="detail.php?id=<?php echo $book['id']?>">Xem</a>
      <a href="update.php?id=<?php echo $book['id']?>">Sửa</a>
      <a href="delete.php?id=<?php echo $book['id']?>"
         onclick="return confirm('Xóa?')">Xóa</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
