<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
//Kiểm tra id trong database có tồn tại hay không => tiến hành xóa
// XOá dữ liệu  bảng tokenlogin => xóa bảng users
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $userId = $filterAll['id'];
    $userDetail = getRows("SELECT * FROM users WHERE id =$userId");
    if ($userDetail > 0) {
        //thực hiện xóa
        $deleteToken = delete('tokenlogin', "user_Id=$userId");
        if ($deleteToken) {
            // xóa user
            $deleteUser = delete('users', "id=$userId");
            if ($deleteUser) {
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