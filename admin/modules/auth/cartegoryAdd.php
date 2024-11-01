<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
if (isPost()) {
    $filterAll = filter();
    $errors = []; // mảng chứa các lỗi
    if (empty($filterAll['cartegory-name'])) {
        $errors['cartegory-name']['require'] = 'Bạn chưa nhập tên danh mục';
    }
    if (empty($errors)) {
        $dataInsert = [
            'name' => $filterAll['cartegory-name'],
        ];
        $insertStatus = insert('cartegory', $dataInsert);
        if ($insertStatus) {
            setFLashData('smg', 'Thêm danh mục mới thành công!!');
            setFLashData('smg_type', 'success');
        } else {
            setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
            setFLashData('smg_type', 'danger');
        }
    } else {
        setFLashData('smg', 'Vui lòng kiểm tra lại dữ liệu');
        setFLashData('smg_type', 'danger');
        setFLashData('errors', $errors);
        setFLashData('old', $filterAll);
    }
    redirect('?module=auth&action=cartegoryAdd');
}

layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$errors = getFLashData('errors');
$old = getFLashData('old');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh mục</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_add">
        <h1>Thêm Danh mục</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <input name="cartegory-name" type="text" placeholder="Nhập tên danh mục">
            <?php
            echo form_error('cartegory-name', '<p class="error">', '</p>', $errors);
            ?>
            <button type="submit">Thêm</button>
        </form>
    </div>

</body>

</html>
<?php
layout('footer');
