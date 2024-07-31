<!-- kích hoạt tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
layout('header-login');
$token = filter()['token'];
if (!empty($token)) {
    //TRuy vấn để kiểm tra token với database
    $tokenQuery = oneRaw("SELECT id FROM administrators WHERE activeToken='$token'");
    if (!empty($tokenQuery)) {
        $adminId = $tokenQuery['id'];
        $dataUpdate = [
            'status' => 1,
            'activeToken' => null,
        ];

        $updateStatus = update('administrators', $dataUpdate, "id=$adminId");

        if ($updateStatus) {
            setFLashData('msg', 'Kích hoạt tài khoản thành công, bạn có thể đăng nhập ngay bây giờ');
            setFLashData('msg_type', 'success');
        } else {
            setFLashData('msg', 'Kích hoạt tài khoản không thành công, vui lòng liên hệ quản trị viên');
            setFLashData('msg_type', 'danger');
        }

        redirect('?module=auth&action=login');
    } else {
        getSmg('Liên kết không tồn tại hoặc đã hết hạn!!', 'danger');
    }
} else {
    getSmg('Liên kết không tồn tại hoặc đã hết hạn!!', 'danger');
}

layout('footer-login');
