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
    $cartegoryId = $filterAll['id'];
    $cartegoryDetail = getRows("SELECT * FROM cartegory WHERE id =$cartegoryId");
    if ($cartegoryDetail > 0) {
        //thực hiện xóa
        $deleteToken = delete('cartegory', "id=$cartegoryId");
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
redirect('?module=auth&action=cartegoryList');