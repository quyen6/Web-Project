<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

function getProvinceName($provinceId)
{
    $province = oneRaw("SELECT name FROM province WHERE id = '$provinceId'");
    return $province['name'] ?? '';
}

function getDistrictName($districtId)
{
    $district = oneRaw("SELECT name FROM district WHERE id = '$districtId'");
    return $district['name'] ?? '';
}
function validatePhoneNumber($phone)
{
    // Loại bỏ khoảng trắng và các ký tự không phải số
    $phone = preg_replace('/[^0-9]/', '', $phone);

    // Kiểm tra độ dài số điện thoại
    if (strlen($phone) !== 10) {
        return false;
    }

    // Kiểm tra đầu số
    $validPrefixes = ['03', '05', '07', '08', '09'];
    $prefix = substr($phone, 0, 2);
    if (!in_array($prefix, $validPrefixes)) {
        return false;
    }

    return true;
}
$filterAll = filter();
if (!empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['form_id'])) {
        if ($_POST['form_id'] == 'form2') {
            $errors = []; // mảng chứa các lỗi

            //Validate fullname: bắt buộc phải nhập , min 5 kí tự
            if (strlen($_POST['fullname']) < 5) {
                $errors['fullname']['min'] = 'Họ tên có ít nhất 5 kí tự';
            }

            if (!validatePhoneNumber($_POST['phone'])) {
                $errors['phone']['check'] = 'Số điện thoại không hợp lệ';
            }

            if (empty($errors)) {
                // var_dump($_POST,$_FILES);
                $hinhThucNH = $_POST['delivery'] ?? '';
                $diachi = ($hinhThucNH == 'home') ? ($_POST['diachi_nha'] ?? '') : ($_POST['diachi_cuahang'] ?? '');
                $provinceId = $_POST['province_id'] ?? '';
                $districtId = $_POST['district_id'] ?? '';

                $provinceName = getProvinceName($provinceId);
                $districtName = getDistrictName($districtId);
                $dataInsert = [
                    'hoTen' => $_POST['fullname'] ?? '',
                    'soDienThoai' => $_POST['phone'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'hinhThucNhanHang' => $hinhThucNH,
                    'tinh' => $provinceName,
                    'huyen' => $districtName,
                    'diaChi' => $diachi,
                    'ghiChu' => $_POST['note'] ?? '',
                ];
                $insertStatus = insert('customer', $dataInsert);
                if ($insertStatus) {
                    setFLashData('smg', '<p style="color: red">Đặt hàng thành công!!</p>');
                    setFLashData('smg_type', 'success');
                    $payment = $_POST['payment_method'] ?? '';

                    $customer_id = oneRaw("SELECT * FROM customer ORDER BY id DESC LIMIT 1;");
                    $code_cart = rand(0, 9999);
                    $cartInsert = [
                        'customer_Id' => $customer_id['id'],
                        'code_cart' => $code_cart,
                        'cart_status' => '1',
                        'cart_payment' => $payment,
                        'create_cart' => date('Y-m-d H:i:s'),
                    ];
                    $cartInsertStatus = insert('shopping_cart', $cartInsert);
                    if ($cartInsertStatus) {
                        if (isset($_SESSION['cart_detail']) && is_array($_SESSION['cart_detail'])) {
                            $listCart_Detail = $_SESSION['cart_detail'];
                            foreach ($listCart_Detail as $cart_item) {
                                if (isset($cart_item['id']) && isset($cart_item['quantity'])) {
                                    $id_sanpham = $cart_item['id'];
                                    $soluong = $cart_item['quantity'];
                                    $giamua = $cart_item['price'];
                                    $cartDetailInsert = [
                                        'code_cart' => $code_cart,
                                        'product_Id' => $id_sanpham,
                                        'soLuong' => $soluong,
                                        'giamua' => $giamua,
                                    ];
                                    $cartDetailInsertStatus = insert('cart_details', $cartDetailInsert);

                                    $listProduct = getRaw("SELECT * FROM product WHERE id='$id_sanpham'");
                                    if (!empty($listProduct)) :
                                        foreach ($listProduct as $item) :
                                            $soluongtong = intval($item['soluongsp']);
                                            $soluongcon = $soluongtong - intval($soluong);
                                            $soluongbanra = intval($soluong) + intval($item['soluongbanra']);
                                        endforeach;
                                    endif;
                                    //update lại số lượng
                                    $dataUpdate = [
                                        'soluongsp' => $soluongcon,
                                        'soluongbanra' => $soluongbanra,
                                    ];
                                    $condition = "id=$id_sanpham";
                                    $productDetail = update('product', $dataUpdate, $condition);
                                }
                            }
                            unset($_SESSION['cart_detail']);
                        } else {
                            $listCart = isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : array();
                            foreach ($listCart as $product_id => $value) {
                                if (is_array($value) && isset($value['quantity'])) {
                                    $id_sanpham = $product_id;
                                    $soluong = $value['quantity'];
                                    $giamua = $value['price'];
                                    $cartDetailInsert = [
                                        'code_cart' => $code_cart,
                                        'product_Id' => $id_sanpham,
                                        'soLuong' => $soluong,
                                        'giamua' => $giamua,
                                    ];
                                    $cartDetailInsertStatus = insert('cart_details', $cartDetailInsert);
                                    //Quản lý số lượng sp
                                    $listProduct = getRaw("SELECT * FROM product WHERE id='$id_sanpham'");
                                    if (!empty($listProduct)) :
                                        foreach ($listProduct as $item) :
                                            $soluongtong = intval($item['soluongsp']);
                                            $soluongcon = $soluongtong - intval($soluong);
                                            $soluongbanra = intval($soluong) + intval($item['soluongbanra']);
                                        endforeach;
                                    endif;
                                    //update lại số lượng
                                    $dataUpdate = [
                                        'soluongsp' => $soluongcon,
                                        'soluongbanra' => $soluongbanra,
                                    ];
                                    $condition = "id=$id_sanpham";
                                    $productDetail = update('product', $dataUpdate, $condition);
                                }
                            }
                            unset($_SESSION['cart']);
                            session_write_close();
                        }
                        echo "<script>window.location.href = '" . _WEB_HOST_1 . "/check_orderDetail.php?code=" . $code_cart . "';</script>";
                    }
                }
            } else {
                setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
                setFLashData('smg_type', 'danger');
                setFLashData('errors', $errors);
                setFLashData('old', $filterAll);
            }
        } else {
            echo "<script>window.location.href = '" . $_SERVER['PHP_SELF'] . "?product_id=" . $product_id . "';</script>";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_quantity_id'], $_POST['update'])) {
    if ($_POST['form_id'] == 'form4' && isset($_POST['form_id'])) {
        $product_id = intval($_POST['update_quantity_id']);
        // Kiểm tra xem session giỏ hàng đã tồn tại chưa
        $update_action = $_POST['update'];

        // Kiểm tra xem giỏ hàng có tồn tại không
        if (isset($_SESSION['cart'][$product_id])) {
            // Lấy thông tin sản phẩm từ giỏ hàng
            $item = $_SESSION['cart'][$product_id];

            // Lấy số lượng hiện tại và cập nhật theo yêu cầu
            $current_quantity = intval($item['quantity']);

            if ($update_action === 'increase' && $current_quantity < 10) {
                $new_quantity = $current_quantity + 1;
            } elseif ($update_action === 'decrease') {
                $new_quantity = max(1, $current_quantity - 1); // Đảm bảo số lượng không nhỏ hơn 1
            }

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
        }

        // Chuyển hướng về trang giỏ hàng hoặc trang khác nếu cần
        echo "<script>window.location.href = '" . _WEB_HOST_1 . "/orderInfo.php';</script>";
    }
}
$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$errors = getFLashData('errors');
$old = getFLashData('old');
$listProvince = getRaw("SELECT * FROM province");
// echo '<pre>';
// print_r($errors);
// echo '</pre>';

?>

<div class="main_container_chil">
    <ul class="nav-list" style="padding-left: 15px; background-color:rgba(255, 255, 255, 0.8)">
        <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
        <li><a href="<?php echo _WEB_HOST_1 ?>/shopping_cart.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Giỏ hàng</a>
        </li>
        <li><a href="<?php echo _WEB_HOST_1 ?>/orderInfo.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Thông tin đặt hàng</a>
        </li>
    </ul>
    <div class="cart-layout">
        <div class="cart-info">
            <?php
            if (!empty($_GET['product_id'])) {
                $count = 0;
                if (!empty($listProduct)) :
                    foreach ($listProduct as $item) :
                        if ($item['id'] == $product_id):
                            $product_name = htmlspecialchars($item['tenSanPham']);
                            $product_image = htmlspecialchars($item['anhSanPham']);
                            $product_price = $item['giaKhuyenMai'];
                            if (!isset($_SESSION['cart_detail']) || !is_array($_SESSION['cart_detail'])) {
                                $_SESSION['cart_detail'] = array();
                            }
                            if (!isset($_SESSION['cart_detail'])) {
                                $_SESSION['cart_detail'][] = array('id' => $product_id, 'name' => $product_name, 'quantity' => 1, 'image' => $product_image, 'price' => $product_price);
                            } else {
                                unset($_SESSION['cart_detail']);
                                $_SESSION['cart_detail'][] = array('id' => $product_id, 'name' => $product_name, 'quantity' => 1, 'image' => $product_image, 'price' => $product_price);
                            }
                        endif;
                    endforeach;
                endif;
                $listCart_Detail = $_SESSION['cart_detail'];
                foreach ($listCart_Detail as $item) :
                    if ($item['id'] == $product_id):
                        $count++;
                        $imagePath_detail = "admin/modules/auth/uploads/" . $item['image'];
            ?>
                        <h3>SẢN PHẨM BẠN MUA</h3>
                        <div class="cart-info-container">

                            <div class="car-info-container-detail">
                                <div class="left">
                                    <div class="number"><?php echo $count ?></div>
                                </div>
                                <div class="center">
                                    <div class="icon">
                                        <img src="<?php echo htmlspecialchars($imagePath_detail); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                    </div>
                                    <div class="product-info">

                                        <div class="details">
                                            <div class="name"><?php echo htmlspecialchars($item['name']); ?></div>
                                            <div class="quantity">
                                                <span>Số lượng:
                                                    <a><?php echo intval($item['quantity']); ?></a>
                                                </span>

                                            </div>
                                            <div class="price">Đơn giá: <?php echo $item['price'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="money">
                                <a style="color: black">Tổng giá trị:
                                    <?php
                                    $all_total = 0;
                                    $price = floatval($item['price']) * 1000;
                                    $quantity = intval($item['quantity']);
                                    $all_total += $price * $quantity;
                                    echo '<span style="color: aqua; font-size:18px">' . number_format($all_total, 3, '.', '.') . ' VNĐ </span>';
                                    ?>
                                </a>
                                <!-- <a href="shopping_cart.php">Quay lại giỏ hàng</a> -->
                                <form action="" method="post">
                                    <input type="hidden" name="form_id" value="form1">
                                    <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                    <input type="hidden" name="product_name" value="<?php echo  htmlspecialchars($item['name']) ?>">
                                    <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($item['image']) ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $item['price'] ?>">
                                    <button class="order-right" alt="Add to cart">
                                        <i class="fa-solid fa-cart-plus" style="color: red;"></i>
                                        <span>Thêm vào giỏ hàng</span>
                                    </button>
                                </form>
                                <a href="index.php">Mua thêm ddeee!!!</a>
                            </div>
                        </div>
                <?php
                    endif;
                endforeach;
            } else {
                ?>
                <h3>SẢN PHẨM BẠN MUA</h3>
                <div class="cart-info-container">
                    <?php
                    // Lấy dữ liệu từ session
                    $listCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                    $count = 0;
                    if (!empty($listCart)) :
                        foreach ($listCart as $product_id => $item) :
                            $count++;
                            $imagePath = "admin/modules/auth/uploads/" . $item['image']; // Đảm bảo 'image' là khóa đúng
                    ?>
                            <div class="car-info-container-detail">
                                <div class="left">
                                    <div class="number"><?php echo $count ?></div>
                                </div>
                                <div class="center">
                                    <div class="icon">
                                        <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                    </div>
                                    <div class="product-info">

                                        <div class="details">
                                            <div class="name"><?php echo htmlspecialchars($item['name']); ?></div>
                                            <div class="quantity">
                                                <span>Số lượng:
                                                    <form action="" method="post">
                                                        <input type="hidden" name="form_id" value="form4">
                                                        <input type="hidden" name="update_quantity_id" value="<?php echo htmlspecialchars($product_id); ?>">
                                                        <div class="quantity_box">
                                                            <button type="submit" name="update" value="decrease">-</button>
                                                            <input type="number" name="update_quantity" value="<?php echo intval($item['quantity']); ?>" min="1" style="width:30px">
                                                            <button type="submit" name="update" value="increase">+</button>
                                                        </div>
                                                    </form>
                                                </span>
                                            </div>
                                            <div class="price">Đơn giá: <?php echo $item['price'] ?></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="money">
                    <a style="color: black">Tổng giá trị:
                        <?php
                        $all_total = 0;
                        if (!empty($_SESSION['cart'])) :
                            foreach ($_SESSION['cart'] as $product_id => $item) :
                                $price = floatval($item['price']) * 1000;
                                $quantity = intval($item['quantity']);
                                $all_total += $price * $quantity;
                            endforeach;
                        endif;
                        echo '<span style="color: aqua; font-size:18px">' . number_format($all_total, 3, '.', '.') . ' VNĐ </span>';
                        ?>
                    </a>
                    <a href="shopping_cart.php">Quay lại giỏ hàng</a>
                    <a href="index.php">Mua thêm ddeee!!!</a>
                </div>
            <?php } ?>

        </div>

        <div class="cart-form">
            <h3>THÔNG TIN ĐẶT HÀNG</h3>
            <?php
            if (!empty($smg)) {
                getSmg($smg, $smg_type);
            }
            ?>
            <p><em>Bạn cần nhập đầy đủ các trường thông tin có dấu *</em></p>
            <form action="" method="post">
                <input type="hidden" name="form_id" value="form2">
                <div class="fill-name ">
                    <label for="">Họ và tên: </label><input name="fullname" type="text" placeholder="Họ và tên *" required value="<?php echo old('fullname', $old); ?>">
                    <br>
                    <?php
                    echo (!empty($errors['fullname']['min'])) ? '<span class="error">' . $errors['fullname']['min'] . '</span>' : null
                    ?>
                </div>
                <div class="fill-tel ">
                    <label for="">Số điện thoại: </label>
                    <input name="phone" type="tel" placeholder="Số điện thoại *" required value="<?php echo old('phone', $old); ?>">
                    <br>
                    <?php
                    echo (!empty($errors['phone']['check'])) ? '<span class="error">' . $errors['phone']['check'] . '</span>' : null
                    ?>
                </div>
                <div class="fill-email ">
                    <label for="">Email: </label><input name="email" type="email" placeholder="Email" required value=" <?php echo old('email', $old); ?>">
                </div>

                <div class="delivery-options">
                    <label>Hình thức nhận hàng</label>
                    <div class="option-container">
                        <label class="option selected">
                            <input type="radio" name="delivery" value="home" checked>
                            <span class="checkmark"></span>
                            Nhận hàng tại nhà
                        </label>
                        <!-- <label class="option">
                            <input type="radio" name="delivery" value="store">
                            <span class="checkmark"></span>
                            Nhận hàng tại cửa hàng
                        </label> -->
                    </div>
                </div>
                <script>
                    document.querySelectorAll('.option').forEach(option => {
                        option.addEventListener('click', function() {
                            document.querySelectorAll('.option').forEach(opt => opt.classList.remove('selected'));
                            this.classList.add('selected');
                        });
                    });
                </script>

                <div id="homeDelivery" class="delivery-fields">
                    <div class="address">
                        <div class="province">
                            <select name="province_id" id="province_id" required>
                                <option value="">--Chọn Tỉnh/Thành phố--</option>
                                <?php
                                if (!empty($listProvince)) :
                                    foreach ($listProvince as $item) :
                                ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="district">
                            <select name="district_id" id="district_id" required>
                                <option value="">-- Chọn Quận/Huyện--</option>
                            </select>
                        </div>
                    </div>
                    <div class="detail-address">
                        <input name="diachi_nha" type="text" placeholder="Địa chỉ nhận hàng *" required>
                    </div>
                </div>
                <!-- 
                <div id="storePickup" class="delivery-fields" style="display:none;">
                    <div class="store-address">
                        <input name="diachi_cuahang" type="text" value="Địa chỉ cửa hàng: Tiểu vương quốc Hóc Môn ">
                    </div>
                </div> -->

                <script>
                    document.querySelectorAll('input[name="delivery"]').forEach(radio => {
                        radio.addEventListener('change', function() {
                            if (this.value === 'home') {
                                document.getElementById('homeDelivery').style.display = 'block';
                                document.getElementById('storePickup').style.display = 'none';
                            } else {
                                document.getElementById('homeDelivery').style.display = 'none';
                                document.getElementById('storePickup').style.display = 'block';
                            }
                        });
                    });
                </script>

                <div class="note">
                    <textarea name="note" placeholder="Ghi chú" rows="3"></textarea>
                </div>
                <div class="payment-method">
                    <label for="">Phương thức thanh toán</label>
                    <div class="payment-option-all">
                        <div class="payment-option">
                            <input type="radio" id="cash" name="payment_method" value="Tiền mặt" required>
                            <label for="cash">Tiền mặt</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" id="bank_transfer" name="payment_method" value="Chuyển khoản" required>
                            <label for="bank_transfer">Chuyển khoản</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" id="momo" name="payment_method" value="momo" required>
                            <label for="momo">
                                <img src="<?php echo BASE_URL; ?>images/orderInfo/MoMo_Logo.png" alt="Momo" style=" width: 30px;height: 30px; margin-right: 5px;" required> Momo
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" id="vnpay" name="payment_method" value="vnpay" required>
                            <label for="vnpay">
                                <img src="<?php echo BASE_URL; ?>images/orderInfo/Logo-VNPAY-QR.webp" alt="Vnpay" style=" width: 60px;height: 20px; margin-right: 5px;"> Vnpay
                            </label>
                        </div>
                    </div>
                </div>

                <div class="confirm">
                    <button type="submit" onclick="return confirm ('Bạn có chắc chắn đặt hàng?')">XÁC NHẬN VÀ ĐẶT HÀNG</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('#province_id').change(function() {
            var x = $(this).val();
            console.log("Value of x :", x);
            $.get("<?php echo _WEB_HOST_1 ?>/orderInfo_ajax.php", {
                province_id: x
            }, function(data) {
                console.log("Value of province :", province_id);
                $("#district_id").html(data);
            });
        });
    })
</script>
<script src="js/cart-orderInfo.js"></script>

</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
