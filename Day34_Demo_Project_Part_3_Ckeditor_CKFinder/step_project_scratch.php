<?php
/**
 * step_project+_scratch.php
 * Các bước xây dựng 1 website từ đầu
 * + Lên ý tưởng website: bán hàng ...
 * + Lên số lượng thành viên sẽ code
 * + Đăng ký tên đề tài với giảng viên: để đc
 * cấp account đẩy code lên host
 * + LÊn giao diện tĩnh:
 * - frontend: user, tham khảo chức năng trên các
 * website để hình dung dễ hơn
 * - backend: admin: AdminLTE
 * + Phân tích CSDL từ giao diện tĩnh:
 * - Lướt qua từng file .html , nhìn giao diện
 * , đi từ trên xuống dưới để phân tích ra các
 * bảng cần thiết
 * Dựa vào kinh nghiệm là chính, 1 phần dựa vào
 * hiển thị trên trang
 * Nhìn giao diện, tự hỏi xem các thông tin hiển
 * thị trên giao diện có cần xử lý động ko?
 * Nếu xử lý động -> tạo 1 trường tương ứng trong
 * bảng tương ứng
 * -> phân tích trang chủ:
 * + Bảng lưu thông tin menu: menus, có 2 kiểu
 * trường của bảng: nghiệp vụ, CSDL
 * id: khóa chính
 * menu_name: lưu tên menu
 * menu_link: link của menu
 * status: trang thái: 0 - ẩn, 1 - hiện
 * created_at:
 * updated_at
 * + Bảng lưu thông tin sản phẩm: products, để
 * biết đc các trường nghiệp vụ của products, cần
 * xem tất cả các trang HTML có product
 * id
 * created_at
 * updated_at
 * name
 * avatar
 * price
 * content: TEXT
 * amount: số lượng sp trong kho
 * category_id: khóa ngoại, <tên-bảng-số-ít>_id
 * status: 0 - ẩn, 1 - hiện
 * seo_title: seo tên sp
 * seo_description: seo description của sp
 * seo_keywords: seo các từ khóa liên quan đến sp
 * + Bảng lưu thông tin danh mục: categories
 * id
 * created_at
 * updated_at
 * name
 * avatar
 * description
 * + Bảng lưu thông tin tin tức: news
 * id
 * created_at
 * updated_at
 * name
 * avatar
 * summary : mô tả ngắn 255
 * content
 * seo_title
 * seo_description
 * seo_keywords
 * status: 0 - ẩn, 1 - hiện
 * + BẢng lưu thông tin đơn hàng: orders
 * id
 * created_at
 * updated_at
 * fullname
 * address
 * mobile
 * email
 * note
 * method: lưu phương thức thanh toán: 0 - Thanh
 * toán trực tuyến, 1 - COD -> TINYINT
 * price_total: tổng giá trị đơn hàng
 * payment_status: trạng thái thanh toán đơn hàng:
 * 0 - Chưa thanh toán, 1 - Đã thanh toán, 2 -
 * Đang giao hàng, 3 - Đang trả góp
 * user_id: lưu id của ng mua hàng khi user đã
 * login
 * + Bảng lưu thông tin chi tiết của đơn hàng:
 * order_details, chú ý ko liên kết bảng này với
 * bảng products để tránh việc sai lệch dữ liệu
 * khi lấy thông tin sp:
 * id
 * created_at
 * updated_at
 * product_name
 * product_price
 * quantity
 * order_id: khóa ngoại,liên kết với bảng orders
 * + Lưu thông tin user: users
 * id
 * created_at
 * updated_at
 *  first_name
 * last_name
 * phone
 * email
 * avatar
 * job
 * last_login
 * facebook
 * status: 0 - active, 1 - block
 * username
 * password
 * + Tạo CSDL php1020e_project
 CREATE DATABASE IF NOT EXISTS php1020e_project
 CHARACTER SET utf8 COLLATE utf8_general_ci;
 * + Copy nội dung file file_create_db.html, chạy
 * trên PHPMyadmin để tạo bảng
 * + Tạo sơ đồ quan hệ giữa các bảng sử dụng
 * Designer của PHPMyadmin, bắt buộc phải khai
 * báo tường mình foreign key khi viết truy vấn
 * tạo mảng
 * + Tạo cấu trúc MVC cho website: tách làm 2 thư
 * mục frontend và backend, cấu trúc thư mục
 * giống hệt nhau
 * mvc_project/
 *            /frontend
 *            /backend/
 *                    /assets/
 *                           /css
 *                           /js
 *                           /images
 *                    /configs
 *                            /Database.php
 *                    /controllers/
 *                                /Controller.php
 *                                /CategoryController.php
 *                    models/
 *                          /Model.php
 *                          /Category.php
 *                    views/
 *                         /categories/
 *                                    /create.php
 *                                    /update.php
 *                                    /detail.php
 *                                    /index.php
 *                        /layouts/
 *                                /main.php
 *                    .htaccess
 *                    index.php
 *
 * + CODEEEEEEEEEEEEEEEEEE
 * Code backend trước để có dữ liệu, sau đó mới
 *code frontend để hiển thị, tùy chức năng
 *Code CRUD trc: danh mục, sp, tin tức
 * + Code backend: code MVC code file nào trước?
 * index.php gốc luôn là file đầu tiên sẽ code
 * Code Controller
 * Code View:
 * + Tạo file layout, copy nội dung
 * file .html chính của template vào file layout
 */