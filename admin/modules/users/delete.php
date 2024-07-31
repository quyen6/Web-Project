<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
//Kiểm tra id trong database có tồn tại hay không => tiến hành xóa
// XOá dữ liệu  bảng tokenlogin => xóa bảng users
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $adminId = $filterAll['id'];
    $adminDetail = getRows("SELECT * FROM administrators WHERE id =$adminId");
    if ($adminDetail > 0) {
        //thực hiện xóa
        $deleteToken = delete('tokenlogin', "admin_Id=$adminId");
        if ($deleteToken) {
            // xóa admin
            $deleteAdmin = delete('administrators', "id=$adminId");
            if ($deleteAdmin) {
                setFLashData('smg', 'Xóa thành công !!');
                setFLashData('smg_type', 'success');
            } else {
                setFLashData('smg', 'Xóa thất bại !!');
                setFLashData('smg_type', 'danger');
            }
        }
    } else {
        setFLashData('smg', 'Người dùng không tồn tại!!');
        setFLashData('smg_type', 'danger');
    }
} else {
    setFLashData('smg', 'Liên kết không tồn tại!!');
    setFLashData('smg_type', 'danger');
}
redirect('?module=users&action=list');