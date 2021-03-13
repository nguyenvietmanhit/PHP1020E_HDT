<?php
//views/categories/update.php
?>
<h1>Form update danh mục</h1>
<form action="" method="post"
      enctype="multipart/form-data">
  Tên danh mục:
  <input type="text" name="name"
         value="<?php echo $category['name']; ?>" />
  <br />
  Ảnh đại diện:
  <input type="file" name="avatar" />
  <img src="assets/uploads/<?php echo $category['avatar']?>"
  height="100px" />
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>
