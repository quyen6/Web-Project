<!-- reset password -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

layout('header-login');

$token = filter()['token'];
if (!empty($token)) {
    //Truy vấn csdl để kiểm tra token
    $tokenQuery = oneRaw("SELECT id,fullname,email FROM users WHERE forgotToken='$token'");
    if (!empty($tokenQuery)) {
        $userId = $tokenQuery['id'];
        if (isPost()) {
            $filterAll = filter();
            $errors = []; //Mảng chứa lỗi

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
                //Xử lý update mật khẩu
                $passwordHash = password_hash($filterAll['password'], PASSWORD_DEFAULT);
                $dataUpdate = [
                    'password' => $passwordHash,
                    'forgotToken' => null,
                    'update_at' => date('Y-m-d H:i:s'),
                ];
                $updateStatus = update('users', $dataUpdate, "id=$userId");
                if ($updateStatus) {
                    setFLashData('smg', 'Thay đổi mật khẩu thành công!!');
                    setFLashData('smg_type', 'success');
                    redirect('?module=auth&action=login');
                } else {
                    setFLashData('smg', 'Lỗi hệ thống vui lòng thử lại sau!!');
                    setFLashData('smg_type', 'danger');
                }
            } else {
                setFLashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
                setFLashData('smg_type', 'danger');
                setFLashData('errors', $errors);
                redirect('?module=auth&action=reset&token=' . $token);
            }
        }
        $smg = getFLashData('smg');
        $smg_type = getFLashData('smg_type');
        $errors = getFLashData('errors');
?>
        <!-- form đặt lại mật khẩu -->
        <div class="row">
            <div class="col-4" style="margin: 50px auto;">
                <h2 class="text-center text-uppercase">Đặt lại mật khẩu</h2>
                <?php
                if (!empty($smg)) {
                    getSmg($smg, $smg_type);
                }
                ?>
                <form action="" method="post">
                    <div class="form-group mg-form">
                        <label for="">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                        <?php
                        echo form_error('password', '<span class="error">', '</span>', $errors);
                        ?>
                    </div>

                    <div class="form-group mg-form">
                        <label for="">Nhập lại mật khẩu</label>
                        <input name="password-conform" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                        <?php
                        echo form_error('password-conform', '<span class="error">', '</span>', $errors);
                        ?>
                    </div>
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                    <button type="submit" class="mg-btn btn btn-primary btn-block">Gửi</button>
                    <hr>
                    <p class="text-center"><a href="?module=auth&action=login">Đăng nhập tài khoản</a></p>
                </form>
            </div>
        </div>
<?php
    } else {
        getSmg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
    }
} else {
    getSmg('Liên kết không tồn tại hoặc đã hết hạn', 'danger');
}


layout('footer-login');
