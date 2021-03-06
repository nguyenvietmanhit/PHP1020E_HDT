<!--views/categories/create.php-->
<!--categories: id, name, avatar, created_at-->

<h1>Form thêm mới danh mục</h1>
<form action="" method="post"
      enctype="multipart/form-data">
  Tên danh mục:
  <input type="text" name="name" value="" />
  <br />
  Ảnh đại diện:
  <input type="file" name="avatar" />
  <br />
  <input type="submit" name="submit" value="Lưu" />
</form>