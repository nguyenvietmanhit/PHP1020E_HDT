<?php
/**
 * demo_xdebug.php
 * Test XDebug đã hoạt động hay chưa
 * Bình thường nếu ko dùng XDebug, debug thủ công
 * bằng cách dùng hàm var_dump, print_r ...
 * -> với các website phức tạp -> rất khó, ko thể
 * nắm đc luồng chạy của web, với các CMS như
 * Wordpress , Zoomla, Magento, DRupal
 * -> XDebug rất cần thiết
 * - Chức năng cơ bản của XDebug:
 * + Tạo breakpoint: điểm dừng của chương trình
 */
phpinfo();
$number1 = 5;
$number2 = 2;
// Khi ko dùng XDebug, debug thủ công: dùng hàm
// như var_dump, die, echo pre ....
$sum = $number1 + $number2;
$sub = $number1 - $number2;
$multiple = $number1 * $number2;
$divide = $number1 / $number2;