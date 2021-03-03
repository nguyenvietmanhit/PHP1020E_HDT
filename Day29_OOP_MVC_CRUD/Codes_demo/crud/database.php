<?php
/**
 * crud/database.php
 * CRUD qly sách với PDO
 * - CSDL: php1020e_pdo, bảng books:id,name,
 * amount,created_at
 CREATE DATABASE IF NOT EXISTS php1020e_pdo
 * - crud/database.php
 *     /create.php
 *     /update.php
 *     /detail.php
 *     /delete.php
 *     /index.php
 */
// - Kết nối CSDL MySQL bằng PDO
// Data source name
const DB_DSN = 'mysql:host=localhost;dbname=php1020e_pdo;port=3306;charset=utf8';
// Username
const DB_USERNAME = 'root';
//Password
const DB_PASSWORD = '';
// - Kết nối trong try catch
try {
  $connection = new PDO(DB_DSN,
      DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
  die("Lỗi kết nối: " . $e->getMessage());
}
echo "Kết nối CSDL php1020e_pdo thành công";
