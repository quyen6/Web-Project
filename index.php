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
    <title>SellphoneZ</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/hot-prod.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="css/contact.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>
    <div class="app">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <a href="trangchu.php" target="page"><img src="" alt="Logo"></a>
            </div>

            <form class="header-search">
                <input class="search-input" type="text" placeholder="Tìm sản phẩm mong muốn...">
                <button class="search-btn" type="submit">

                    <img class="icon-search" src="./images/header-icon/search-icon.jpg" alt="">

                </button>
            </form>


            <nav class="navbar">
                <div class="navbar-list">
                    <div class="mobile">
                        <a href="mobile.php" target="page">
                            <img class="navbar-item-icon-img" src="./images/header-icon/mobile-icon.jpg">
                            <span>Điện Thoại</span>

                        </a>
                        <!-- menu con -->
                        <div class="all-mobile">
                        <div class="brand">
                            <h4>HÃNG SẢN XUẤT</h4>
                            <?php
                            if (!empty($listProduct)) :
                                foreach ($listProduct as $item) :
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
                        <a href="" class="ip-icon">
                            <img class="iphone-icon-img" src="./images/header-icon/apple-icon.png"><span>Iphone</span>
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
                        <a href="" class="ss-icon">
                            <img class="samsung-icon-img" src="./images/header-icon/samsung-icon.png"
                                style="width: 70px;">
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
                        <a href="laptop.php" target="page" class="laptop-icon">
                            <img class="laptop-icon-img" src="./images/header-icon/laptop-icon.jpg">
                            <span>Laptop</span>
                        </a>
                        <!-- menu con -->
                        <div class="all-laptop">
                            <div class="brand">
                                <h4>HÃNG SẢN XUẤT</h4>
                                <?php
                            if (!empty($listProduct)) :
                                foreach ($listProduct as $item) :
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
                        <a href="" class="asus-icon">
                            <img class="macbook-icon-img" src="./images/header-icon/asus-icon.png" style="width: 35px">
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
                        <a href="" class="dell-icon">
                            <img class="dell-icon-img" src="./images/header-icon/dell-icon.png" style="width: 30px;">
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
                            <img class="check-order-icon-img" src="./images/header-icon/08-Delivery_Truck-512.webp"
                                style="width: 50px;">
                            <span>Kiểm tra đơn hàng</span></a>
                    </div>

                </div>

            </nav>

            <div class="header-cart" >
                <a href="orderInfo.html" target="page"> <img class="header-cart-img" src="./images/header-icon/cart-icon.png"
                        style="width: 25px; height: 30px;;">
                    <span class="cart-quantity-item" id="count">
                        0
                    </span>
                </a>
                <div class="cart-no-item">
                    <img src="images/header-icon/no-cart.png" alt="">
                </div>
            </div>
            <div class="log-in">
                <a href="" class="log-in-icon">
                    <img class="log-in-icon-img" src="./images/header-icon/login-icon.png" style="width: 30px;">
                    <span>ĐĂNG NHẬP</span>
                </a>
            </div>
        </header>


        <!-- Main Container  -->
        <article id="container" style="height: 4000px;  margin-top:60px " >
           <iframe src="trangchu.php" name="page" frameborder="0" style="width: 100%;height: 100%;"></iframe>
        </article> 
      
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
                    <span >Chat với chúng tôi qua Facebook Message</span>
                </a> 
                </div>
            </div>
        </aside>

<script>
    document
</script>


        <!-- Footer -->
        <!-- <footer class="footer">
            <div class="ft-content-one">
                <div class="ft-content1">
                    <h4>Hỗ trợ dịch vụ</h4>
                    <ul>
                        <li><a href="">Chính sách hướng dẫn mua hàng trả góp</a></li>
                        <li><a href="">Hướng dẫn mua hàng và chính sách vận chuyển</a></li>
                        <li><a href="">Tra cứu đơn hàng</a></li>
                        <li><a href="">Chính sách đổi mới và bảo hành</a></li>
                        <li><a href="">Chính sách bảo mật</a></li>
                        <li><a href="">Chính sách giải quyết khiếu nại</a></li>
                    </ul>
                </div>
                <div class="ft-content2">
                    <h4>Thông tin liên hệ: </h4>
                    <ul>
                        <li>Tổng đài hỗ trợ (tư vẫn miễn phí)</li>
                        <li>Chủ cửa hàng - <strong style="color: black;">Thái Thị Mỹ Quyên - 2151150056 </strong> (8:30 - 22:00): <b>0386.036.130</b></li>
                        <li>Kĩ thuật viên - <strong style="color: black;"> Đặng Hoàng Việt - 2151150056 </strong>(8:30 - 22:00): <b>0972.017.749</b></li>
                        <li>Doanh nghiêp & Đối tác (8:30 - 22:00): <b>0702.641.159</b></li>
                        <li>Showroom: <b>Tiểu vương quốc Hóc Môn</b></li>
                    </ul>

                </div>
                <div class="ft-content3">
                    <h4>Phương thức thanh toán</h4>
                    <div class="payment">
                        <div class="payment1">
                            <a href="">
                                <img src="./images/footer/momo.jpg" alt="">
                            </a>
                            <a href="">
                                <img src="./images/footer/applepay.jpg" alt="">
                            </a>
                            <a href="">
                                <img src="./images/footer/mastercard.png" alt="">
                            </a>
                        </div>
                        <div class="payment2">
                            <a href="">
                                <img src="./images/footer/visa.png" alt="">
                            </a>
                            <a href="">
                                <img src="./images/footer/vnpay.jpg" alt="">
                            </a>
                            <a href="">
                                <img src="./images/footer/zalopay.png" alt="">
                            </a>
                        </div>

                    </div>


                </div>
            </div>
            <hr>
            <div class="ft-content-second">
                <b>CÔNG TY TRÁCH NHIỆM HỮU HẠN 2 THÀNH VIÊN SZ</b>. Địa chỉ: Tiểu vương quốc Hóc Môn. (Đăng kí ngày:
                09/07/2024)

            </div>
        </footer> -->



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
