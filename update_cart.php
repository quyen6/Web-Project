<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        if (!isset($_SESSION['cart_count'])) {
            $_SESSION['cart_count'] = 0;
        }
        $_SESSION['cart_count']++;
        echo $_SESSION['cart_count'];  // Trả về giá trị cập nhật để hiển thị trên trang
    }
} else {
    echo 'Invalid request method.';
}
