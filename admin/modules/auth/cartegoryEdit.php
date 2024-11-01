<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $cartegoryId = $filterAll['id'];

    $cartegoryDetail = oneRaw("SELECT * FROM cartegory WHERE id='$cartegoryId'");
    if ($cartegoryDetail) {
        setFLashData('cartegory-dail', $cartegoryDetail);
    } else {
        redirect('?module=auth&action=cartegoryList');
    }
}
if (isPost()) {
    $filterAll = filter();
    $dataUpdate = [
        'name' => $filterAll['cartegory-name'],
    ];
    $condition = "id=$cartegoryId";
    $updateStatus = update('cartegory', $dataUpdate, $condition);
    if ($updateStatus) {
        setFLashData('smg', 'Sửa thông tin thành công!!');
        setFLashData('smg_type', 'success');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        setFLashData('old', $filterAll['$old']);
    }
    redirect('?module=auth&action=cartegoryEdit&id=' . $cartegoryId);
}
layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$old = getFLashData('old');
$cartegoryDetailll = getFLashData('cartegory-dail');
if ($cartegoryDetailll) {
    $old = $cartegoryDetailll;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh mục</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_add">
        <h1>Sửa Danh mục</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $cartegoryId ?>">
            <input name="cartegory-name" type="text" placeholder="Nhập tên danh mục" value="<?php echo old('name', $old); ?>">
            <button type="submit">Sửa</button>
        </form>
    </div>

</body>

</html>
<?php
layout('footer');
