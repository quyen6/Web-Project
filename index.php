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
// $listCart = getRaw("SELECT * FROM shopping_cart");
$listCartegory = getRaw("SELECT * FROM cartegory");
$listProduct = getRaw("SELECT * FROM product");

session_start(); // Khởi tạo phiên làm việc

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Chuyển đổi product_id thành số nguyên
    $product_name = htmlspecialchars($_POST['product_name']); // Chuyển đổi product_name thành chuỗi an toàn
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
    // Chuyển hướng đến trang giỏ hàng
    header('Location: index.php');
    exit;
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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/popup.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/hot-prod.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/contact.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/orderInfo.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/shopping_cart.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/mobile.css? ver= <?php echo rand() ?>">
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
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=19">Xiaomi14</a>
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

        <!-- Main Container -->
        <div class="main_container">
            <div class="home">
                <div class="banner">
                    <div class="banner">
                        <div class="banner-list">
                            <div class="banner-main">
                                <div class="banner1">
                                    <div class="item">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=9"><img src="images/banner/fold-6.png" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=11"><img src="images/banner/fold5.png" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=12"><img src="images/banner/galaxy-s24-sale.jpeg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=1"> <img src="images/banner/iphone-15-series-sale.jpeg" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=25"> <img src="images/banner/oppo-reno-12.png" alt=""></a>
                                    </div>
                                </div>
                                <!-- button prev and next -->
                                <div class="buttons">
                                    <button id="prev">
                                        < </button>

                                </div>
                                <div class="buttons" style="position: absolute; right: 0">

                                    <button id="next">></button>
                                </div>
                                <!-- dots -->
                                <ul class="dots">
                                    <li class="active"></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                            <div class="banner-second">
                                <div class="banner2">
                                    <a href="">Giảm ngay 3 triệu khi <br>đặt trước Iphone 16 Series và Galaxy ZFold6 tại SZ hehe
                                        <img src="./images/banner/fire.gif" style="width: 200px; height: 8px;" alt="">
                                    </a>
                                </div>
                                <div class="banner3">
                                    <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=53"><img src="./images/banner/Laptop-Dell-Gaming-G15-5535-banner.jpg" alt=""></a>
                                </div>
                                <div class="banner4">
                                    <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=71"><img src="./images/banner/tuf-gaming-f15.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- script Banner -->
                    <script src="/js/banner.js"></script>
                    <!-- Content -->


                </div>

                <!-- Hot Prod -->
                <div class="hot-prod">
                    <!-- Điện thoại -->
                    <h2>Điện thoại nổi bật</h2>
                    <div class="prod-mobile">
                        <div class="prod-mobile1">
                            <?php
                            //  Lọc sản phẩm theo danh mục
                            $filteredProducts = array_filter($listProduct, function ($item) {
                                return $item['cartegory_Id'] == '1';
                            });

                            //  Trộn danh sách sản phẩm
                            // shuffle($filteredProducts);

                            //  Lấy 20 sản phẩm đầu tiên
                            $selectedProducts = array_slice($filteredProducts, 0, 20);

                            if (!empty($selectedProducts)) :
                                foreach ($selectedProducts as $item) :
                                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                            ?>


                                    <div class="mobile-link">
                                        <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=<?php echo $item['id'] ?>" target="_self">
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
                                                <?php if ($item['soluongsp'] > $item['soluongbanra']) {
                                                ?>
                                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                        <input type="hidden" name="product_name" value="<?php echo $item['tenSanPham'] ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $item['anhSanPham'] ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $item['giaKhuyenMai'] ?>">
                                                        <button type="submit"><img src="images/hot-prod/cart-icon.png" alt="Add to cart"></button>
                                                    </form>
                                                <?php } else {
                                                ?>
                                                    <button type="submit"><span>Bán hết!!!</span></button>
                                                <?php };
                                                ?>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>


                    <!-- Laptop -->
                    <h2>Laptop</h2>
                    <div class="prod-laptop">
                        <div class="prod-laptop1">
                            <?php
                            // Bước 1: Lọc sản phẩm theo danh mục
                            $filteredProducts = array_filter($listProduct, function ($item) {
                                return $item['cartegory_Id'] == '2';
                            });

                            // Bước 2: Trộn danh sách sản phẩm
                            // shuffle($filteredProducts);

                            // Bước 3: Lấy 15 sản phẩm đầu tiên
                            $selectedProducts = array_slice($filteredProducts, 0, 20);
                            ?>
                            <?php
                            if (!empty($selectedProducts)) :
                                foreach ($selectedProducts as $item) :
                                    if ($item['cartegory_Id'] == '2') :
                                        $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                            ?>
                                        <div class="laptop-link">
                                            <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=<?php echo $item['id'] ?>" target="_self">
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
                                                    <?php if ($item['soluongsp'] > $item['soluongbanra']) {
                                                    ?>
                                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                            <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                            <input type="hidden" name="product_name" value="<?php echo $item['tenSanPham'] ?>">
                                                            <input type="hidden" name="product_image" value="<?php echo $item['anhSanPham'] ?>">
                                                            <input type="hidden" name="product_price" value="<?php echo $item['giaKhuyenMai'] ?>">
                                                            <button type="submit"><img src="images/hot-prod/cart-icon.png" alt="Add to cart"></button>
                                                        </form>
                                                    <?php } else {
                                                    ?>
                                                        <button type="submit"><span>Bán hết!!!</span></button>
                                                    <?php };
                                                    ?>
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
        </div>
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
            var cartData = <?php echo json_encode(isset($_SESSION['cart']) ? $_SESSION['cart'] : []); ?>;
            console.log('Cart Data:', cartData);
        </script>
    </div>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
