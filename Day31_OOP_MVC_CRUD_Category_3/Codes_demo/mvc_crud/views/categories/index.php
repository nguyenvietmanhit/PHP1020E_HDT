<?php
//views/categories/index.php
// Trang danh sách
//echo "<pre>";
//print_r($categories);
//echo "</pre>";
?>
<a href="index.php?controller=category&action=create">
    Thêm mới
</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
  <?php foreach ($categories AS $category): ?>
      <tr>
          <td><?php echo $category['id']; ?></td>
          <td><?php echo $category['name']; ?></td>
          <td>
              <img src="assets/uploads/<?php echo $category['avatar'] ?>"
                   height="100px"/>
          </td>
          <td>
              <!--              10/03/2021 20:10:10-->
            <?php
            echo date('d/m/Y H:i:s',
                strtotime($category['created_at']));
            ?>
          </td>
          <td>
              <a
                      href="index.php?controller=category&action=detail&id=<?php echo $category['id']?>">
                  Chi tiết
              </a> &nbsp;
              <a href="index.php?controller=category&action=update&id=<?php echo $category['id']?>">
                  Sửa
              </a> &nbsp;
              <a href="index.php?controller=category&action=delete&id=<?php echo $category['id']?>"
                 onclick="return confirm('Bạn muốn xóa ko ?')">
                  Xóa
              </a>
          </td>
      </tr>
  <?php endforeach; ?>
</table>
