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
        $userQuery = oneRaw("SELECT password,id FROM users WHERE email ='$email'");

        if (!empty($userQuery)) {
            $passwordHash = $userQuery['password'];
            $userId = $userQuery['id'];

            if (password_verify($password, $passwordHash)) {

                //Kiểm tra xem tài khoản đã login chưa
                $userLogin = getRows("SELECT * FROM tokenlogin WHERE user_Id= '$userId'");
                if ($userLogin > 0) {
                    setFLashData('msg', 'Tài khoản đang đăng nhập ở 1 nơi khác!!');
                    setFLashData('msg_type', 'danger');
                    redirect('?module=auth&action=login');
                } else {
                    //Tạo token login
                    $tokenLogin = sha1(uniqid() . time());

                    //Insert vào bảng loginToken
                    $dataInsert = [
                        'user_Id' => $userId,
                        'token' => $tokenLogin,
                        'create_at' => date('Y-m-d H:i:s')
                    ];
                    $insertStatus = insert('tokenlogin', $dataInsert);
                    if ($insertStatus) {
                        //Insert thành công

                        //Lưu cái loginToken vào session
                        setSession('tokenlogin', $tokenLogin);
                        redirect('?module=home&action=dashboard');
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
    redirect('?module=auth&action=login');
}
$msg = getFLashData('msg');
$msg_type = getFLashData('msg_type');

?>

<div class="row">
    <div class="col-4" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng nhập quản lý Users</h2>
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
            <p class="text-center"><a href="?module=auth&action=forgot">Quên mật khẩu</a></p>
            <p class="text-center"><a href="?module=auth&action=register">Đăng kí tài khoản</a></p>
        </form>
    </div>

</div>


<?php
layout('footer-login');
