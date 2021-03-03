<?php
//configs/Database.php
// Class chứa các hằng số kết nối CSDL
// MVC ưu tiên sử dụng PDO để kết nối
// - Viết truy vấn tạo CSDL và tạo bảng

/**\
 * - Tạo CSDL
 CREATE DATABASE IF NOT EXISTS php1020e_mvc
 CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo bảng categories có các trường sau: id, name,
 * avatar, created_at
 *
  CREATE TABLE IF NOT EXISTS categories(
  id INT(11) AUTO_INCREMENT,
  name VARCHAR(100),
  avatar VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
 );
 */
class Database {
  // Data source name
  const DB_DSN = 'mysql:host=localhost;dbname=php1020e_mvc;charset=utf8';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
}
