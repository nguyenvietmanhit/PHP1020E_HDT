<?php
require_once 'models/Model.php';
class User extends Model {
  public $username;
  public $password;

  public function getUser($username) {
    $sql_select_one =
"SELECT * FROM users WHERE username = :username";
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    $selects = [
        ':username' => $username
    ];
    $obj_select_one->execute($selects);
    $user = $obj_select_one
        ->fetch(PDO::FETCH_ASSOC);
    return $user;
  }


  public function register() {
    // + Viết truy vấn
    $sql_insert = "
  INSERT INTO users(username, password) 
  VALUES(:username, :password)";
    // + Cbi obj truy vấn
    $obj_insert = $this->connection
        ->prepare($sql_insert);
    // + Tạo mảng
    $inserts = [
        ':username' => $this->username,
        ':password' => $this->password,
    ];
    // + Thực thi
    $is_insert = $obj_insert->execute($inserts);
    return $is_insert;
  }

  public function isUserExists($username) {
    // + Viết truy vấn
    $sql_select_one = "SELECT * FROM users
WHERE username=:username";
    // + Cbi obj truy vấn
    $obj_select_one = $this->connection
        ->prepare($sql_select_one);
    // + Tạo mảng
    $selects = [
        ':username' => $username
    ];
    // + Thực thi
    $obj_select_one->execute($selects);
    // + Trả về mảng user
    $user = $obj_select_one
        ->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return TRUE;
    }
    return FALSE;
  }
}