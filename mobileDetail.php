<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

$filterAll = filter();
if (!empty($filterAll['product_id'])) {
    $product_id = $filterAll['product_id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: " . $_SERVER['PHP_SELF'] . "?product_id=" . $product_id);
    exit;
}
$listBrand = getRaw("SELECT * FROM brand");
$listImg = getRaw("SELECT * FROM product_images");

?>
<div class="main_container-chil">
    <div class="mobile-container">
        <ul class="nav-list">
            <ul class="nav-list">
                <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
                <li><a href="<?php echo _WEB_HOST_1 ?>/mobile.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Điện
                        thoại</a>
                </li>
                <?php
                if (!empty($listProduct)) :
                    foreach ($listProduct as $item) :
                        if ($item['id'] == $product_id) :
                ?>
                            <li><a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=<?php echo $item['brand_Id'] ?>"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>
                                    <?php
                                    $brand_Id = $item['brand_Id'];
                                    foreach ($listBrand as $itemBrand) :
                                        if ($itemBrand['id'] == $brand_Id) :
                                            echo $itemBrand['name'];
                                        endif;
                                    endforeach;
                                    ?>
                                </a></li>
                            <li><a href=""><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>
                                    <?php

                                    echo $item['tenSanPham'];
                                    ?>
                                </a></li>
                <?php
                        endif;
                    endforeach;
                endif; ?>
            </ul>
        </ul>
        <div class="clear"></div>
        <?php
        if (!empty($listProduct)) :
            foreach ($listProduct as $item) :
                if ($item['id'] == $product_id) :
                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
        ?>
                    <div class="product-container">
                        <div class="name-product">
                            <h1><?php echo $item['tenSanPham']; ?>
                            </h1>
                            <div class="detail-star">
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                &nbsp; 200 đánh giá
                            </div>
                            <!-- <a href="" class="compare">+ So sánh</a>    -->
                            <div class="clear"></div>
                        </div>
                        <hr>
                        <div class="box_main">
                            <div class="box_main_product">
                                <div class="box_left">
                                    <div class="box01">
                                        <div class="slider-content">
                                            <div class="slider-content-top">
                                                <div class="slider-content-top-slide">
                                                    <div class="item ">
                                                        <a href=""><img src="<?php echo $imagePath; ?>" alt=""></a>
                                                    </div>
                                                    <?php
                                                    foreach ($listImg as $itemImg) :
                                                        if ($itemImg['product_Id'] == $product_id) :
                                                            $imagePath_desc = "admin/modules/auth/uploads/" . $itemImg['anhMoTa'];
                                                    ?>
                                                            <div class="item">
                                                                <a href=""><img src="<?php echo $imagePath_desc ?>" alt=""></a>
                                                            </div>
                                                    <?php
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </div>
                                                <div class="slider-content-top-btn">
                                                    <i class="fa-solid fa-chevron-left" id="prev"></i>
                                                    <i class="fa-solid fa-chevron-right" id="next"></i>
                                                </div>
                                            </div>
                                            <ul class="slider-content-bottom">
                                                <li class="active" data-index="0"><i class="fa-regular fa-star fa-flip-horizontal" style="color:#666;"></i>
                                                    <p>Tính năng nổi bật</p>
                                                </li>
                                                <?php
                                                foreach ($listImg as $itemImg) :
                                                    if ($itemImg['product_Id'] == $product_id) :
                                                        $imagePath_desc = "admin/modules/auth/uploads/" . $itemImg['anhMoTa'];

                                                ?>
                                                        <li><img src="<?php echo $imagePath_desc; ?>"></li>
                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="box02">
                                        <div class="policy">
                                            <ul class="policy_list">
                                                <li><i class="fa-solid fa-shield" style="color: #d1d5db;"></i>
                                                    <p>
                                                        Hư gì đổi nấy <b>12 tháng</b> tại 2981 siêu thị toàn quốc (miễn phí tháng đầu)
                                                    </p>
                                                </li>
                                                <li><i class="fa-solid fa-shield" style="color: #d1d5db;"></i>
                                                    <p>Bảo hành <b>chính hãng điện thoại 1 năm</b> tại các trung tâm bảo hành hãng</p>
                                                </li>
                                                <li class="policy_list-btn"><i class="fa-solid fa-box-open" style="color: #d1d5db;"></i>
                                                    <p>Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Type C</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box03">
                                        <h1>Thông tin sản phẩm</h1>
                                        <div>
                                            <article class="area_article" style="font-size:14px">
                                                <?php echo $item['thongTinSanPham'] ?>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="box04">
                                        <h2>Đánh giá Điện thoại <?php echo  $item['tenSanPham']; ?></h2>
                                        <div class="rating-summary">
                                            <div class="rating-average">
                                                <span class="rating-number">3.8</span>
                                                <div class="star-rating">
                                                    <!-- Thêm 5 ngôi sao ở đây, với 3.8/5 được tô màu -->
                                                </div>
                                                <span class="rating-count">167 đánh giá</span>
                                            </div>

                                            <div class="rating-bars">
                                                <!-- Thêm 5 thanh đánh giá ở đây -->
                                            </div>
                                        </div>

                                        <div class="rating-images">
                                            <!-- Thêm 4 hình ảnh nhỏ ở đây -->
                                        </div>

                                        <div class="user-reviews">
                                            <!-- Thêm các đánh giá của người dùng ở đây -->
                                        </div>

                                        <div class="rating-actions">
                                            <button class="view-all">Xem 167 đánh giá</button>
                                            <button class="write-review">Viết đánh giá</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="box_right">
                                    <div class="box05">
                                        <a href="" class="active"><?php echo $item['boNhoTrong'] ?></a>
                                    </div>
                                    <div class="box06">
                                        <div class="box06_top">
                                            <?php
                                            if ($item['giam'] != '0') {
                                            ?>
                                                <div class="box06_top-left">
                                                    <b>
                                                        Online Giá Quá Rẻ
                                                    </b>
                                                    <p><?php echo $item['giaKhuyenMai'] ?>đ</p>
                                                    <del><?php echo $item['giaSanPham'] ?>đ</del>
                                                    <i>(<?php echo $item['giam'] ?>%)</i>
                                                </div>
                                                <div class="box06_top-right">
                                                    <p>Kết thúc vào</p>
                                                    <p>23:00 | 31/08</p>
                                                    <p>Tại <b>Hồ Chí Minh</b></p>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="box06_top-left">
                                                    <p><?php echo $item['giaSanPham'] ?>đ</p>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="box06_bottom">
                                            <div class="box06_bottom-sale">
                                                <div class="box06_bottom_sale-top">
                                                    <i class="fa-solid fa-gift" style="margin-right: 5px;"></i>
                                                    <b>Khuyến mãi</b>
                                                </div>
                                                <div class="box06_bottom_sale-bottom">
                                                    <i class="fa-solid fa-star" style="color: red;"></i>
                                                    Giảm ngay 500K khi thanh toán qua VNPAY
                                                </div>
                                            </div>
                                            <div class="box06_bottom-rule">
                                                <ul>
                                                    <li>Giao hàng nhanh chóng (tuỳ khu vực)</li>
                                                    <li>Mỗi số điện thoại chỉ mua 3 sản phẩm trong 1 tháng</li>
                                                    <li>Giá và khuyến mãi có thể kết thúc sớm</li>
                                                </ul>
                                            </div>
                                            <div class="box06_bottom_order-top">
                                                <?php if ($item['soluongsp'] > $item['soluongbanra']) {
                                                ?>
                                                    <form action="<?php echo _WEB_HOST_1 ?>/orderInfo.php?product_id=<?php echo $item['id'] ?>" method="post" target="_self">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                        <input type="hidden" name="form_id" value="form3">
                                                        <button class="order-left">
                                                            <strong>MUA NGAY</strong>
                                                            <span>(Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng)</span>
                                                        </button>
                                                    </form>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="form_id" value="form1">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                        <input type="hidden" name="product_name" value="<?php echo $item['tenSanPham'] ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $item['anhSanPham'] ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $item['giaKhuyenMai'] ?>">
                                                        <button class="order-right" alt="Add to cart">
                                                            <i class="fa-solid fa-cart-plus" style="color: red;"></i>
                                                            <span>Thêm vào giỏ hàng</span>
                                                        </button>
                                                    </form>
                                                <?php } else { ?>
                                                    <button class="order-left" disabled style="background-color:#666">
                                                        <strong>MUA NGAY</strong>
                                                        <span>(Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng)</span>
                                                    </button>
                                                    <button class="order-right" alt="Add to cart" disabled style="background-color:#666; border:none">
                                                        <i class="fa-solid fa-cart-plus" style="color:white"></i>
                                                        <span style="color:white">Thêm vào giỏ hàng</span>
                                                    </button>
                                                <?php
                                                } ?>
                                            </div>

                                            <div class="box06_bottom_order-bottom">
                                                <button class="order_left-bottom">
                                                    <strong>MUA TRẢ GÓP 0%</strong>
                                                    <!-- <span>(Giao nhanh từ 2 giờ hoặc nhận tại cửa hàng)</span> -->
                                                </button>
                                                <button class="order_right-bottom">
                                                    <strong>TRẢ GÓP 0% QUA THẺ</strong>
                                                    <span>(Không phí chuyển đổi 3 - 6 tháng)</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box07">
                                        <h3>Cấu hình Điện thoại <?php echo $item['tenSanPham'] ?></h3>
                                        <ul>
                                            <li>
                                                <p>Kích thước màn hình </p>
                                                <span><?php echo $item['kichThuocManHinh'] ?></span>
                                            </li>
                                            <li>
                                                <p>Công nghệ màn hình</p>
                                                <span><?php echo $item['congNgheManHinh'] ?></span>
                                            </li>
                                            <li>
                                                <p>Camera sau</p>
                                                <span><?php echo $item['cameraSau'] ?></span>
                                            </li>
                                            <li>
                                                <p>Camera trước</p>
                                                <span><?php echo $item['cameraTruoc'] ?></span>
                                            </li>
                                            <li>
                                                <p>Chipset</p>
                                                <span><?php echo $item['chipset'] ?></span>
                                            </li>
                                            <li>
                                                <p>Dung lượng RAM</p>
                                                <span><?php echo $item['dungLuongRam'] ?></span>
                                            </li>
                                            <li>
                                                <p>Bộ nhớ trong</p>
                                                <span><?php echo $item['boNhoTrong'] ?></span>
                                            </li>
                                            <li>
                                                <p>Pin</p>
                                                <span><?php echo $item['pin'] ?></span>
                                            </li>
                                            <li>
                                                <p>Hệ điều hành</p>
                                                <span><?php echo $item['heDieuHanh'] ?></span>
                                            </li>
                                            <?php if (!empty($item['doPhanGiaiManHinh'])) :
                                            ?>
                                                <li>
                                                    <p>Độ phân giải màn hình</p>
                                                    <span><?php echo $item['doPhanGiaiManHinh'] ?></span>
                                                </li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sanPhamGoiY">

                                <div class="prod-mobile">
                                    <h2>SẢN PHẨM GỢI Ý</h2>
                                    <div class="prod-mobile1" id="productContainer">
                                        <?php
                                        // Bước 1: Lọc sản phẩm theo danh mục
                                        $filteredProducts = array_filter($listProduct, function ($item) {
                                            return $item['cartegory_Id'] == '1';
                                        });

                                        // Bước 2: Trộn danh sách sản phẩm
                                        shuffle($filteredProducts);

                                        // Bước 3: Lấy 5 sản phẩm đầu tiên
                                        $selectedProducts = array_slice($filteredProducts, 0, 5);
                                        ?>
                                        <?php
                                        if (!empty($selectedProducts)) :
                                            foreach ($selectedProducts as $item) :
                                                if ($item['cartegory_Id'] == '1') :
                                                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                                        ?>
                                                    <div class="mobile-link product-link">
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
                                                        <input type="hidden" name="form_id" value="form1">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id'] ?>">
                                                        <input type="hidden" name="product_name" value="<?php echo $item['tenSanPham'] ?>">
                                                        <input type="hidden" name="product_image" value="<?php echo $item['anhSanPham'] ?>">
                                                        <input type="hidden" name="product_price" value="<?php echo $item['giaKhuyenMai'] ?>">
                                                        <button class="order-right" alt="Add to cart">
                                                        <img src="images/hot-prod/cart-icon.png" alt="Add to cart">
                                                        </button>
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

        <?php
                endif;
            endforeach;
        endif;
        ?>

    </div>
    <script src="<?php echo _WEB_HOST_1 ?>/js/iphone.js?ver= <?php echo rand() ?>">
        
    </script>
</div>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
