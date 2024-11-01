<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
if (!isLogin()) {
    session_regenerate_id(true);
    redirect('?module=active&action=login');
}
//Truy vấn vào bảng users
$listProduct = getRaw("SELECT * FROM product WHERE status=1");
$listBrand = getRaw("SELECT * FROM brand");
$listCartegory = getRaw("SELECT * FROM cartegory");
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $listProduct = getRaw("SELECT * FROM product WHERE status=$status");
}
layout('header');
$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANH SÁCH SẢN PHẨM</title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
</head>

<body>
    <div class="admin-content-cartegory_list" style="width:1250px">
        <h2>DANH SÁCH SẢN PHẨM</h2>
        <?php
        if (!empty($smg)) {
            getSmg($smg, $smg_type);
        }
        ?>
        <form method="GET" action="">
            <input type="hidden" name="module" value="auth">
            <input type="hidden" name="action" value="productList">
            <select name="status">
                <option value="1" <?php echo isset($_GET['status']) && $_GET['status'] == '1' ? 'selected' : '' ?>>Hiện</option>
                <option value="0" <?php echo isset($_GET['status']) && $_GET['status'] == '0' ? 'selected' : '' ?>>Ẩn</option>
            </select>
            <button type="submit">Lọc</button>
        </form>
        <table style="width:1300px">
            <thead>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Danh mục</th>
                <th>Hãng</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giảm giá</th>
                <th>Giá sản phẩm</th>
                <th>Giá khuyến mãi</th>
                <th>Số lượng trong kho</th>
                <th>Số lượng bán ra</th>
                <th width="5%">Trạng thái</th>
                <th width="5%">Sửa</th>
                <!-- <th width="5%">Xóa</th> -->
            </thead>
            <tbody>
                <?php
                if (!empty($listProduct)) :
                    $count = 0; //số thứ tự
                    foreach ($listProduct as $item) :
                        $imagePath = "modules/auth/uploads/" . $item['anhSanPham'];
                        $count++;
                ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php
                                foreach ($listCartegory as $item_cartegory) :
                                    if ($item['cartegory_Id'] == $item_cartegory['id']) :
                                        echo $item_cartegory['name'];
                                    endif;
                                endforeach;
                                ?></td>
                            <td>
                                <?php
                                foreach ($listBrand as $item_brand) :
                                    if ($item['brand_Id'] == $item_brand['id']) :
                                        echo $item_brand['name'];
                                    endif;
                                endforeach;
                                ?>
                            </td>
                            <td><?php echo $item['tenSanPham'] ?></td>
                            <td> <img style="width:100px; height:100px" src="<?php echo $imagePath; ?>" alt="<?php echo $item['tenSanPham']; ?>"></td>
                            <td><?php echo $item['giam'] ?></td>
                            <td><?php echo $item['giaSanPham'] ?>đ</td>
                            <td><?php echo $item['giaKhuyenMai'] ?>đ</td>
                            <td><?php echo $item['soluongsp'] ?></td>
                            <td><?php echo ($item['soluongbanra'] != null) ? $item['soluongbanra'] : 0 ?></td>
                            <td>
                                <select method="post" name="product_status" class="product_status" data-id="<?php echo $item['id']; ?>" style="width:70px">
                                    <option value="0" <?php echo ($item['status'] == 0) ? 'selected' : ''; ?>>Ẩn</option>
                                    <option value="1" <?php echo ($item['status'] == 1) ? 'selected' : ''; ?>>Hiện</option>
                                </select>
                            </td>
                            <td><a href="<?php echo _WEB_HOST ?>?module=auth&action=productEdit&id=<?php echo $item['id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <!-- <td><a href="<?php echo _WEB_HOST ?>?module=auth&action=productDelete&id=<?php echo $item['id'] ?>" onclick="return confirm ('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td> -->
                        </tr>
                    <?php
                    endforeach;
                else :
                    ?>
                    <tr>
                        <td colspan="14">
                            <div class="alert alert-danger text-center">Không có hãng nào!!</div>
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
            $('.product_status').change(function() {
                var product_id = $(this).data('id');
                var product_status = $(this).val();
                if (product_id && product_status) {
                    $.ajax({
                        url: "<?php echo _WEB_HOST ?>/?module=auth&action=processe_product",
                        method: "POST",
                        data: {
                            id: product_id,
                            status: product_status
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
