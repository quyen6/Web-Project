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
$listCart = getRaw("SELECT * FROM shopping_cart");
$listCartegory = getRaw("SELECT * FROM cartegory");
$listProduct = getRaw("SELECT * FROM product");
$filterAll = filter();
if (!empty($filterAll['product_id'])) {
    $productId = $filterAll['product_id'];
    $productDetail = oneRaw("SELECT * FROM product WHERE id='$productId'");
    if ($productDetail) {
        setFLashData('product-dail', $productDetail);
    } else {
        echo "Loi";
    }
}
if (isPost()) {
    $productCount = getRows("SELECT * FROM shopping_cart WHERE product_Id='$productId'");
    if ($productCount > 0) {
        if (!empty($listCart)) :
            foreach ($listCart as $item) :
                if ($item['product_Id'] == $productId) :
                    $soluong = $item['soLuong'];
                endif;
            endforeach;
        endif;
        $soluong = intval($soluong) + 1;
        $dataUpdate = [
            'soLuong' => $soluong,
        ];
        $condition = "product_Id=$productId";
        $updateStatus = update('shopping_cart', $dataUpdate, $condition);
    } else {
        if (!empty($listProduct)) :
            foreach ($listProduct as $item) :
                if ($item['id'] == $productId) :
                    $productName = $item['tenSanPham'];
                    $productGia = $item['giaSanPham'];
                    $productAnh = $item['anhSanPham'];
                endif;
            endforeach;
        endif;
        $dataInsert = [
            'product_Id' => $productId,
            'tenSanPham' => $productName,
            'gia' => $productGia,
            'anhSanPham' => $productAnh,
            'soLuong' => '1',
        ];
        $insertStatus = insert('shopping_cart', $dataInsert);
        if ($insertStatus) {
            setFLashData('smg', 'Thêm giỏ hàng thành công!!');
            setFLashData('smg_type', 'success');
        } else {
            setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
            setFLashData('smg_type', 'danger');
        }
    }
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellphoneZ</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/header.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/base.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/banner.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/footer.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/popup.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/hot-prod.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/contact.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/orderInfo.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/shopping_cart.css? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="app">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <a href="<?php echo _WEB_HOST_1 ?>/index.php"><img src="" alt="Logo"></a>
            </div>

            <form class="header-search">
                <input class="search-input" type="text" placeholder="Tìm sản phẩm mong muốn...">
                <button class="search-btn" type="submit">

                    <img class="icon-search" src="images/header-icon/search-icon.jpg" alt="">

                </button>
            </form>


            <nav class="navbar">
                <div class="navbar-list">
                    <div class="mobile">
                        <a href="<?php echo _WEB_HOST_1 ?>/mobile.php">
                            <img class="navbar-item-icon-img" src="images/header-icon/mobile-icon.jpg">
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
                                            <a href="">

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
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="iphone">
                        <a href="<?php echo _WEB_HOST_1 ?>/apple.php?brand_id=1" class="ip-icon">
                            <img class="iphone-icon-img" src="images/header-icon/apple-icon.png"><span>Apple</span>
                        </a>
                        <div class="all-iphone">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="samsung">
                        <a href="<?php echo _WEB_HOST_1 ?>/apple.php?brand_id=2" class="ss-icon">
                            <img class="samsung-icon-img" src="images/header-icon/samsung-icon.png" style="width: 70px;">
                            <span>SamSung</span>
                        </a>
                        <div class="all-samsung">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="laptop">
                        <a href="<?php echo _WEB_HOST_1 ?>/laptop.php" class="laptop-icon">
                            <img class="laptop-icon-img" src="images/header-icon/laptop-icon.jpg">
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
                                            <a href="">

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
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>
                            <div class="hot-laptop">
                                <h4>LAPTOP HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>
                    <div class="asus">
                        <a href="<?php echo _WEB_HOST_1 ?>/acer.php?brand_id=13" class="asus-icon">
                            <img class="macbook-icon-img" src="images/header-icon/asus-icon.png" style="width: 35px">
                            <span>Asus</span>
                        </a>
                        <div class="all-asus">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="dell">
                        <a href="<?php echo _WEB_HOST_1 ?>/acer.php?brand_id=10" class="dell-icon">
                            <img class="dell-icon-img" src="images/header-icon/dell-icon.png" style="width: 30px;">
                            <span>Dell</span>

                        </a>
                        <div class="all-dell">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <a href="">Iphone</a>
                                <a href="">Sam Sung</a>
                                <a href="">Xiaomi</a>
                                <a href="">Oppo</a>
                                <a href="">Realme</a>
                                <a href="">Vivo</a>
                                <a href="">Nokia</a>


                            </div>
                            <div class="fillter-price">
                                <h4>MỨC GIÁ</h4>
                                <a href="">Dưới 2 triệu</a>
                                <a href="">Từ 2 - 4 triệu</a>
                                <a href="">Từ 4 - 7 triệu</a>
                                <a href="">Từ 7 - 13 triệu</a>
                                <a href="">Từ 13 - 20 triệu</a>
                                <a href="">Trên 20 triệu</a>

                            </div>

                            <div class="hot-mobile">
                                <h4>ĐIỆN THOẠI HOT </h4>
                                <a href="">Iphone 15 Pro Max</a>
                                <a href="">Galaxy Z Flip6</a>
                                <a href="">Galaxy Z Fold6</a>
                                <a href="">Oppo Reno12</a>
                                <a href="">Xiaomi14</a>
                                <a href="">Sam Sung A55</a>
                            </div>
                        </div>
                    </div>

                    <div class="check-order">
                        <a href="">
                            <img class="check-order-icon-img" src="images/header-icon/08-Delivery_Truck-512.webp" style="width: 50px;">
                            <span>Kiểm tra đơn hàng</span></a>
                    </div>

                </div>

            </nav>
            <?php
            $count = 0;
            if (!empty($listCart)) :
                foreach ($listCart as $item) :
                    $count = $count + intval($item['soLuong']);
                endforeach;
            endif;
            ?>
            <div class="header-cart">
                <a href="<?php echo _WEB_HOST_1 ?>/shopping_cart.php"> <img class="header-cart-img" src="images/header-icon/cart-icon.png" style="width: 25px; height: 30px;;">
                    <span class="cart-quantity-item" id="count">
                        <?php echo $count ?>
                    </span>
                </a>
                <div class="cart-no-item">
                    <img src="images/header-icon/no-cart.png" alt="">
                </div>
            </div>
            <div class="log-in">
                <a href="" class="log-in-icon">
                    <img class="log-in-icon-img" src="images/header-icon/login-icon.png" style="width: 30px;">
                    <span>ĐĂNG NHẬP</span>
                </a>
            </div>
        </header>

        <!-- Main Container  -->
        <div class="home">
            <div class="banner">
                <div class="banner">
                    <div class="banner-list">
                        <div class="banner-main">
                            <div class="banner1">
                                <div class="item">
                                    <a href=""><img src="images/banner/fold-6.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="images/banner/fold5.png" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="images/banner/galaxy-s24-sale.jpeg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""> <img src="images/banner/iphone-15-series-sale.jpeg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""> <img src="images/banner/oppo-reno-12.png" alt=""></a>
                                </div>
                            </div>
                            <!-- button prev and next -->
                            <div class="buttons">
                                <button id="prev">
                                    < </button>
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
                                <a href="">Giảm ngay 3 triệu khi <br>đặt trước Iphone 16 Series và Galaxy ZFold6 tại SZ
                                    <img src="./images/banner/fire.gif" style="width: 200px; height: 8px;" alt="">
                                </a>
                            </div>
                            <div class="banner3">
                                <a href=""><img src="./images/banner/Laptop-Dell-Gaming-G15-5535-banner.jpg" alt=""></a>
                            </div>
                            <div class="banner4">
                                <a href=""><img src="./images/banner/tuf-gaming-f15.jpg" alt=""></a>
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
                                            <form action="" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                <button type="submit"><img src="images/hot-prod/cart-icon.png"></button>
                                            </form>

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
                                                <form action="" method="post">
                                                    <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                    <button type="submit"><img src="images/hot-prod/cart-icon.png"></button>
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
        <!-- script banner -->
        <script src="js/banner.js"></script>


        <!-- Aside  -->
        <aside>
            <div class="contact">
                <div class="zalo">
                
                    <a href=""><img src="images/contact/zalo-icon.png" alt="">
                    <span >Chat với chúng tôi qua Zalo</span>
                    </a>

                </div>
                <div class="message">

                    <a href=""><img src="images/contact/Facebook_Messenger_logo_2020.svg.png" alt="">
                        <span>Chat với chúng tôi qua Facebook Message</span>
                    </a>
                </div>
            </div>
        </aside>
    </div>

    <div id="overlay"></div>
    <div class="popup" id="popup">
        <button class="close-btn" onclick="closePopup()"><i class="fa-solid fa-circle-xmark"></i></button>
        <img src="./images/header-icon/login-icon.png" alt="Smember Logo" style="width: 50px; height: 50px;">
        <p>Bạn có tài khoản chưa?</p>
        <button class="register">Đăng ký</button>
        <button class="login">Đăng nhập</button>
    </div>
    <script src="./js/popup.js"></script>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
