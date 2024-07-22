<!-- đăng xuất tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
if (isLogin()) {
    $token = getSession('tokenlogin');
    delete('tokenlogin', "token='$token'");
    removeSession('tokenLogin');
    redirect('?module=auth&action=login');
}
