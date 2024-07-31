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

$listProduct = getRaw("SELECT * FROM brand");
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
    <link rel="stylesheet" href="./css/mobile.css">
</head>

<body>
    <div class="mobile-container">
        <ul class="nav-list">
            <li><a href="/index.html"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href=""><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Điện
                    thoại</a>
            </li>
        </ul>
    </div>
    <div class="clear"></div>

    <div class="list-brand">
        <nav>
            <?php
            if (!empty($listProduct)) :
                foreach ($listProduct as $item) :
            ?>
                    <a href="#" class="list-brand_item"><span><?php echo $item['name'] ?></span> </a>
                    
            <?php
                endforeach;
            endif;
            ?>
            <!-- <a href="#" class="list-brand_item"><span><i class="fa-brands fa-apple"
                        style="margin-right: 5px; font-size: 18px;"></i>Apple</span> </a>
            <a href="#" class="list-brand_item"><span style="color: blue;">Samsung</span> </a>
            <a href="#" class="list-brand_item"><span style="color:green;">Oppo</span> </a>
            <a href="#" class="list-brand_item"><span style="color: gray;">xiaomi</span> </a>
            <a href="#" class="list-brand_item"><span style="color: rgb(35, 118, 226);">vivo</span> </a>
            <a href="#" class="list-brand_item"><span style="color: rgb(28, 118, 202);">nokia</span> </a>
            <a href="#" class="list-brand_item"><span>sony</span> </a> -->

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


</body>

</html>