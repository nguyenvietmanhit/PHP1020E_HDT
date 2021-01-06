# Comment trong SQL
# 1 - Tạo CSDL, sau khi tạo cần F5 trang để thấy CSDL
CREATE DATABASE IF NOT EXISTS php1020e_sql
CHARACTER SET utf8 COLLATE utf8_general_ci;
# 2 - Sau khi tạo CSDL, cần truy cập vào CSDL đó thì mới
# thao tác các hành động khác đc
# 3 - Truy cập CSDL trong command line, ko có tác dụng với
# giao diện đồ họa
USE php1020e_sql;
# 4 - Xóa CSDL
# DROP DATABASE abc;
# 5 - Các kiểu dữ liệu trong MySQL, có 3 kiểu chính: số,
# kiểu chuỗi, thời gian
# - Kiểu số: lưu giá trị số, hay dùng nhất là TINYINT và INT
# TINYINT: lưu các số từ -128 -> 127, tốn 1 Byte
# INT: lưu các số ~2 tỉ -> 2 tỉ, tốn 4 Byte
# FLOAT/DOUBLE : lưu số thực
# - Kiểu chuỗi: lưu giá trị chuỗi, hay dùng nhất là VARCHAR
# hay TEXT
# VARCHAR: lưu chuỗi có giới hạn ký tự, mặc định tối đa 255
#ký tự với với các phiên bản MySQL cũ
# TEXT: lưu chuỗi ko giới hạn ký tự (!~ 65000 ký tự)
# - Kiểu thời gian: lưu thời gian dưới dạng ngày tháng giờ
# phút giây
# DATETIME: lưu Date và Time thủ công
# TIMESTAMP: sinh Date và Time tự động
# Chú ý về format Date và Time trc khi lưu vào CSDL, bắt buộc
# YYYY-MM-DD H:i:s
#VD: 30/12/2020 19:37:12 -> sai
# 2020-12-30 19:37:12 -> đúng
# 6 - Tạo bảng:
# + categories:
#id: int (11)
#name: VARCHAR (100)
#created_at: ngày giờ tạo bản ghi, sinh tự động TIMESTAMP
# + products:
# id: khóa chính, int(11), tự động tăng lên 1
# name: VARCHAR (150)
# price: INT(11)
# status: 0 - ẩn, 1- hiển thị -> TINYINT
# category_id: khóa ngoại của bảng, liên kết với bảng, quy tắc viết tên khóa ngoại:
<tên-bảng-số-ít>_id
    # categories, INT(11)
    # created_at: ngày tạo bản ghi, sinh tự động TIMESTAMP
    # + Tạo bảng categories:
    CREATE TABLE IF NOT EXISTS categories(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    # set khóa chính, khóa ngoại nếu có
    PRIMARY KEY (id)
    );
    # Tạo bảng products
    CREATE TABLE IF NOT EXISTS products(
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(200),
    price INT(11),
    status TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    category_id INT(11),
    # khai báo khóa chính,khóa ngoại nếu có
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
    );
    # 7 - Xóa bảng
    # DROP TABLE abc;
    # 8 - Insert dữ liệu vào bảng
    # + Chỉ thêm dữ liệu đối với các trường ko phải sinh tự động
    # + Giá trị thêm phải thể hiện tương ứng với kiểu dữ liệu
    # của trường đó, nếu là số -> giá trị là số, nếu là chuỗi
    # dùng nháy đơn hoặc kép, nếu là ngày tháng -> giống như chuỗi
    INSERT INTO categories(name)
    VALUES('Thể thao');

    INSERT INTO categories(name)
    VALUES('Thể thao'), ('Thế giới'), ('Sức khỏe');
    # 9 - LẤy dữ liệu từ bảng: SELECT
    # + Lấy tất cả bản ghi và tất cả trường của bảng categories
    SELECT * FROM categories;
    # + Lấy cụ thể từng trường của bảng
    SELECT id, name FROM categories;
    # + Lấy giới hạn bản ghi tính từ bản ghi đầu tiên: LIMIT
    SELECT * FROM categories LIMIT 4;
    # + LẤy giới hạn bản ghi tính từ bản ghi cụ thể:
    # LIMIT begin,limit
    SELECT * FROM categories LIMIT 3,10;#bản ghi đầu tiên = 0
    # + Lấy theo điều kiện: WHERE
    SELECT * FROM categories WHERE id < 10;
    # + Lấy theo nhiều điều kiện: AND &&, OR ||
    SELECT * FROM categories WHERE id >= 1 AND id <= 5;
    # 10/ Cập nhật bản ghi: UPDATE
    # - Luôn cần chỉ định điều kiện khi UPDATE/DELETE, nếu ko thì
    # đang thao tác với toàn bộ bản ghi đang có!
    # vd: update name=abc với các bản ghi có id < 5
    UPDATE categories SET name='abc' WHERE id < 5;
    # 11/ Xóa bản ghi: DELETE
    # - Luôn cần chỉ định điều kiện khi UPDATE/DELETE, nếu ko thì
    # đang thao tác với toàn bộ bản ghi đang có!
    #vd: xóa các bản ghi có id > 10
    DELETE FROM categories WHERE id > 10;
    # 4 truy vấn bản của 1 hệ thống web bất kỳ: INSERT, SELECT,
    # UPDATE, DELETE -> Thêm - Liệt kê - Sửa - Xóa
    # 12 / Từ khóa LIKE, dùng với SELECT kết hợp WHERE
    # Tìm kiếm đúng bằng: =
    SELECT * FROM categories WHERE id = 5;
    # Tìm kiếm tương đối: chứa chuỗi tìm kiếm là đc -> dùng LIKE
    #VD: tìm các bản ghi có name chứa chuỗi th: abcth, athe, th12122,...
    SELECT * FROM categories WHERE name LIKE '%th%';
    SELECT * FROM categories WHERE name LIKE 'abc%';
    SELECT * FROM categories WHERE name LIKE '123%abc';
    # LIKE ko nên dùng cho các website có số bản ghi lớn
    #13 / Sắp xếp: ORDER BY theo hướng DESC - descending giảm dần, ASC - ascending tăng dần
    #vd: lấy bản ghi theo chiều giảm dần của id
    SELECT * FROM categories ORDER BY id DESC;
    SELECT * FROM categories ORDER BY created_at DESC;
    #14 - Từ khóa IN: thay thế cho nhiều điều kiện #vd: OR
    #vd: lấy bản ghi có id = 1 hoặc id = 2 hoặc id = 4
    SELECT * FROM categories WHERE id = 1 OR id = 2 OR id = 4;
    SELECT * FROM categories WHERE id IN (1, 2, 4);
    #15 - BETWEEN: thay thế cho >= AND <=
    #vd: lấy bản ghi có id >= 1 và id <= 5
    SELECT * FROM categories WHERE id >= 1 AND id <= 5;
    SELECT * FROM categories WHERE id BETWEEN 1 AND 5;
    #16 - Hàm COUNT: đếm số bản ghi trả về từ SELECT
    #vd: đếm tổng số bản ghi
    SELECT COUNT(id) FROM categories;
    # đặt tên khác cho trường: AS
    SELECT COUNT(id) AS count_id FROM categories;
    #17 - Hàm MIN, MAX, AVG, SUM ...
    SELECT MIN(id) AS min_id FROM categories;
    #18 - Truy vấn JOIN:
    # Truy vấn JOIN
    # Tạo CSDL joins_demo
    CREATE DATABASE IF NOT EXISTS joins_demo
    CHARACTER SET utf8
    COLLATE utf8_general_ci;
    # CLick vào CSDL, import file joins_demo.sql vào

    # Truy vấn JOIN
    # Tạo CSDL joins_demo
    CREATE DATABASE IF NOT EXISTS joins_demo
    CHARACTER SET utf8
    COLLATE utf8_general_ci;
    # CLick vào CSDL, import file joins_demo.sql vào
    # products và categories
    # Thực tế 1 website cần truy cập vào nhiều bảng thì mới lấy đc dữ liệu -> dùng cơ chế JOIN của SQL để truy vấn
    #VD: lấy thông tin tất cả sp đang có kèm theo tên danh mục tương ứng với sản phẩm đó
    # Có 3 cơ chế join chính: INNER, LEFT, RIGHT , hay gặp nhất là INNER -> LEFT
    # JOIN hoạt động khi 2 bảng có mối quan hệ, khóa ngoại
    # Quy tắc đặt tên khóa ngoại: <tên-bảng-số-ít>_id. VD:
        #product_id, category_id, user_id, news_id
        # JOIN hoạt động với SELECT
        # - Cần thêm tên bảng trước tên trường khi JOIN
        # - Bảng FROM là bảng chứa khóa ngoại
        # - Cơ chế INNER JOIN hoạt động như sau: lấy bảng gốc là bảng đc FROM (products) , đi qua từng bản ghi của bảng gốc này, tìm trong bảng đang join (categories) xem có bản ghi nào tương ứng ko, dựa vào giá trị của khóa ngoại, nếu tồn tại trả về bản ghi, nếu ko -> ko trả về -> đảm bảo chặt chẽ về mặt dữ liệu
        #SELECT products.*, categories.* FROM products
        #INNER JOIN categories
        #ON products.category_id = categories.id

        # Join theo cơ chế LEFT: giống INNER, chỉ khác ở điểm duy nhất là khi đi qua từng bản ghi của bảng gốc (FROM/products), nếu bảng liên quan ko có bản ghi tương ứng thì vẫn lấy ra đc, nhưng giá trị sẽ bằng NULL
        #SELECT products.*, categories.* FROM products
        #LEFT JOIN categories
        #ON products.category_id = categories.id

        # Join theo cơ chế RIGHT: lấy bảng đang join làm bảng gốc (categories), đi qua từng phần tử của bảng gốc, tìm trong bảng liên kết (products),
        # nếu ko tìm thấy bản ghi tương ứng thì vẫn trả về đc (giống LEFT)
        # nhưng giá trị sẽ bằng NULL
        SELECT products.*, categories.* FROM products
        RIGHT JOIN categories
        ON products.category_id = categories.id;
        # Hay dùng nhất vẫn là INNER và LEFT
        SELECT products.*, categories.name AS category_name FROM products
        INNER JOIN categories
        ON products.category_id = categories.id
        WHERE products.id > 10;
        # 2 - Từ khóa GROUP BY: nhóm giá trị của cột để phục vụ cho
        # tính toán
        # VD: Tìm mỗi id danh mục đang có bao nhiêu sản phẩm tương ứng
        SELECT category_id, COUNT(*) AS count_product
        FROM products GROUP BY category_id;




