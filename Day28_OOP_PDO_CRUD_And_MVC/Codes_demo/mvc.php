<?php
/**
 * mvc.php
 * 1/ Mô hình MVC
 * - Mô hình kiến trúc phần mềm 3 lớp: Model - View -
 * Controller
 * - Tất cả framework, CMS của PHP đều dựa trên MVC để
 * xây dựng
 * - MVC tách biệt trang web làm 3 thành phần riêng biệt
 * - MVC dựa hoàn toàn trên OOP
 * 2/ Các thành phần MVC
 * - M - Model: tương tác với CSDL
 * - V - View: hiển thị giao diện tới ng dùng
 * - C - Controller: trung gian giữa Model và View, xử
 * lý logic và luân chuyển dữ liệu giữa Model và View
 * 3 / Luồng xử lý dữ liệu thực tế
 * 4 / Cấu trúc thư mục MVC
 * - Tùy ý, ai cũng có thể tạo ra 1 mô hình MVC của riêng
 * mình
 * - MVC cần thay đổi rất nhiều về mặt tư duy
 * 5 /Demo chức năng CRUD category theo mô hình MVC
 * 1 - Tạo cấu trúc thư mục MVC
 * mvc_demo/assets/ : chứa các css,js, images, font ...
 *                /css/style.css: file style chính
 *                /js/script.js: file js chính
 *                /images: chứa các ảnh tĩnh
 *                /webfonts
 *         /configs: chứa các cấu hình hệ thống
 *                 /Database.php: class chứa hằng số kết
 *                                nối CSDL
 *         /controllers: chứa các controller - C
 *                     /CategoryController.php
 *         /models: chứa các model - M
 *                /Category.php
 *         /views: chứa các view - V
 *               /categories
 *                          /index.php: liệt kê
 *                          /create.php: thêm mới
 *                          /update.php: sửa
 *                          /detail.php: xem
 *               /layouts: chứa các file layout
 *                      /main.php: file layout chính
 *         /.htaccess: cấu hình truy cập trang, rewrite url ...
 *         /index.php: file index gốc của ứng dụng
 */