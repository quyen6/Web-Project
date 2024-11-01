<?php

if (!defined('_CODE')) {
    die('Access denied...');
}
$data = [
    'pageTitle' => 'Danh sách người dùng',
];
layout('header', $data);

//Kiểm tra trạng thái đăng nhập

if (!isLogin()) {
    redirect('?module=active&action=login');
}

//Truy vấn vào bảng users
$listUsers = getRaw("SELECT * FROM administrators ORDER BY update_at");

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
// $errors = getFLashData('errors');
// $old = getFLashData('old');
?>
<div class="container" style="margin-top:100px;">
    <hr>
    <h2>Thông tin cá nhân</h2>
    <?php
    if (!empty($smg)) {
        getSmg($smg, $smg_type);
    }
    ?>
    <table class="table table-bordered">
        <thead>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th with="5%">Sửa</th>
            <th with="5%">Xóa</th>
        </thead>
        <tbody>
            <?php
            if (!empty($listUsers)) :
                foreach ($listUsers as $item) :
            ?>
                    <tr>
                        <td><?php echo $item['fullname'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
                        <td><?php echo $item['status'] == 1 ? '<button class="btn btn-success btn-sm">Đã kích hoạt</button>' :
                                '<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>' ?></td>
                        <td><a href="<?php echo _WEB_HOST ?>?module=users&action=edit&id=<?php echo $item['id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="<?php echo _WEB_HOST ?>?module=users&action=delete&id=<?php echo $item['id'] ?>" onclick="return confirm ('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php
                endforeach;
            else :
                ?>
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger text-center">Không có người dùng nào!!</div>
                    </td>
                </tr>
            <?php
            endif;
            ?>
        </tbody>
    </table>
</div>


<?php
layout('footer');
?>