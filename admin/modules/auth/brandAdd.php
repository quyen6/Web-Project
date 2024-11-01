<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
$listCartegory = getRaw("SELECT * FROM cartegory");
if (isPost()) {
    $filterAll = filter();
    $errors = []; // mảng chứa các lỗi
    if (empty($filterAll['cartegory_id'])) {
        $errors['cartegory_id']['require'] = 'Bạn chưa chọn danh mục';
    }
    if (empty($filterAll['brand-name'])) {
        $errors['brand-name']['require'] = 'Bạn chưa nhập tên loại sản phẩm';
    }
    if (empty($errors)) {
        $dataInsert = [
            'name' => $filterAll['brand-name'],
            'cartegory_Id' => $filterAll['cartegory_id'],
        ];
        $insertStatus = insert('brand', $dataInsert);
        if ($insertStatus) {
            setFLashData('smg', 'Thêm loại sản phẩm mới thành công!!');
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
    redirect('?module=auth&action=brandAdd');
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
    <title>Thêm loại sản phẩm</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_add">
        <h1>Thêm loại sản phẩm</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <select name="cartegory_id" id="cartegory_id" style="width:200px; height: 30px;">
                <option value="">--Chọn danh mục--</option>
                <?php
                if (!empty($listCartegory)) :
                    foreach ($listCartegory as $item) :
                ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>
            <?php
            echo form_error('cartegory_id', '<p class="error">', '</p>', $errors);
            ?>
            <input name="brand-name" type="text" placeholder="Nhập tên hãng">
            <?php
            echo form_error('brand-name', '<p class="error">', '</p>', $errors);
            ?>
            <button type="submit">Thêm</button>
        </form>
    </div>

</body>

</html>