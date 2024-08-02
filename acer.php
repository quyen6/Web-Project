<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

$listBrand = getRaw("SELECT * FROM brand");
$listProduct = getRaw("SELECT * FROM product");

$filterAll = filter();
if (!empty($filterAll['brand_id'])) {
    $brandId = $filterAll['brand_id'];
    $brandDetail = oneRaw("SELECT * FROM product WHERE brand_Id='$brandId'");
    if ($brandDetail) {
        setFLashData('admin-dail', $brandDetail);
    } else {
        echo "Loi";
    }
}

$smg = getFLashData('smg');
$smg_type = getFLashData('smg_type');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/mobile.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/hot-prod.css? ver= <?php echo rand() ?>">
    <!-- <style>
        .mobile-container {
    width: 100%;
    padding: 5px;
    margin: 0 auto;
    background-color: #f8f9fa;

}
    </style> -->
</head>

<body>
    <div class="mobile-container">
        <ul class="nav-list">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/laptop.php" target="page"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Laptop</a>
            </li>
            <li><a href=""><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>
                    <?php
                    if (!empty($listBrand)) :
                        foreach ($listBrand as $item) :
                            if ($item['id'] == $brandId) :
                                echo $item['name'];
                            endif;
                        endforeach;
                    endif;
                    ?>
                </a></li>
        </ul>
        <div class="clear"></div>
        <div class="condition">
            <div class="filter-sort_title">
                Chọn tiêu chí
            </div>
            <div class="filter-sort_list-filter">
                <div class="filter-wrapper">
                    <button class="btn-filter">
                        <i class="fa-solid fa-filter" style="margin-right: 5px;"></i>
                        Bộ lọc
                    </button>
                </div>

                <div class="filter-price">
                    <button class="btn-filter">
                        Giá
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                </div>

                <div class="filter-memory">
                    <button class="btn-filter">
                        Dung lượng RAM
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                </div>

                <div class="filter-capacityRam">
                    <button class="btn-filter">
                        Ổ cứng
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                </div>
            </div>
            <div class="filter-sort_title">
                Sắp xếp theo
            </div>
            <div class="filter-sort_list-filter">
                <div class="filter-price_than">
                    <button class="btn-filter">
                        <i class="fa-solid fa-arrow-down-wide-short" style="margin-right: 5px;"></i>
                        Giá Cao - Thấp
                    </button>
                </div>

                <div class="filter-price_than">
                    <button class="btn-filter">
                        <i class="fa-solid fa-arrow-up-wide-short" style="margin-right: 5px;"></i>
                        Giá Thấp - Cao
                    </button>
                </div>
            </div>
        </div>

        <div class="prod-laptop">
            <div class="prod-laptop1">
                <?php
                if (!empty($listProduct)) :
                    foreach ($listProduct as $item) :
                        if ($item['brand_Id'] == $brandId && $item['cartegory_Id'] == '2') :
                            $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                ?>
                            <div class="laptop-link">
                                <a href="">
                                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $item['tenSanPham']; ?>">
                                    <div class="name"><?php echo $item['tenSanPham'] ?></div>

                                    <?php
                                    if ($item['giam'] != '0') :
                                    ?>
                                        <div class="sale">Giảm <?php echo $item['giam'] ?>%</div>
                                        <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ <del><?php echo $item['giaSanPham'] ?>đ</del></div>
                                    <?php
                                    else :
                                    ?>
                                        <div class="price"><?php echo $item['giaKhuyenMai'] ?>đ</div>
                                    <?php
                                    endif;
                                    ?>
                                    <div class="tragop">Trả góp 0%</div>
                                    <div></div>
                                    <div class="love-icon">
                                        <div class="detail-star">
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                        <button class="add-product" value="<?php echo $item['id']; ?>">
                                            <!-- <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>"> -->
                                            <img src="images/hot-prod/cart-icon.png">
                                        </button>

                                    </div>
                                </a>
                            </div>
                <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>


</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');