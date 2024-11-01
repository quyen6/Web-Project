<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
$listCartegory = getRaw("SELECT * FROM cartegory");
$listProduct = getRaw("SELECT * FROM product");
$listBrand = getRaw("SELECT * FROM brand");

$filterAll = filter();
if (!empty($filterAll['id'])) {
    $product_Id = $filterAll['id'];
    $productDetail = oneRaw("SELECT * FROM product WHERE id='$product_Id'");
    if ($productDetail) {
        setFLashData('product-dail', $productDetail);
    } else {
        redirect('?module=auth&action=productList');
    }
}
if (isPost()) {
    $dataUpdate = [
        'tenSanPham' => $_POST['tenSanPham'] ?? $old['tenSanPham'] ?? '',
        'giam' => $_POST['giam'] ?? $old['giam'] ?? '',
        'giaSanPham' => $_POST['giaSanPham'] ?? $old['giaSanPham'] ?? '',
        'giaKhuyenMai' => $_POST['giaKhuyenMai'] ?? $old['giaKhuyenMai'] ?? '',
        'soluongsp' => $_POST['soluongsp'] ?? '',
        'thongTinSanPham' => $_POST['thongTinSanPham'] ?? $old['thongTinSanPham'] ?? '',
        'kichThuocManHinh' => $_POST['kichThuocManHinh'] ?? $old['kichThuocManHinh'] ?? '',
        'congNgheManHinh' => $_POST['congNgheManHinh'] ?? $old['congNgheManHinh'] ?? '',
        'doPhanGiaiManHinh' => $_POST['dophangiai'] ?? $old['doPhanGiaiManHinh'] ?? '',
        'cameraSau' => $_POST['cameraSau'] ?? $old['cameraSau'] ?? '',
        'cameraTruoc' => $_POST['cameraTruoc'] ?? $old['cameraTruoc'] ?? '',
        'chipset' => $_POST['chipset'] ?? $old['chipset'] ?? '',
        'cardDoHoa' => $_POST['cardDoHoa'] ?? $old['cardDoHoa'] ?? '',
        'dungLuongRam' => $_POST['dungLuongRam'] ?? $old['dungLuongRam'] ?? '',
        'boNhoTrong' => $_POST['boNhoTrong'] ?? $old['boNhoTrong'] ?? '',
        'LoaiRam' => $_POST['LoaiRam'] ?? $old['LoaiRam'] ?? '',
        'oCung' => $_POST['oCung'] ?? $old['oCung'] ?? '',
        'pin' => $_POST['pin'] ?? $old['pin'] ?? '',
        'heDieuHanh' => $_POST['heDieuHanh'] ?? $old['heDieuHanh'] ?? '',
    ];
    $condition = "id=$product_Id";
    $updateStatus = update('product', $dataUpdate, $condition);
    if ($updateStatus) {
        setFLashData('smg', 'Sửa thông tin sản phẩm thành công!!');
        setFLashData('smg_type', 'success');
        $filename = $_FILES['anhMoTa']['name'];
        $filetmp = $_FILES['anhMoTa']['tmp_name'];

        foreach ($filename as $key => $value) {
            move_uploaded_file($filetmp[$key], "C:/xampp/htdocs/Web_Project/admin/modules/auth/uploads/" . $value);
            $imgInsert = [
                'product_Id' => $product_Id,
                'anhMoTa' => $value,
            ];

            insert('product_images', $imgInsert);
        }
    } else {
        setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
        setFLashData('smg_type', 'danger');
        setFLashData('old', $filterAll['$old']);
    }
    // redirect('?module=auth&action=productEdit&id=' . $product_Id);
}
layout('header');

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
$old = getFLashData('old');
$productDetailll = getFLashData('product-dail');
if ($productDetailll) {
    $old = $productDetailll;
}
// echo "<pre>";
// print_r($old);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-product_add">
        <h1>Sửa sản phẩm</h1>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product_Id ?>">
            <label for="">Nhập tên sản phẩm <span style="color:red;">*</span></label>
            <input name="tenSanPham" required type="text" placeholder="Nhập tên sản phẩm" value="<?php echo old('tenSanPham', $old); ?>">
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

            <label for="brand_id">Chọn loại sản phẩm<span style="color:red;">*</span></label>
            <select name="brand_id" id="brand_id">
                <option value="#">--Chọn loại sản phẩm--</option>
            </select>
            <label for="">Giảm<span style="color:red;">*</span></label>
            <input name="giam" required type="text" placeholder="Giảm" value="<?php echo old('giam', $old); ?>">
            <label for="">Giá sản phẩm<span style="color:red;">*</span></label>
            <input name="giaSanPham" required type="text" placeholder="Giá sản phẩm" value="<?php echo old('giaSanPham', $old); ?>">
            <label for="">Giá khuyến mãi<span style="color:red;">*</span></label>
            <input name="giaKhuyenMai" required type="text" placeholder="Giá khuyến mãi" value="<?php echo old('giaKhuyenMai', $old); ?>">
            <label for="">Số lượng sản phẩm<span style="color:red;">*</span></label>
            <input name="soluongsp" required type="text" placeholder="Số lượng sản phẩm" value="<?php echo old('soluongsp', $old); ?>">
            <label for="">Thông tin sản phẩm<span style="color:red;">*</span></label>
            <textarea required name="thongTinSanPham" id="editor1" cols="30" rows="5" value="<?php echo old('thongTinSanPham', $old); ?>"></textarea>
            <label for="">Ảnh sản phẩm<span style="color:red;">*</span></label>
            <input name="anhSanPham" type="file" value="<?php echo old('anhSanPham', $old); ?>">
            <label for="">Ảnh mô tả<span style="color:red;">*</span></label>
            <input multiple type="file" name="anhMoTa[]" value="<?php echo old('anhMoTa', $old); ?>">
            <br>
            <div class="phone-specs">
                <h2>Thông số kỹ thuật</h2>
                <br>
                <label for="">Kích thước màn hình</label>
                <input name="kichThuocManHinh" type="text" placeholder="Kích thước màn hình" value="<?php echo old('kichThuocManHinh', $old); ?>">
                <label for="">Công nghệ màn hình</label>
                <input name="congNgheManHinh" type="text" placeholder="Công nghệ màn hình" value="<?php echo old('congNgheManHinh', $old); ?>">
                <label for="">Độ phân giải màn hình</label>
                <input name="doPhanGiaiManHinh" type="text" placeholder="Độ phân giải màn hình" value="<?php echo old('doPhanGiaiManHinh', $old); ?>">
                <label for="">Camera sau</label>
                <input name="cameraSau" type="text" placeholder="Camera sau" value="<?php echo old('cameraSau', $old); ?>">
                <label for="">Camera trước</label>
                <input name="cameraTruoc" type="text" placeholder="Camera trước" value="<?php echo old('cameraTruoc', $old); ?>">
                <label for="">Chipset</label>
                <input name="chipset" type="text" placeholder="Chipset" value="<?php echo old('chipset', $old); ?>">
                <label for="">Dung lượng RAM</label>
                <input name="dungLuongRam" type="text" placeholder="Dung lượng RAM" value="<?php echo old('dungLuongRam', $old); ?>">
                <label for="">Bộ nhớ trong</label>
                <input name="boNhoTrong" type="text" placeholder="Bộ nhớ trong" value="<?php echo old('boNhoTrong', $old); ?>">
                <label for="">Pin</label>
                <input name="pin" type="text" placeholder="Pin" value="<?php echo old('pin', $old); ?>">
                <label for="">Hệ điều hành</label>
                <input name="heDieuHanh" type="text" placeholder="Hệ điều hành" value="<?php echo old('heDieuHanh', $old); ?>">
            </div>
            <div class="laptop-specs">
                <h2>Thông số kỹ thuật</h2>
                <label for="">Loại card đồ họa</label>
                <input name="cardDoHoa" type="text" placeholder="Loại card đồ họa" value="<?php echo old('cardDoHoa', $old); ?>">
                <label for="">Dung lượng RAM</label>
                <input name="dungLuongRam" type="text" placeholder="Dung lượng RAM" value="<?php echo old('dungLuongRam', $old); ?>">
                <label for="">Loại RAM</label>
                <input name="LoaiRam" type="text" placeholder="Loại RAM" value="<?php echo old('LoaiRam', $old); ?>">
                <label for="">Ổ cứng</label>
                <input name="oCung" type="text" placeholder="Ổ cứng" value="<?php echo old('oCung', $old); ?>">
                <label for="">Kích thước màn hình</label>
                <input name="kichThuocManHinh" type="text" placeholder="Kích thước màn hình" value="<?php echo old('kichThuocManHinh', $old); ?>">
                <label for="">Công nghệ màn hình</label>
                <input name="congNgheManHinh" type="text" placeholder="Công nghệ màn hình" value="<?php echo old('congNgheManHinh', $old); ?>">
                <label for="">Pin</label>
                <input name="pin" type="text" placeholder="Pin" value="<?php echo old('pin', $old); ?>">
                <label for="heDieuHanh">Hệ điều hành</label>
                <input name="heDieuHanh" type="text" placeholder="Hệ điều hành" value="<?php echo old('heDieuHanh', $old); ?>">
                <label for="">Độ phân giải màn hình</label>
                <input name="doPhanGiaiManHinh" type="text" placeholder="Độ phân giải màn hình" value="<?php echo old('doPhanGiaiManHinh', $old); ?>">
            </div>
            <button type="submit">Sửa</button>
        </form>
    </div>
    <script src="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>"></script>
    <script>
        $(document).ready(function() {
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
            $('input[name="giaSanPham"], input[name="giam"]').on('input', function() {
                var giaSanPham = parseFloat($('input[name="giaSanPham"]').val()) || 0;
                var giam = parseFloat($('input[name="giam"]').val()) || 0;
                var giaKhuyenMai = giaSanPham - (giaSanPham * giam / 100);
                giaKhuyenMai = Math.round(giaKhuyenMai * 100) / 100; // Round to 2 decimal places
                $('input[name="giaKhuyenMai"]').val(formatNumber(giaKhuyenMai));
            });
            $('input[name="giaSanPham"]').on('blur', function() {
                var value = $(this).val().replace(/\./g, '');
                $(this).val(formatNumber(value));
            });
        });
    </script>
    <script>
        CKEDITOR.replace('editor1', {
            // filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
            // filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
</body>

</html>
<?php
layout('footer');
