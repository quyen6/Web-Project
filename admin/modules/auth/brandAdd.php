<?php
if (isPost()) {
    $filterAll = filter();
    $dataInsert = [
        'name' => $filterAll['brand-name'],
        'cartegory_Id'=>$filterAll['cartegory_id'],
    ];
    $insertStatus = insert('brand', $dataInsert);
    if ($insertStatus) {
        setFLashData('smg', 'Thêm loại sản phẩm mới thành công!!');
        setFLashData('smg_type', 'success');
        redirect('?module=auth&action=brandAdd');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        redirect('?module=auth&action=brandAdd');
    }
}

layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');

$listCartegory = getRaw("SELECT * FROM cartegory");
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
            <input name="brand-name" type="text" placeholder="Nhập tên hãng">
            <button type="submit">Thêm</button>
        </form>
    </div>

</body>

</html>