<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
//Truy vấn vào bảng users
$listCart = getRaw("SELECT * FROM cart_details,product WHERE cart_details.product_Id=product.id AND cart_details.code_cart='$_GET[code]' ORDER BY cart_details.id DESC");

layout('header');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_list">
        <ul>
            <li>
                <a href="<?php echo _WEB_HOST ?>?module=auth&action=cartList">Trở về</a>
            </li>
            <li>
                <h2>Xem đơn hàng</h2>
            </li>

        </ul>
        <table style="width:1300px">
            <thead>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </thead>
            <tbody>
                <?php
                if (!empty($listCart)) :
                    $count = 0; //số thứ tự
                    $all_total = 0;
                    $tongtien = 0;
                    foreach ($listCart as $item) :
                        $count++;
                        $price = floatval($item['giaKhuyenMai']) * 1000;
                        $quantity = intval($item['soLuong']);
                        $all_total = $price * $quantity;
                        $tongtien += $all_total;
                ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item['code_cart'] ?></td>
                            <td><?php echo $item['tenSanPham'] ?></td>
                            <td><?php echo $item['soLuong'] ?></td>
                            <td><?php echo $item['giaKhuyenMai'] ?></td>
                            <td><?php
                                echo '<span style="font-size:18px;">' . number_format($all_total, 3, '.', '.') . ' VNĐ </span>'; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="6">
                            <p>Tổng tiền: <?php echo '<span style="font-size:18px">' . number_format($tongtien, 3, '.', '.') . ' VNĐ </span>'; ?> </p>
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
