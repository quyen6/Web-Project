<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (isset($_POST['code']) && isset($_POST['code_status'])) {
    $code_cart = $_POST['code'];
    $code_status = $_POST['code_status'];

    $dataUpdate = [
        'cart_status' => $code_status,
    ];

    $condition = "code_cart=$code_cart";
    $updateStatus = update('shopping_cart', $dataUpdate, $condition);
}
redirect('?module=auth&action=cartList');
