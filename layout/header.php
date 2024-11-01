<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/connect.php');

//Thư viện phpmailer
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/Exception.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/PHPMailer.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/phpmailer/SMTP.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/function.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/admin/includes/session.php');

$listBrand = getRaw("SELECT * FROM brand");
// $listCart = getRaw("SELECT * FROM shopping_cart");
$listCartegory = getRaw("SELECT * FROM cartegory");
$listProduct = getRaw("SELECT * FROM product");

session_start(); // Khởi tạo phiên làm việc

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    if ($_POST['form_id'] == 'form1' && isset($_POST['form_id'])) {
        $product_id = intval($_POST['product_id']); // Chuyển đổi product_id thành số nguyên
        $product_name = htmlspecialchars($_POST['product_name']);
        $product_image = htmlspecialchars($_POST['product_image']);
        $product_price = ($_POST['product_price']);

        // Kiểm tra xem session giỏ hàng đã tồn tại chưa
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Thêm sản phẩm vào giỏ hàng
        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = array('name' => $product_name, 'quantity' => 1, 'image' => $product_image, 'price' => $product_price);
        } else {
            $_SESSION['cart'][$product_id]['quantity']++;
        }
        // Xây dựng URL chuyển hướng với tham số brand_id
        // $redirect_url = $_SERVER['PHP_SELF'];
        // if (isset($_POST['brand_id'])) {
        //     $redirect_url .= '?brand_id=' . intval($_POST['brand_id']);
        // }
        // header("Location: " . $redirect_url);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellphoneZ</title>

    <!-- Link to CSS -->
    <link rel="shortcut icon" href="images/logo.ico? ver= <?php echo rand() ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/header.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/base.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/banner.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/footer.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/hot-prod.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/contact.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/orderInfo.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/shopping_cart.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/mobile.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/iphone15.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/orderDetail.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="app">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <a href="<?php echo _WEB_HOST_1 ?>/index.php"><img class="logo-img1" src="<?php echo BASE_URL; ?>images/header-icon/logo1.png" alt="Logo"><img class="logo-img2" src="<?php echo BASE_URL; ?>images/header-icon/logo2.png" alt="Logo"></a>
            </div>

            <form action="<?php echo _WEB_HOST_1 ?>/search_product.php" class="header-search">
                <input class="search-input" name="search_name" id="search_name" type="text" placeholder="Tìm sản phẩm mong muốn...">
                <button class="search-btn" type="submit">
                    <img class="icon-search" src="images/header-icon/search-icon.jpg" alt="">
                </button>
                <div class="live-search-result">
                    <ul id="search-result">
                    </ul>
                </div>
            </form>


            <nav class="navbar">
                <div class="navbar-list">
                    <div class="mobile">
                        <a href="<?php echo _WEB_HOST_1 ?>/mobile.php">
                            <img class="navbar-item-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/mobile-icon.jpg">
                            <span>Điện Thoại</span>

                        </a>
                        <!-- menu con -->
                        <div class="all-mobile">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <?php
                                if (!empty($listBrand)) :
                                    foreach ($listBrand as $item) :
                                        // Kiểm tra nếu cateogory_Id của item bằng 1
                                        if ($item['cartegory_Id'] == 1) :
                                ?>
                                            <a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=<?php echo $item['id'] ?>" target="_self" class="list-brand_item">
                                                <?php echo $item['name'] ?>
                                            </a>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>

                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=duoi-2trieu">Dưới 2 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=2-4trieu">Từ 2 - 4 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=4-7trieu">Từ 4 - 7 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=7-13trieu">Từ 7 - 13 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=13-20trieu">Từ 13 - 20 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=tren-20trieu">Trên 20 triệu</a>
                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=1">Iphone 15 Pro Max</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=10">Galaxy Z Flip6</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=9">Galaxy Z Fold6</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=25">Oppo Reno12</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=19">Xiaomi13</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=14">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="iphone">
                        <a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=1" class="ip-icon">
                            <img class="iphone-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/apple-icon.png"><span>Apple</span>
                        </a>
                    </div>

                    <div class="samsung">
                        <a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=2" class="ss-icon">
                            <img class="samsung-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/samsung-icon.png" style="width: 70px;">
                            <span>SamSung</span>
                        </a>
                    </div>

                    <div class="laptop">
                        <a href="<?php echo _WEB_HOST_1 ?>/laptop.php" class="laptop-icon">
                            <img class="laptop-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/laptop-icon.jpg">
                            <span>Laptop</span>
                        </a>
                        <!-- menu con -->
                        <div class="all-laptop">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <?php
                                if (!empty($listBrand)) :
                                    foreach ($listBrand as $item) :
                                        // Kiểm tra nếu cateogory_Id của item bằng 1
                                        if ($item['cartegory_Id'] == 2) :
                                ?>
                                            <a href="<?php echo _WEB_HOST_1 ?>/laptopBrand.php?brand_id=<?php echo $item['id'] ?>" target="_self" class="list-brand_item">
                                                <?php echo $item['name'] ?>

                                            </a>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=duoi-10trieu">Dưới 10 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=10-15trieu">Từ 10 - 15 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=15-20trieu">Từ 15 - 20 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=20-25trieu">Từ 20 - 25 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=25-30trieu">Từ 25 - 30 triệu</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=tren-30trieu">Trên 30 triệu</a>

                            </div>
                            <div class="hot-laptop">
                                <h4>LAPTOP HOT </h4>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=40">MacBook Air M3</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=44">Acer Nitro 5</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=51">Dell Inspiron 15</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=64">MSI Cyborg 15</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=66">MSI Gaming GF63</a>
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=73">ASUS Zenbook 14</a>
                            </div>
                        </div>
                    </div>
                    <div class="asus">
                        <a href="<?php echo _WEB_HOST_1 ?>/laptopBrand.php?brand_id=13" class="asus-icon">
                            <img class="macbook-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/asus-icon.png" style="width: 35px">
                            <span>Asus</span>
                        </a>
                    </div>

                    <div class="dell">
                        <a href="<?php echo _WEB_HOST_1 ?>/laptopBrand.php?brand_id=10" class="dell-icon">
                            <img class="dell-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/dell-icon.png" style="width: 30px;">
                            <span>Dell</span>

                        </a>
                    </div>

                    <div class="check-order">
                        <a href="<?php echo _WEB_HOST_1 ?>/check_orderDetail.php" target="_self">
                            <img class="check-order-icon-img" src="<?php echo BASE_URL; ?>images/header-icon/08-Delivery_Truck-512.webp" style="width: 50px;">
                            <span>Kiểm tra đơn hàng</span></a>
                    </div>

                </div>

            </nav>
            <?php

            $count = 0;
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId) {
                    $count++;
                }
            }
            ?>
            <div class="header-cart">
                <a href="<?php echo _WEB_HOST_1 ?>/shopping_cart.php"> <img class="header-cart-img" src="<?php echo BASE_URL; ?>images/header-icon/cart-icon.png" style="width: 30px; height: 30px;;">
                    <span class="cart-quantity-item" id="count">
                        <?php echo $count ?>
                    </span>
                </a>
                <!-- <div class="cart-no-item">
                    <img src="<?php echo BASE_URL; ?>images/header-icon/no-cart.png" alt="">
                </div> -->
            </div>
        </header>
        <script>
            $(document).ready(function() {
                $('#search_name').keyup(function(event) {
                    event.preventDefault();
                    var action = 'searchRecord';
                    var search_name = $('#search_name').val();

                    $.ajax({
                        url: "search_name.php",
                        method: "POST",
                        data: {
                            action: action,
                            search_name: search_name
                        },
                        success: function(data) {
                            $("#search-result").html(data);
                        }
                    });
                });
            });
        </script>