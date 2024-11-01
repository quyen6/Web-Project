<!-- đăng ký tài khoản -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

// $data = [
//     'fullname' => 'Nam Trường',
//     'email' => 'truong1728@gmail.com',
//     'phone' => '029932020',
// ];
// $kq = getRows('SELECT * FROM users');
// var_dump($kq);


if (isPost()) {
    $filterAll = filter();
    $errors = []; // mảng chứa các lỗi

    //Validate fullname: bắt buộc phải nhập , min 5 kí tự
    if (empty($filterAll['fullname'])) {
        $errors['fullname']['require'] = 'Họ tên bắt buộc phải nhập';
    } else {
        if (strlen($filterAll['fullname']) < 5) {
            $errors['fullname']['min'] = 'Họ tên có ít nhất 5 kí tự';
        }
    }

    //Validate email: bắt buộc phải nhập, đúng định dạng emil, kiểm tra email đã tồn tại trong csdl chưa
    if (empty($filterAll['email'])) {
        $errors['email']['require'] = 'Email bắt buộc phải nhập';
    } else {
        $email = $filterAll['email'];
        $sql = "SELECT id FROM administrators WHERE email= '$email'";
        if (getRows($sql) > 0) {
            $errors['email']['unique'] = 'Email đã tồn tại';
        }
    }

    //Validate số điện thoại: bắt buộc phải nhập, kiểm tra xem có đúng sdt không

    if (empty($filterAll['phone'])) {
        $errors['phone']['require'] = 'Số điện thoại bắt buộc phải nhập';
    } else {
        if (isPhone($filterAll['phone'])) {
            $errors['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
        }
    }

    // Validate password: bắt buộc phải nhập, >= 8 kí tự
    if (empty($filterAll['password'])) {
        $errors['password']['require'] = 'Mật khẩu bắt buộc phải nhập';
    } else {
        if (strlen($filterAll['password']) < 8) {
            $errors['password']['min'] = 'Mật khẩu phải lớn hơn hoặc bằng 8';
        }
    }

    //Validate password-conform: bắt buộc phải nhập, phải giống password

    if (empty($filterAll['password-conform'])) {
        $errors['password-conform']['require'] = 'Bạn phải nhập lại mật khẩu';
    } else {
        if ($filterAll['password'] != $filterAll['password-conform']) {
            $errors['password-conform']['match'] = 'Bạn nhập lại mật khẩu không đúng';
        }
    }

    if (empty($errors)) {
        //xử lý insert
        $activeToken = sha1(uniqid() . time());
        $dataInsert = [
            'fullname' => $filterAll['fullname'],
            'email' => $filterAll['email'],
            'phone' => $filterAll['phone'],
            'password' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
            'activeToken' => $activeToken,
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $insertStatus = insert('administrators', $dataInsert);
        if ($insertStatus) {
            setFLashData('smg', 'Đăng ký thành công');
            setFLashData('smg_type', 'success');

            //Tạo link kích hoạt
            $linkActive = _WEB_HOST . '?module=active&action=active&token=' . $activeToken;

            //Thiết lập gửi mail
            $subject = $filterAll['fullname'] . 'Vui lòng kích hoạt tài khoản!!';
            $content = 'Chào' . $filterAll['fullname'] . '<br>';
            $content .= 'Vui lòng click vào link dưới đây để kíck hoạt tài khoản: </br>';
            $content .= $linkActive . '<br>';

            $content .= 'Trân trọng cảm ơn!!';

            //Tiến hành gửi mail

            $senMail = sendMail($filterAll['email'], $subject, $content);
            if ($senMail) {
                setFLashData('smg', 'Đăng kí thành công, vui lòng kiểm tra mail để kích hoạt tài khoản!!');
                setFLashData('smg_type', 'success');
            } else {
                setFLashData('smg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau!!');
                setFLashData('smg_type', 'danger');
            }
        } else {
            setFLashData('smg', 'Đăng kí không thành công!!');
            setFLashData('smg_type', 'danger');
        }
        redirect('?module=active&action=register');
    } else {
        setFLashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFLashData('smg_type', 'danger');
        setFLashData('errors', $errors);
        setFLashData('old', $filterAll);
        redirect('?module=active&action=register');
    }
}

layout('header-login');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$errors = getFLashData('errors');
$old = getFLashData('old');
?>


<div class="row">
    <div class="col-4" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Đăng ký tài khoản Admin</h2>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <div class="form-group mg-form">
                <label for="">Họ và tên</label>
                <input name="fullname" type="fullname" class="form-control" placeholder="Họ và tên" value="<?php echo old('fullname', $old); ?>">
                <?php
                echo form_error('fullname', '<p class="error">', '</p>', $errors);
                ?>
            </div>

            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="Địa chỉ email" value=" <?php echo old('email', $old); ?>">
                <?php
                echo form_error('email', '<p class="error">', '</p>', $errors);
                ?>
            </div>

            <div class="form-group mg-form">
                <label for="">Số điện thoại</label>
                <input name="phone" type="number" class="form-control" placeholder="Số điện thoại" value="<?php echo old('phone', $old); ?>">
                <?php
                echo form_error('phone', '<p class="error">', '</p>', $errors);
                ?>
            </div>

            <div class="form-group mg-form">
                <label for="">Password</label>
                <input name="password" type="text" class="form-control" placeholder="Mật khẩu">
                <?php
                echo form_error('password', '<p class="error">', '</p>', $errors);
                ?>
            </div>

            <div class="form-group mg-form">
                <label for="">Nhập lại mật khẩu</label>
                <input name="password-conform" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                <?php
                echo form_error('password-conform', '<p class="error">', '</p>', $errors);
                ?>
            </div>

            <button type="submit" class="mg-btn btn btn-primary btn-block">Đăng ký</button>
            <hr>
            <p class="text-center"><a href="?module=active&action=login">Đăng nhập tài khoản</a></p>
        </form>
    </div>

</div>


<?php
layout('footer-login');
