<?php
/**
 * configs/Database.php
 * Class chứa các hằng số kết nối CSDL theo PDO
 * Nếu file PHP mà chứa class thì nên khai báo tên
 * class trùng tên file
 * - Tạo CSDL: php1020e_mvc
CREATE DATABASE IF NOT EXISTS php1020e_mvc
CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo bảng categories:
 * id,name,avatar,description,created_at
CREATE TABLE IF NOT EXISTS categories(
 id INT(11) AUTO_INCREMENT,
 name VARCHAR(150),
 avatar VARCHAR(150),
 description TEXT,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (id)
)
 */
class Database {
  const DB_DSN = 'mysql:host=localhost;dbname=php1020e_mvc;port=3306;charset=utf8';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
}