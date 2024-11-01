<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
//Truy vấn vào bảng users
$listCart = getRaw("SELECT * FROM shopping_cart,customer WHERE shopping_cart.customer_Id=customer.id ORDER BY shopping_cart.cart_status = '1' DESC, shopping_cart.create_cart ASC");

layout('header');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàngC</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_list">
        <h2>Quản lý đơn hàng</h2>
        <?php
        ?>
        <table style="width:1300px">
            <thead>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Hình thức nhận hàng</th>
                <th style="width:150px">Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Hình thức thanh toán</th>
                <th>Ngày đặt hàng</th>
                <th>Tình trạng</th>
                <th>Quản lý</th>
            </thead>
            <tbody>
                <?php
                if (!empty($listCart)) :
                    $count = 0; //số thứ tự
                    foreach ($listCart as $item) :
                        $count++;
                ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item['code_cart'] ?></td>
                            <td><?php echo $item['hoTen'] ?></td>
                            <td><?php echo $item['hinhThucNhanHang'] ?></td>
                            <td style="width:150px"><?php echo $item['diaChi'] . ', ' . $item['huyen'] . ', ' . $item['tinh']; ?></td>
                            <td><?php echo $item['email'] ?></td>
                            <td><?php echo $item['soDienThoai'] ?></td>
                            <td><?php echo $item['cart_payment'] ?></td>
                            <td><?php echo $item['create_cart'] ?></td>
                            <td>
                                <select name="cart_status" class="cart_status" data-code="<?php echo $item['code_cart']; ?>" style="width:150px">
                                    <option value="1" <?php echo ($item['cart_status'] == 1) ? 'selected' : ''; ?>>Đăng kí mới</option>
                                    <option value="2" <?php echo ($item['cart_status'] == 2) ? 'selected' : ''; ?>>Đã xác nhận</option>
                                    <option value="3" <?php echo ($item['cart_status'] == 3) ? 'selected' : ''; ?>>Đã giao hàng cho bên vận chuyển</option>
                                    <option value="4" <?php echo ($item['cart_status'] == 4) ? 'selected' : ''; ?>>Đang vận chuyển</option>
                                    <option value="5" <?php echo ($item['cart_status'] == 5) ? 'selected' : ''; ?>>Đang giao tới bạn</option>
                                    <option value="6" <?php echo ($item['cart_status'] == 6) ? 'selected' : ''; ?>>Giao hàng thành công</option>
                                </select>
                                <!--                             
                            if ($item['cart_status'] == 1)
                                    echo '<a href="' . _WEB_HOST . '?module=auth&action=xuly&code=' . $item['code_cart'] . '&code_status='  . $item['cart_status'] . '">Đơn hàng mới </a>';
                                elseif ($item['cart_status'] == 0) echo '<a href="' . _WEB_HOST . '?module=auth&action=xuly&code=' . $item['code_cart'] . '&code_status='  . $item['cart_status'] . '">Đã xem </a>';
                                elseif ($item['cart_status'] == 2) echo '<a href="' . _WEB_HOST . '?module=auth&action=xuly&code=' . $item['code_cart'] . '&code_status='  . $item['cart_status'] . '">Đã giao hàng cho bên vận chuyển</a>';
                                elseif ($item['cart_status'] == 3) echo '<a href="' . _WEB_HOST . '?module=auth&action=xuly&code=' . $item['code_cart'] . '&code_status='  . $item['cart_status'] . '">Đang vận chuyển</a>';
                                elseif ($item['cart_status'] == 4) echo '<a href="">Giao hàng thành công</a>';
                                ?></td> -->
                            </td>
                            <td><a href="<?php echo _WEB_HOST ?>?module=auth&action=orderDetail&code=<?php echo $item['code_cart'] ?>">Xem đơn hàng</a></td>
                        </tr>
                    <?php
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan=" 9">
                            <div class="alert alert-danger text-center">Không có danh mục nào!!</div>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('.cart_status').change(function() {
                var code_cart = $(this).data('code');
                var code_status = $(this).val();
                console.log("Code Cart:", code_cart);
                console.log("Code Status:", code_status);

                if (code_cart && code_status) {
                    $.ajax({
                        url: "<?php echo _WEB_HOST ?>/?module=auth&action=processe_code",
                        method: "POST",
                        data: {
                            code: code_cart,
                            code_status: code_status
                        },
                        success: function(data) {
                            console.log("Response:", data);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    console.error("Lỗi");
                }
            });
        });

    </script>
</body>

</html>
<?php
layout('footer');
