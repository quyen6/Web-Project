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
    $brandId = $filterAll['id'];
    $brandDetail = getRows("SELECT * FROM brand WHERE id =$brandId");
    if ($brandDetail > 0) {
        //thực hiện xóa
        $deleteToken = delete('brand', "id=$brandId");
        setFLashData('smg', 'Xóa thành công !!');
        setFLashData('smg_type', 'success');
    } else {
        setFLashData('smg', 'Xóa thất bại!!');
        setFLashData('smg_type', 'danger');
    }
} else {
    setFLashData('smg', 'Liên kết không tồn tại!!');
    setFLashData('smg_type', 'danger');
}
redirect('?module=auth&action=brandList');