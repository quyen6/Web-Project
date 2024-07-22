<?php
if (!defined('_CODE')) {
    die('Access denied...');
}

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
        $sql = "SELECT id FROM users WHERE email= '$email'";
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

        $dataInsert = [
            'fullname' => $filterAll['fullname'],
            'email' => $filterAll['email'],
            'phone' => $filterAll['phone'],
            'password' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
            'status' => $filterAll['status'],
            'create_at' => date('Y-m-d H:i:s'),
        ];
        $insertStatus = insert('users', $dataInsert);
        if ($insertStatus) {
            setFLashData('smg', 'Thêm người dùng mới thành công!!');
            setFLashData('smg_type', 'success');
            redirect('?module=users&action=list');
        } else {
            setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
            setFLashData('smg_type', 'danger');
            redirect('?module=users&action=add');
        }
    } else {
        setFLashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFLashData('smg_type', 'danger');
        setFLashData('errors', $errors);
        setFLashData('old', $filterAll['$old']);
        redirect('?module=users&action=add');
    }
}

layout('header-login');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$errors = getFLashData('errors');
$old = getFLashData('old');
?>


<div class="container">
    <div class="row" style="margin: 50px auto;">
        <h2 class="text-center text-uppercase">Thêm người dùng</h2>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <div class="row">
                <div class="col">
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

                </div>
                <div class="col">
                    <div class="form-group mg-form">
                        <label for="">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
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

                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <select name="status" id="" class="form-control">
                            <option value="0" <?php echo old('status', $old) == 0 ? 'selected' : false ?>>Chưa kích hoạt</option>
                            <option value="1" <?php echo old('status', $old) == 1 ? 'selected' : false ?>>Đã kích hoạt</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="mg-btn-add btn btn-primary btn-block">Thêm người dùng</button>
            <a type="submit" href="?module=users&action=list" class="mg-btn-add btn btn-success btn-block">Quay lại</a></p>
        </form>
    </div>

</div>
<?php
layout('footer-login');
