<?php
//views/layouts/main.php
// File layout chính của ứng dụng
// - Các nội dung động sẽ lấy từ controller để hiển thị
// , nội dung động là nội dung sẽ thay đổi theo từng
// trang
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width,initial-scale=1" />
    <title><?php echo $this->page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <div class="header">
      Đây là header
    </div>

    <div content="main-content">
<!--   Do file layout luôn đc nhúng bởi mọi phương thức,\
   nên hiển thị error tập trung ở file này -->
      <h3 style="color: red">
        <?php echo $this->error; ?>
      </h3>

      <?php
      // - Hiển thị theo cơ chế nội dung động
      // - Tại sao lại sử dụng đc $this trong file này,
      // vì file main.php này đc nhúng từ controller
      echo $this->content;
      ?>
    </div>

    <div class="footer">
      Đây là footer
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>