<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $productId = $filterAll['id'];
    $productDetail = getRows("SELECT * FROM cart_details WHERE product_Id =$productId");
    if ($productDetail > 0) {
        setFLashData('smg', 'Xóa thất bại!!');
        setFLashData('smg_type', 'danger');
    }else{
        $dataUpdate = [
            'status' => 0,
        ];
    
        $condition = "id=$productId";
        $updateStatus = update('product', $dataUpdate, $condition);
        setFLashData('smg', 'Ẩn thành công!!');
        setFLashData('smg_type', 'success');
    }
}
redirect('?module=auth&action=productList');

