<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
$listCart = [];
$listCart_Detail = [];

$searchPhone = '';
$showResults = false;
// $listCart = getRaw("SELECT * FROM shopping_cart,cart_details,product WHERE shopping_cart.customer_Id=customer.id AND cart_details.product_Id=product.id AND cart_details.code_cart='$_GET[code]' ORDER BY shopping_cart.id DESC");
if (isset($_POST['search'])) {
    $searchPhone = $_POST['phone'];
    $showResults = true;
    $listCart = getRaw("SELECT * FROM shopping_cart,customer WHERE shopping_cart.customer_Id=customer.id AND customer.soDienThoai = '$searchPhone' ORDER BY shopping_cart.create_cart ASC");
    $listCart_Detail = getRaw("SELECT * FROM cart_details");
} elseif (isset($_GET['code'])) {
    $code = $_GET['code'];
    $showResults = true;
    $listCart = getRaw("SELECT * FROM shopping_cart,customer WHERE shopping_cart.customer_Id=customer.id AND shopping_cart.code_cart = '$code' ORDER BY shopping_cart.create_cart ASC");
    $listCart_Detail = getRaw("SELECT * FROM cart_details");
}
?>
<div class="main_container_chil">
    <div class="cart" style="padding-bottom:15px;">

        <ul class="nav-list" style="padding-left: 15px;">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/check_orderDetail.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Kiểm tra đơn hàng</a>
            </li>
        </ul>
        <div class="order-check">
            <h2>Kiểm tra đơn hàng</h2>
            <form method="POST" action="">
                <input type="text" name="phone" placeholder="Nhập số điện thoại" required>
                <input type="submit" name="search" value="Tìm kiếm">
            </form>
        </div>
        <?php if ($showResults):
            if (!empty($listCart)): ?>
                <h2> Đơn hàng nè!!! </h2>
                <table style="font-size:small">
                    <thead>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Hình thức nhận hàng</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Hình thức thanh toán</th>
                        <th>Số lượng</th>
                        <th>Tình trạng</th>
                        <th>Xem chi tiết đơn hàng</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        $total_order = 0;
                        foreach ($listCart as $item):
                            $count_listCart = 0;
                            foreach ($listCart_Detail as $item_cart):
                                if ($item_cart['code_cart'] == $item['code_cart']):
                                    $count_listCart++;
                                    $price = floatval($item_cart['giamua']) * 1000;
                                    $quantity = intval($item_cart['soLuong']);
                                    $total_order += $price * $quantity;
                                endif;
                            endforeach;
                            $count++;
                        ?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td><?php echo $item['code_cart'] ?></td>
                                <td><?php echo $item['hoTen'] ?></td>
                                <td><?php echo $item['hinhThucNhanHang'] ?></td>
                                <td><?php echo $item['diaChi'] . ', ' . $item['huyen'] . ', ' . $item['tinh']; ?></td>
                                <td><?php echo $item['email'] ?></td>
                                <td><?php echo $item['soDienThoai'] ?></td>
                                <td><?php echo $item['cart_payment'] ?></td>
                                <td><?php echo $count_listCart ?></td>
                                <td><?php if ($item['cart_status'] == 1) echo 'Chờ xử lý';
                                    elseif ($item['cart_status'] == 2) echo 'Đã xác nhận';
                                    elseif ($item['cart_status'] == 3) echo 'Đã giao hàng cho bên vận chuyển';
                                    elseif ($item['cart_status'] == 4) echo 'Đang vận chuyển';
                                    elseif ($item['cart_status'] == 5) echo 'Đang giao tới bạn';
                                    elseif ($item['cart_status'] == 6) echo 'Giao hàng thành công'; ?></td>
                                <td><a href="<?php echo _WEB_HOST_1 ?>/orderDetail.php?code=<?php echo $item['code_cart'] ?>">Xem đơn hàng</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="table_bottom">
                    <a>Tổng giá trị đơn hàng: <?php echo number_format($total_order, 3, '.', '.') . ' VNĐ'; ?></a>
                    <a href="index.php" style="">
                        Mua thêm đi nạ !!! <span style="color: red">Yêu</span>
                    </a>
                </div>
            <?php else: ?>
                <p class="error-message">Không tìm thấy đơn hàng với số điện thoại này.</p>
        <?php endif;
        endif; ?>

    </div>
</div>
<script>
    window.onload = function() {
        document.querySelector('input[name="phone"]').value = '';
    }
</script>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
