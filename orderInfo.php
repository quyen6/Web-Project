<?php
require_once "./admin/config.php";
require_once "./admin/includes/connect.php";

//Thư viện phpmailer
require_once "./admin/includes/phpmailer/Exception.php";
require_once "./admin/includes/phpmailer/PHPMailer.php";
require_once "./admin/includes/phpmailer/SMTP.php";

require_once "./admin/includes/function.php";
require_once "./admin/includes/database.php";
require_once "./admin/includes/session.php";

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

if (isPost()) {
    // var_dump($_POST,$_FILES);
    $hinhThucNH = $_POST['delivery'] ?? '';
    $diachi = ($hinhThucNH == 'home') ? ($_POST['diachi_nha'] ?? '') : ($_POST['diachi_cuahang'] ?? '');
    $provinceId = $_POST['province_id'] ?? '';
    $districtId = $_POST['district_id'] ?? '';

    $provinceName = getProvinceName($provinceId);
    $districtName = getDistrictName($districtId);
    $dataInsert = [
        'hoten' => $_POST['fullname'] ?? '',
        'soDienThoai' => $_POST['phone'] ?? '',
        'email' => $_POST['email'] ?? '',
        'hinhThucNH' => $hinhThucNH,
        'tinh' => $provinceName,
        'huyen' => $districtName,
        'diachi' => $diachi,
        'ghiChu' => $_POST['note'] ?? '',
    ];
    $insertStatus = insert('orders', $dataInsert);
    if ($insertStatus) {
        setFLashData('smg', 'Đặt hàng thành công!!');
        setFLashData('smg_type', 'success');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
    }
}
$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$listProvince = getRaw("SELECT * FROM province")
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/orderInfo.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="cart-layout">
        <div class="cart-info">

            ihihihiih
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
                <div class="fill-name">
                    <input name="fullname" type="text" placeholder="Họ và tên *" required>
                </div>
                <div class="fill-tel">
                    <input name="phone" type="tel" placeholder="Số điện thoại *" required>
                </div>
                <div class="fill-email">
                    <input name="email" type="email" placeholder="Email">
                </div>

                <div class="delivery-options">
                    <strong>Hình thức nhận hàng</strong>
                    <div class="option-container">
                        <label class="option selected">
                            <input type="radio" name="delivery" value="home" checked>
                            <span class="checkmark"></span>
                            Nhận hàng tại nhà
                        </label>
                        <label class="option">
                            <input type="radio" name="delivery" value="store">
                            <span class="checkmark"></span>
                            Nhận hàng tại cửa hàng
                        </label>
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
                            <select name="province_id" id="province_id">
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
                            <select name="district_id" id="district_id">
                                <option value="">-- Chọn Quận/Huyện--</option>
                            </select>
                        </div>
                    </div>
                    <div class="detail-address">
                        <input name="diachi_nha" type="text" placeholder="Địa chỉ nhận hàng *">
                    </div>
                </div>

                <div id="storePickup" class="delivery-fields" style="display:none;">
                    <div class="store-address">
                        <input name="diachi_cuahang" type="text" value="Địa chỉ cửa hàng: Tiểu vương quốc Hóc Môn ">
                    </div>
                </div>

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

                <div class="confirm">
                    <button type="submit">XÁC NHẬN VÀ ĐẶT HÀNG</button>
                </div>
            </form>
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
</body>

</html>