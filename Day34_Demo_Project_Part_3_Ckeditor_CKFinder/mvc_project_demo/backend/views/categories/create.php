<?php
//backend/views/categories/create.php
?>
<h1>Form thêm mới danh mục</h1>
<form method="post" action="">
  Nhập tên:
  <input type="text" name="name" value="" />
  <br />
  Nhập mô tả:
  <textarea name="des" class="form-control"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu"
         class="btn btn-primary" />
</form>
<!--
- Với các phần mô tả, thường sẽ cần tải ảnh lên
cùng với text, với các input thô HTML ko hỗ trợ
chỉnh sửa text trực quan và ko hỗ trợ sẵn upload
ảnh -> cần tích hợp trình soạn thảo và trình
upload ảnh vào -> CKEditor + CKFinder
- CkEditor và CKFinder chỉ tích hợp đc với
textarea thông qua name của nó
- Cách tích hợp: tham khảo slides đi kèm
+ Nhúng file ckeditor/ckeditor.js vào layout main
- Tích hợp CKFinder vào CKEditor để có thể tải
ảnh từ local lên
-->