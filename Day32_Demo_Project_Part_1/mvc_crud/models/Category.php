<?php
//models/Category.php
// Model quản lý category, mọi truy vấn liên quan
// đến category viết tại model này
require_once 'models/Model.php';
class Category extends Model {
  // Model mapping đến 1 bảng
  public $id;
  public $name;
//  public $description;
  public $avatar;
  public $created_at;

  public function insert() {
    // + Viết truy vấn: id, name, avatar, created_at
    // Do name và avatar có kiểu dữ liệu string nên
    // cần truyền giá trị dạng tham số để tránh lỗi bảo
    // mật SQL Injection
    $sql_insert = "INSERT INTO categories(name, avatar)
    VALUES(:name, :avatar)";
    // + Cbi obj truy vấn
    $obj_insert = $this->connection->prepare($sql_insert);
    // + Tạo mảng truyền giá trị thật cho tham số trong
    //câu truy vấn
    $inserts = [
        ':name' => $this->name,
        ':avatar' => $this->avatar
    ];
    // + Thực thi obj truy vấn, với truy vấn INSERT,
    //UPDATE, DELETE -> boolean
    // Với SELECT ko qtam đến kết quả trả về
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }

  public function getAll() {
    // + Viết truy vấn
    $sql_select_all = "SELECT * FROM categories 
ORDER BY created_at DESC";
    // + Cbi obj truy vấn
    $obj_select_all = $this->connection
        ->prepare($sql_select_all);
    // + Bỏ qua truyền giá trị
    // + Thực thi
    $obj_select_all->execute();
    // + Trả về mảng kết hợp
    $categories = $obj_select_all
        ->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
  }

  public function delete($id) {
    // Code xóa bản ghi theo $id
  }

  public function getCategoryById($id) {
    // + Viết truy vấn, ko cần tạo dạng tham số vì
    // chắc chắn $id là số
    $sql_select_one =
    "SELECT * FROM categories WHERE id = $id";
    // + Cbi obj truy vấn
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    // + Bỏ qua tạo mảng
    // + Thực thi
    $obj_select_one->execute();
    // + Lấy mảng kết hợp 1 chiều
    $category = $obj_select_one
        ->fetch(PDO::FETCH_ASSOC);
    return $category;
  }

  public function update($id) {
    // + Viết truy vấn dạng tham số:
    $sql_update =
  "UPDATE categories SET name = :name, avatar = :avatar
  WHERE id = $id";
    // + Cbi obj truy vấn
    $obj_update = $this->connection->prepare($sql_update);
    // + Tạo mảng gán giá trị
    $updates = [
        ':name' => $this->name,
        ':avatar' => $this->avatar
    ];
    // + Thực thi
    $is_update = $obj_update->execute($updates);
    return $is_update;
  }
}