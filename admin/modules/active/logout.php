<!-- đăng xuất tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
if (isLogin()) {
    checkAndCleanExpiredTokens();
    $token = getSession('tokenlogin');
    delete('tokenlogin', "token='$token'");
    removeSession('tokenLogin');
    session_destroy();  
    redirect('?/module=active&action=login');
}
