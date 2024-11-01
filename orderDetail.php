<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
$code = $_GET['code'];

//Truy vấn vào bảng users
$listCart = getRaw("SELECT * FROM cart_details,product WHERE cart_details.product_Id=product.id AND cart_details.code_cart='$code' ORDER BY cart_details.id DESC");
?>
<div class="main_container_chil">
    <div class="admin-content-cartegory_list">
        <ul>
            <li>
                <a href="<?php echo _WEB_HOST_1 ?>/check_orderDetail.php">Trở về</a>
            </li>
            <li>
                <h2>Xem đơn hàng</h2>
            </li>

        </ul>
        <?php
        ?>
        <table>
            <thead>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
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
                        $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
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
                            <td><img style="width: 100px; height:100px" src="<?php echo $imagePath ?>" alt="<?php echo $item['tenSanPham'] ?>"></td>
                            <td><?php echo $item['soLuong'] ?></td>
                            <td><?php echo $item['giaKhuyenMai'] ?></td>
                            <td><?php
                                echo '<span style="font-size:18px;">' . number_format($all_total, 3, '.', '.') . ' VNĐ </span>'; ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="7">
                            <p>Tổng tiền: <?php echo '<span style="font-size:18px">' . number_format($tongtien, 3, '.', '.') . ' VNĐ </span>'; ?> </p>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
