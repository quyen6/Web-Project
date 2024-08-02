<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

$listCart = getRaw("SELECT * FROM shopping_cart");

if (isPost()) {
    $soLuongBD = $_POST['update_quantity'];

    if ($_POST['update'] === 'cong') {
        $soLuongUpdate = $soLuongBD + 1;
    } elseif ($_POST['update'] === 'tru') {
        $soLuongUpdate = max(1, $soLuongBD - 1);  // Đảm bảo số lượng không nhỏ hơn 1
    } else {
        $soLuongUpdate = $soLuongBD;
    }

    $dataUpdate = [
        'soLuong' => $soLuongUpdate
    ];
    $cart_id = $_POST['update_quantity_id'];
    $condition = "id=$cart_id";
    $updateStatus = update('shopping_cart', $dataUpdate, $condition);
    if ($updateStatus) {
        header('location: shopping_cart.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/shopping_cart.css">
    <h1> GIỎ HÀNG CỦA TÔI</h1>
    <table>
        <thead>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </thead>
        <tbody>
            <?php
            $count = 0;
            if (!empty($listCart)) :
                foreach ($listCart as $item) :
                    $count++;
                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
            ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $item['tenSanPham'] ?></td>
                        <td><img src="<?php echo $imagePath; ?>" alt="<?php echo $item['tenSanPham']; ?>"></td>
                        <td><?php echo $item['gia'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $item['id'] ?>">
                                <div class="quantity_box">
                                    <button value="tru" name="update">-</button>
                                    <input value="<?php echo $item['soLuong'] ?>" name="update_quantity">
                                    <button value="cong" name="update">+</button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <?php $gia = floatval($item['gia']) * 1000;
                            $soLuong = intval($item['soLuong']);
                            $tongtien = $gia * $soLuong;
                            echo number_format($tongtien, 3, '.', '.') . ' VNĐ';
                            ?>

                        </td>
                        <td>
                            <a href="<?php echo _WEB_HOST_1 ?>/shopping_cart-remove.php?id=<?php echo $item['id'] ?>"><i class="fas fa-trash"></i>
                                REMOVE</a>
                        </td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <div class="table_bottom">
        <a>Thanh toán đơn hàng</a>
        <a>Tổng tiền:
            <?php
            $tongtien = 0;
            if (!empty($listCart)) :
                foreach ($listCart as $item) :
                    $gia = floatval($item['gia']) * 1000;
                    $soLuong = intval($item['soLuong']);
                    $tongtien += $gia * $soLuong;
                endforeach;
            endif;
            echo number_format($tongtien, 3, '.', '.') . ' VNĐ';
            ?>
        </a>
        <a href="<?php echo _WEB_HOST_1 ?>/shopping_cart-delete.php">
            <i class="fas fa-trash"></i>Delete All
        </a>
    </div>
    </body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');