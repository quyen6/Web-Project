<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
//Truy vấn vào bảng users
$listBrand = getRaw("SELECT * FROM brand");

$listCartegory = getRaw("SELECT * FROM cartegory");
layout('header');
$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH LOẠI SẢN PHẨM</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_list">
        <h2>DANH SÁCH DANH MỤC</h2>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <table>
            <thead>
                <th>STT</th>
                <th>ID</th>
                <th>Danh mục</th>
                <th>Name</th>
                <th width="5%">Sửa</th>
                <th width="5%">Xóa</th>
            </thead>
            <tbody>
                <?php
                if (!empty($listBrand)) :
                    $count = 0; //số thứ tự
                    foreach ($listBrand as $item) :
                        $count++;
                ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php
                                foreach ($listCartegory as $item_cartegory) :
                                    if ($item['cartegory_Id'] == $item_cartegory['id']) :
                                        echo $item_cartegory['name'];
                                    endif;
                                endforeach;
                                ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><a href="<?php echo _WEB_HOST ?>?module=auth&action=brandEdit&id=<?php echo $item['id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="<?php echo _WEB_HOST ?>?module=auth&action=brandDelete&id=<?php echo $item['id'] ?>" onclick="return confirm ('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    <?php
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-danger text-center">Không có hãng nào!!</div>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
layout('footer');
