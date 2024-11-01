<!-- đăng nhập tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

$data = [
    'pageTitle' => 'Đăng nhập tài khoản'
];
layout('header-login', $data);

if (isPost()) {
    $filterAll = filter();
    if (!empty(trim($filterAll['email']) && trim($filterAll['password']))) {

        $email = $filterAll['email'];
        $password = $filterAll['password'];

        //Truy vấn thông tin users theo email
        $adminQuery = oneRaw("SELECT password,id FROM administrators WHERE email ='$email'");

        if (!empty($adminQuery)) {
            $passwordHash = $adminQuery['password'];
            $adminId = $adminQuery['id'];
            $adminName = $adminQuery['name'];

            if (password_verify($password, $passwordHash)) {

                //Kiểm tra xem tài khoản đã login chưa
                $adminLogin = getRows("SELECT * FROM tokenlogin WHERE admin_Id= '$adminId'");
                if (!empty(getSession('admin_login'))) {
                    setFLashData('msg', 'Tài khoản đang đăng nhập ở 1 nơi khác!!');
                    setFLashData('msg_type', 'danger');
                    redirect('?module=active&action=login');
                } else {
                    setSession('admin_login', [
                        'id' => $adminId,
                        'email' => $email,
                        'name' => $adminName
                    ]);

                    ini_set('session.gc_maxlifetime', 1800); // 30 phút
                    session_set_cookie_params(1800);

                    //Tạo token login
                    $tokenLogin = sha1(uniqid() . time());

                    //Insert vào bảng loginToken
                    $dataInsert = [
                        'admin_Id' => $adminId,
                        'token' => $tokenLogin,
                        'create_at' => date('Y-m-d H:i:s')
                    ];
                    $insertStatus = insert('tokenlogin', $dataInsert);
                    if ($insertStatus) {
                        //Insert thành công

                        //Lưu cái loginToken vào session
                        setSession('tokenlogin', $tokenLogin);
                        redirect('?module=auth&action=cartList');
                    } else {
                        setFLashData('msg', 'Không thể đăng nhập, vui lòng đăng nhập lại sau!!');
                        setFLashData('msg_type', 'danger');
                    }
                }
            } else {
                setFLashData('msg', 'Mật khẩu không chính xác');
                setFLashData('msg_type', 'danger');
            }
        } else {
            setFLashData('msg', 'Email không tồn tại');
            setFLashData('msg_type', 'danger');
        }
    } else {
        setFLashData('msg', 'Vui lòng nhập email và mật khẩu.');
        setFLashData('msg_type', 'danger');
    }
    redirect('?module=active&action=login');
}
$msg = getFLashData('msg');
$msg_type = getFLashData('msg_type');

?>
<div class="row">
    <div class="col-4" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng nhập quản lý sản phẩm</h2>
        <?php
        if (!empty($msg)) {
            getSmg($msg, $msg_type);
        }
        ?>
        <form action="" method="post">
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name='email' type="email" class="form-control" placeholder="Địa chỉ email">
            </div>
            <div class="form-group mg-form">
                <label for="">Password</label>
                <input name='password' type="password" class="form-control" placeholder="Mật khẩu">
            </div>
            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng nhập</button>
            <hr>
            <p class="text-center"><a href="?module=active&action=forgot">Quên mật khẩu</a></p>
        </form>
    </div>

</div>


<?php
layout('footer-login');
