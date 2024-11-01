<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (isset($_POST['id']) && isset($_POST['status'])) {
    $product_Id = $_POST['id'];
    $product_status = $_POST['status'];

    $dataUpdate = [
        'status' => $product_status,
    ];

    $condition = "id=$product_Id";
    $updateStatus = update('product', $dataUpdate, $condition);
}
redirect('?module=auth&action=productList');
