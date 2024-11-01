<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
$listCartegory = getRaw("SELECT * FROM cartegory");
$filterAll = filter();
if (!empty($filterAll['id'])) {
    $brand_Id = $filterAll['id'];
    $brandDetail = oneRaw("SELECT * FROM brand WHERE id='$brand_Id'");
    if ($brandDetail) {
        setFLashData('brand-dail', $brandDetail);
    } else {
        redirect('?module=auth&action=brandList');
    }
}
if (isPost()) {
    $filterAll = filter();
    $dataUpdate = [
        'name' => $filterAll['brand-name'],
        'cartegory_Id' => $filterAll['cartegory_id'],
    ];
    $condition = "id=$brand_Id";
    echo $condition;
    $updateStatus = update('brand', $dataUpdate, $condition);
    if ($updateStatus) {
        setFLashData('smg', 'Sửa thông tin thành công!!');
        setFLashData('smg_type', 'success');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        setFLashData('old', $filterAll['$old']);
    }
    redirect('?module=auth&action=brandEdit&id=' . $brand_Id);
}
layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$old = getFLashData('old');
$brandDetailll = getFLashData('brand-dail');
if ($brandDetailll) {
    $old = $brandDetailll;
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
        <h1>Sửa loại hãng</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <select name="cartegory_id" id="cartegory_id" style="width:200px; height: 30px;">
                <option value="#">--Chọn danh mục--</option>
                <?php
                if (!empty($listCartegory)) :
                    foreach ($listCartegory as $item) :
                ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select><br>
            <input type="hidden" name="id" value="<?php echo $brand_Id ?>">
            <input name="brand-name" type="text" placeholder="Nhập tên hãng" value="<?php echo old('name', $old); ?>">
            <button type="submit">Sửa</button>
        </form>
    </div>

</body>

</html>
<?php
layout('footer');
