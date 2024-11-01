<!-- đăng nhập tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

$data = [
    'pageTitle' => 'Quên mật khẩu'
];
layout('header-login', $data);

if (isPost()) {
    $filterAll = filter();
    if (!empty($filterAll['email'])) {
        $email = $filterAll['email'];

        $queryUser = oneRaw("SELECT id FROM administrators WHERE email='$email'");
        if (!empty($queryUser)) {
            $adminId = $queryUser['id'];

            //Tạo forgotToken
            $forgotToken = sha1(uniqid() . time());

            $dataUpte = [
                'forgotToken' => $forgotToken,
            ];
            $updateStatus = update('administrators', $dataUpte, "id=$adminId");

            if ($updateStatus) {
                //Tạo cái link reset, khôi phục mk
                $linkReset = _WEB_HOST . '?module=auth&action=reset&token=' . $forgotToken;

                //Gửi mail cho người dùng
                $subject = 'Yêu cầu khôi phục tài khoản.';
                $content = 'Chào bạn.<br>';
                $content .= 'Chúng tôi nhận được yêu cầu khôi phục mật khẩu từ bạn.
                Vui lòng click vào link sau để đổi lại mật khẩu: <br>';
                $content .= $linkReset . '<br>';
                $content .= 'Trân trọng cảm ơn!';

                $sendEmail = sendMail($email, $subject, $content);
                if ($sendEmail) {
                    setFLashData('msg', 'Vui lòng kiểm tra email để xem hướng dẫn đặt lại mật khẩu!');
                    setFLashData('msg_type', 'success');
                } else {
                    setFLashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!!');
                    setFLashData('msg_type', 'danger');
                }
            } else {
                setFLashData('msg', 'Lỗi hệ thống vui lòng thử lại sau!!');
                setFLashData('msg_type', 'danger');
            }
        } else {
            setFLashData('msg', 'Địa chỉ email không tồn tại.');
            setFLashData('msg_type', 'danger');
        }
    } else {
        setFLashData('msg', 'Vui lòng nhập địa chỉ email.');
        setFLashData('msg_type', 'danger');
    }
    redirect('?module=auth&action=forgot');
}
$msg = getFLashData('msg');
$msg_type = getFLashData('msg_type');

?>

<div class="row">
    <div class="col-4" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Quên mật khẩu</h2>
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
            <button type="submit" class="mg-btn btn btn-primary btn-block">Gửi</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=Login">Đăng nhập</a></p>
            <p class="text-center"><a href="?module=auth&action=register">Đăng kí tài khoản</a></p>
        </form>
    </div>

</div>


<?php
layout('footer-login');
