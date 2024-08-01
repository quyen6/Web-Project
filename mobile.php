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

$listBrand = getRaw("SELECT * FROM brand");
$listProduct = getRaw("SELECT * FROM product");

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
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/hot-prod.css">
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
            <li><a href="<?php echo _WEB_HOST_1 ?>/trangchu.php"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/mobile.php" target="page"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Điện
                    thoại</a>
            </li>
        </ul>
        <div class="clear"></div>

        <div class="list-brand">
            <nav>
                <?php
                if (!empty($listBrand)) :
                    foreach ($listBrand as $item) :
                        if ($item['cartegory_Id'] == '1') :
                ?>
                            <a href="<?php echo _WEB_HOST_1 ?>/apple.php?brand_id=<?php echo $item['id'] ?>" target="page" class="list-brand_item"><span><?php echo $item['name'] ?></span> </a>

                <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </nav>
        </div>

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
                        Bộ nhớ trong
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                </div>

                <div class="filter-capacityRam">
                    <button class="btn-filter">
                        Dung lượng RAM
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

        <div class="hot-prod">
            
      
            <div class="prod-mobile">
                <div class="prod-mobile1">
                <?php
                        // Bước 1: Lọc sản phẩm theo danh mục
                        // $filteredProducts = array_filter($listProduct, function($item) {
                        //     return $item['cartegory_Id'] == '2';
                        // });

                        // Bước 2: Trộn danh sách sản phẩm
                        // shuffle($filteredProducts);

                        // Bước 3: Lấy 15 sản phẩm đầu tiên
                        // $selectedProducts = array_slice($filteredProducts, 0, 20);
                    ?>
                    <?php
                    if (!empty($listProduct)) :
                        foreach ($listProduct as $item) :
                            if ($item['cartegory_Id'] == '1') :
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
                                        <div class="love-icon">
                                            <div class="detail-star">
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            </div>
                                            <form action="update_cart.php" method="POST">
                                            <button type="submit" name="update_cart" value="1"><img src="images/hot-prod/cart-icon.png"></button>
                                            </form>
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
    </div>


</body>

</html>