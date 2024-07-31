<?php
if (isPost()) {
    var_dump($_POST, $_FILES);
    // $filterAll = filter();
    $dataInsert = [
        'tenSanPham' => $_POST['tenSanPham'] ?? '',
        'cartegory_Id' => $_POST['cartegory_id'] ?? '',
        'brand_Id' => $_POST['brand_id'] ?? '',
        'giam' => $_POST['giam'] ?? '',
        'giaSanPham' => $_POST['giaSanPham'] ?? '',
        'giaKhuyenMai' => $_POST['giaKhuyenMai'] ?? '',
        'anhSanPham' => $_POST['anhSanPham'] ?? '',
        // // move_uploaded_file($_FILES['anhSanPham']['tmp_name'],"uploads/".$_FILES['anhSanPham']['name']),
        'kichThuocManHinh' => $_POST['kichThuocManHinh'] ?? '',
        'congNgheManHinh' => $_POST['congNgheManHinh'] ?? '',
        'doPhanGiaiManHinh' => $_POST['dophangiai'] ?? '',
        'tanSoQuet' => $_POST['tansoquet'] ?? '',
        'manHinhCamUng' => $_POST['manHinhCamUng'] ?? '',
        'chatLieuTamNen' => $_POST['chatLieuTamNen'] ?? '',
        'cameraSau' => $_POST['cameraSau'] ?? '',
        'quayVideoSau' => $_POST['quayVideoSau'] ?? '',
        'cameraTruoc' => $_POST['cameraTruoc'],
        'quayVideoTruoc' => $_POST['quayVideoTruoc'] ?? '',
        'chipset' => $_POST['chipset'] ?? '',
        'loaiCPU' => $_POST['loaiCPU'] ?? '',
        'GPU' => $_POST['GPU'] ?? '',
        'cardDoHoa' => $_POST['cardDoHoa'] ?? '',
        'dungLuongRam' => $_POST['dungLuongRam'] ?? '',
        'boNhoTrong' => $_POST['boNhoTrong'] ?? '',
        'kheCamTheNho' => $_POST['kheCamTheNho'] ?? '',
        'LoaiRam' => $_POST['LoaiRam'] ?? '',
        'oCung' => $_POST['oCung'] ?? '',
        'pin' => $_POST['pin'] ?? '',
        'congSac' => $_POST['congSac'] ?? '',
        'kichThuoc' => $_POST['kichThuoc'] ?? '',
        'trongLuong' => $_POST['trongLuong'] ?? '',
        'chatLieuMatLung' => $_POST['chatLieuMatLung'] ?? '',
        'chatLieuKhungVien' => $_POST['chatLieuKhungVien'] ?? '',
        'heDieuHanh' => $_POST['heDieuHanh'] ?? '',
        'wiFi' => $_POST['wiFi'] ?? '',
        'BlueTooth' => $_POST['Btooth'] ?? '',
        'tinhNangDacBiet' => $_POST['tinhNangDacBiet'] ?? '',
        'thoiDiemRaMat' => $_POST['thoiDiemRaMat'] ?? '',
        'create_at' => date('Y-m-d H:i:s'),
    ];
    echo "<pre>";
    print_r($dataInsert);
    echo "</pre>";
    $insertStatus = insert('product', $dataInsert);
    if ($insertStatus) {
        setFLashData('smg', 'Thêm sản phẩm mới thành công!!');
        setFLashData('smg_type', 'success');
        redirect('?module=auth&action=productAdd-phone');
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        redirect('?module=auth&action=productAdd-phone');
    }
}

// layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');

$listCartegory = getRaw("SELECT * FROM cartegory");
$listBrand = getRaw("SELECT * FROM brand");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản phẩm</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>">
    <!-- <link rel="stylesheet" href="custom.js"> -->
    <!-- <link rel="stylesheet" href="/admin/templates/css/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="admin-content-product_add">
        <h1>Thêm Sản phẩm</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post">
            <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
            <input name="tenSanPham" required type="text" placeholder="Nhập tên sản phẩm">
            <label for="cartegory_id">Chọn Danh mục<span style="color:red;">*</span></label>
            <select name="cartegory_id" id="cartegory_id">
                <option value="#">--Chọn Danh mục--</option>
                <?php
                if (!empty($listCartegory)) :
                    foreach ($listCartegory as $item) :
                ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                <?php
                    endforeach;
                endif;
                ?>
            </select>

            <label for="">Chọn loại sản phẩm<span style="color:red;">*</span></label>
            <select name="brand_id" id="brand_id">
                <option value="#">--Chọn loại sản phẩm--</option>
            </select>
            <label for="">Giảm<span style="color:red;">*</span></label>
            <input name="giam" required type="text" placeholder="Giảm">
            <label for="">Giá sản phẩm<span style="color:red;">*</span></label>
            <input name="giaSanPham" required type="text" placeholder="Giá sản phẩm">
            <label for="">Giá khuyến mãi<span style="color:red;">*</span></label>
            <input name="giaKhuyenMai" required type="text" placeholder="Giá khuyến mãi">
            <!-- <label for="">Tính năng nổi bật<span style="color:red;">*</span></label>
            <textarea name="" id="" cols="30" rows="5"></textarea> -->
            <label for="">Ảnh sản phẩm<span style="color:red;">*</span></label>
            <input name="anhSanPham" type="file">
            <label for="">Ảnh mô tả<span style="color:red;">*</span></label>
            <input multiple type="file">
            <br>
            <h2>Thông số kỹ thuật</h2>
            <h3>Màn hình</h3>
            <br>
            <label for="">Kích thước màn hình</label>
            <input name="kichThuocManHinh" type="text" placeholder="Kích thước màn hình">
            <label for="">Công nghệ màn hình</label>
            <input name="congNgheManHinh" type="text" placeholder="Công nghệ màn hình">
            <label for="">Độ phân giải màn hình</label>
            <input name="dophangiai" type="text" placeholder="Độ phân giải màn hình">
            <label for="">Tần số quét</label>
            <input name="tansoquet" type="text" placeholder="Tần số quét">
            <label for="">Màn hình cảm ứng</label>
            <input name="manHinhCamUng" type="text" placeholder="Màn hình cảm ứng">
            <label for="">Chất liệu tấm nền</label>
            <input name="chatLieuTamNen" type="text" placeholder="Chất liệu tấm nền">
            <h3>Camera sau</h3>
            <br>
            <label for="">Camera sau</label>
            <input name="cameraSau" type="text" placeholder="Camera sau">
            <label for="">Quay video</label>
            <input name="quayVideoSau" type="text" placeholder="Quay video">
            <h3>Camera trước</h3><br>
            <label for="">Camera trước</label>
            <input name="cameraTruoc" type="text" placeholder="Camera trước">
            <label for="">Quay video trước</label>
            <input name="quayVideoTruoc" type="text" placeholder="Quay video trước">
            <h3>Vi xử lý & đồ họa</h3>
            <br>
            <label for="">Chipset</label>
            <input name="chipset" type="text" placeholder="Chipset">
            <label for="">Loại CPU</label>
            <input name="loaiCPU" type="text" placeholder="Loại CPU">
            <label for="">GPU</label>
            <input name="GPU" type="text" placeholder="GPU">
            <label for="">Loại card đồ họa</label>
            <input name="cardDoHoa" type="text" placeholder="Loại card đồ họa">
            <h3>VRAM & lưu trữ</h3>
            <br>
            <label for="">Dung lượng RAM</label>
            <input name="dungLuongRam" type="text" placeholder="Dung lượng RAM">
            <label for="">Bộ nhớ trong</label>
            <input name="boNhoTrong" type="text" placeholder="Bộ nhớ trong">
            <label for="">Khe cắm thẻ nhớ</label>
            <input name="kheCamTheNho" type="text" placeholder="Khe cắm thẻ nhớ">
            <label for="">Loại RAM</label>
            <input name="LoaiRam" type="text" placeholder="Loại RAM">
            <label for="">Ổ cứng</label>
            <input name="oCung" type="text" placeholder="Ổ cứng">
            <h3>Pin & công nghệ sạc</h3>
            <br>
            <label for="">Pin</label>
            <input name="pin" type="text" placeholder="Pin">
            <label for="">Cổng sạc</label>
            <input name="congSac" type="text" placeholder="Cổng sạc">
            <h3>Thiết kế & Trọng lượng</h3>
            <br>
            <label for="">Kích thước</label>
            <input name="kichThuoc" type="text" placeholder="Kích thước">
            <label for="">Trọng lượng</label>
            <input name="trongLuong" type="text" placeholder="Trọng lượng">
            <label for="">Chất liệu mặt lưng</label>
            <input name="chatLieuMatLung" type="text" placeholder="Chất liệu mặt lưng">
            <label for="">Chất liệu khung viền</label>
            <input name="chatLieuKhungVien" type="text" placeholder="Chất liệu khung viền">
            <h3>Giao tiếp & kết nối</h3>
            <br>
            <label for="">Hệ điều hành</label>
            <input name="heDieuHanh" type="text" placeholder="Hệ điều hành">
            <label for="">Wi-Fi</label>
            <input name="wiFi" type="text" placeholder="Wi-Fi">
            <label for="">Bluetooth</label>
            <input name="Btooth" type="text" placeholder="Bluetooth">
            <h3>Tiện ích khác</h3>
            <br>
            <label for="">Tính năng đặc biệt</label>
            <input name="tinhNangDacBiet" type="text" placeholder="Tính năng đặc biệt">
            <h3>Thông tin chung</h3>
            <br>
            <label for="">Thời điểm ra mắt</label>
            <input name="thoiDiemRaMat" type="text" placeholder="Thời điểm ra mắt">
            <button type="submit">Thêm</button>
        </form>
    </div>
    <script src="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>"></script>
    <script>
        $(document).ready(function() {
            $('#cartegory_id').change(function() {
                var x = $(this).val();
                $.get("<?php echo _WEB_HOST ?>?module=auth&action=productAdd_ajax", {
                    cartegory_id: x
                }, function(data) {
                    $("#brand_id").html(data);
                });
            });
        });
    </script>
</body>

</html>