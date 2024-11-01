<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
// Tăng giảm số lượng sản phẩm 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity_id'], $_POST['update'])) {
    $product_id = intval($_POST['update_quantity_id']);
    $update_action = $_POST['update'];

    // Kiểm tra xem giỏ hàng có tồn tại không
    if (isset($_SESSION['cart'][$product_id])) {
        // Lấy thông tin sản phẩm từ giỏ hàng
        $item = $_SESSION['cart'][$product_id];

        // Lấy số lượng hiện tại và cập nhật theo yêu cầu
        $current_quantity = intval($item['quantity']);

        if ($update_action === 'increase' && $current_quantity <10) {
            $new_quantity = $current_quantity + 1;
        } elseif ($update_action === 'decrease') {
            $new_quantity = max(1, $current_quantity - 1); // Đảm bảo số lượng không nhỏ hơn 1
        }

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    }

    // Chuyển hướng về trang giỏ hàng hoặc trang khác nếu cần
    header('Location: shopping_cart.php'); // Hoặc trang bạn muốn chuyển hướng
    exit;

}
// Xóa 1 sản phẩm

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_product_id'])) {
    $product_id = intval($_POST['remove_product_id']); // Chuyển đổi product_id thành số nguyên

    // Kiểm tra xem session giỏ hàng đã tồn tại chưa
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]); // Xóa sản phẩm khỏi giỏ hàng
    }

    // Chuyển hướng đến trang giỏ hàng
    header('Location: shopping_cart.php');
    exit;
}
//Xóa toàn bộ giỏ hàng
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear_cart'])) {
    // Xóa toàn bộ giỏ hàng
    unset($_SESSION['cart']);

    // Chuyển hướng đến trang giỏ hàng hoặc trang khác nếu cần
    header('Location: shopping_cart.php');
    exit;
}

?>
<div class="main_container_chil">

    <div class="cart">
        <ul class="nav-list" style="padding-left: 15px;">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/shopping_cart.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Giỏ hàng</a>
            </li>
        </ul>

        <h2> Giỏ hàng nè!!! </h2>
        <?php


        // Lấy dữ liệu từ session
        $listCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        ?>

        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th class="name_product">Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th class="price">Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                if (!empty($listCart)) :
                    foreach ($listCart as $product_id => $item) :
                        $count++;
                        $imagePath = "admin/modules/auth/uploads/" . $item['image']; // Đảm bảo 'image' là khóa đúng
                ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td class="name_product"><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100px;">
                            </td>
                            <td style="width: 15%;"><?php echo ($item['price']); ?> VNĐ</td>
                            <td style="width: 15%;">
                                <form action="" method="post">
                                    <input type="hidden" name="update_quantity_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                    <div class="quantity_box">
                                        <button type="submit" name="update" value="decrease">-</button>
                                        <input type="number" name="update_quantity" value="<?php echo intval($item['quantity']); ?>" min="1">
                                        <button type="submit" name="update" value="increase">+</button>
                                    </div>
                                </form>
                            </td>
                            <td class="price">
                                <?php
                                $price = floatval($item['price']) * 1000;
                                $quantity = intval($item['quantity']);
                                $total = $price * $quantity;
                                echo number_format($total, 3, '.', '.') . ' VNĐ';
                                ?>
                            </td>
                            <td>
                                <!-- <a href="shopping_cart-remove.php?id=<?php echo htmlspecialchars($product_id); ?>" class="remove"><i class="fas fa-trash"></i> Xóa</a> -->
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="remove">
                                    <input type="hidden" name="remove_product_id" value="<?php echo $product_id; ?>">
                                    <button type="submit"><i class="fas fa-trash"></i> Xóa</button>

                                </form>
                            </td>
                        </tr>
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
        <div class="table_bottom">
            <a href="<?php echo _WEB_HOST_1 ?>/orderInfo.php" style="cursor: pointer; ">Thanh toán đơn hàng</a>
            <a>Tổng giá trị:
                <?php
                $all_total = 0;
                if (!empty($_SESSION['cart'])) :
                    foreach ($_SESSION['cart'] as $product_id => $item) :
                        $price = floatval($item['price']) * 1000;
                        $quantity = intval($item['quantity']);
                        $all_total += $price * $quantity;
                    endforeach;
                endif;
                echo number_format($all_total, 3, '.', '.') . ' VNĐ';

                ?>
            </a>

            <a>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="all-remove">
                    <button type="submit" name="clear_cart"><i class="fas fa-trash" style="color: red"></i> Xóa hết</button>
                </form>
            </a>
            <a href="index.php" style="">
                Mua thêm đi nạ !!! <span style="color: red">Yêu</span>
            </a>

        </div>
    </div>
</div>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
