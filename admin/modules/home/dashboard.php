<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

$data = [
    'pageTitle' => 'Tranh Doashboarh',
];
layout('header', $data);

//Kiểm tra trạng thái đăng nhập

if (!isLogin()) {
    redirect('?module=home&action=dashboard');
}
?>

<div class="container">
    <div class="index">
        <h1> aaaaaaaaaaaaaaaaaaaaaa</h1>
    </div>
</div>

</div>
</body>

</html>