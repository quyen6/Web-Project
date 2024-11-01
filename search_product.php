<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

if (isset($_GET['search_name'])) {
    $search_name = $_GET['search_name'];
    $query = getRaw("SELECT * FROM product WHERE tenSanPham LIKE '%$search_name%' ORDER BY id DESC");
    $numProducts = count($query);
}
?>
<div class="main_container_chil">
    <div class="mobile-container">
        <ul class="nav-list">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="#"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Kết quả tìm kiếm cho: <?php echo $search_name ?></a>
            </li>
        </ul>
        <div class="clear"></div>
        <h1 class="numSearch">Tìm thấy <?php echo $numProducts ?> sản phẩm cho từ khóa '<?php echo $search_name ?>'</h1>

        <div class="condition">
            <div class="filter-sort_title">
                Sắp xếp theo
            </div>
            <div class="filter-sort_list-filter">
                <div class="filter-relevant">
                    <button class="btn-filter active">
                        Liên quan
                    </button>
                </div>
                <div class="filter-price_than">
                    <button class="btn-filter" id="sortHighToLow">
                        <i class="fa-solid fa-arrow-down-wide-short" style="margin-right: 5px;"></i>
                        Giá Cao - Thấp
                    </button>
                </div>

                <div class="filter-price_than">
                    <button class="btn-filter" id="sortLowToHigh">
                        <i class="fa-solid fa-arrow-up-wide-short" style="margin-right: 5px;"></i>
                        Giá Thấp - Cao
                    </button>
                </div>
            </div>
        </div>
        <div class="prod-mobile">
            <div class="prod-mobile1" id="productContainer">
                <?php
                if (!empty($query)) :
                    foreach ($query as $item) :
                        $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                        if ($item['cartegory_Id'] == 1) {
                ?>
                            <div class="mobile-link product-link">
                                <a href="<?php echo _WEB_HOST_1 ?>/mobileDetail.php?product_id=<?php echo $item['id'] ?>">
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
                        } else {
                        ?>
                            <div class="mobile-link product-link">
                                <a href="<?php echo _WEB_HOST_1 ?>/laptopDetail.php?product_id=<?php echo $item['id'] ?>">
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
                        }
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
