<?php
/**
 * note.php
 * 1 - Chức năng giỏ hàng
 * + Mục đích giống như đi siêu thị
 * + Lưu giỏ hàng theo cơ chế nào ??
 * database
 * session -> dùng session là đơn giản nhất
 * cookie
 * + Demo thêm sp vào giỏ bằng ajax -> code nhiều
 * hơn để đánh đổi trải nghiệm người dùng
 * + Giỏ hàng quan trong nhất ở cấu trúc của giỏ
 * hàng -> dùng session -> cấu trúc cho session này
 * + Cấu trúc giỏ hàng demo như sau
 */
$_SESSION['cart'] = [
    5 => [
        'name' => 'SP 1',
        'price' => 3000,
        'avatar' => 'sp1.jpg',
        'quantity' => 4
    ],
    2 => [
        'name' => 'SP2',
        'price' => 2000,
        'avatar' => 'sp2.jpg',
        'quantity' => 1
    ]
];