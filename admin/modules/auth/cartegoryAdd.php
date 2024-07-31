<?php
if (isPost()) {
    $filterAll = filter();
    $dataInsert = [
        'name' => $filterAll['cartegory-name'],
    ];
    $insertStatus = insert('cartegory', $dataInsert);
    if ($insertStatus) {
        setFLashData('smg', 'Thêm danh mục mới thành công!!');
        setFLashData('smg_type', 'success');
        redirect('?module=auth&action=cartegory');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        redirect('?module=auth&action=cartegory');
    }
}

layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
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
            <button type="submit">Thêm</button>
        </form>
    </div>

</body>

</html>
<?php
layout('footer');
