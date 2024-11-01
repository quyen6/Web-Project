<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Chuyển đổi product_id thành số nguyên
    $product_name = htmlspecialchars($_POST['product_name']); // Chuyển đổi product_name thành chuỗi an toàn
    $product_image = htmlspecialchars($_POST['product_image']);
    $product_price = ($_POST['product_price']);



    // Thêm sản phẩm vào giỏ hàng
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = array('name' => $product_name, 'quantity' => 1, 'image' => $product_image, 'price' => $product_price);
    } else {
        $_SESSION['cart'][$product_id]['quantity']++;
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<div class="main_container">
    <div class="mobile-container">
        <ul class="nav-list">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/mobile.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Điện
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
                            <a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=<?php echo $item['id'] ?>" target="_self" class="list-brand_item"><span><?php echo $item['name'] ?></span> </a>

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
                    <button class="btn-filter" id="manyFilterButton">
                        <i class="fa-solid fa-filter" style="margin-right: 5px;"></i>
                        Bộ lọc
                    </button>
                    <div class="filter-dropdown" id="manyFilterDropdown">
                        <div>
                            <p>Hãng</p>
                            <div>
                                <?php
                                if (!empty($listBrand)) :
                                    foreach ($listBrand as $item) :
                                        if ($item['cartegory_Id'] == '1') :
                                ?>
                                            <button class="filter-option"><?php echo $item['name'] ?></button>

                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Giá</p>
                            <div>
                                <button class="filter-option " data-filter-type="priceFilter">Dưới 2 triệu</button>
                                <button class="filter-option" data-filter-type="priceFilter">Từ 2 - 4 triệu</button>
                                <button class="filter-option" data-filter-type="priceFilter">Từ 4- 7 triệu</button>
                                <button class="filter-option" data-filter-type="priceFilter">Từ 7 - 13 triệu</button>
                                <button class="filter-option" data-filter-type="priceFilter">Từ 13 - 20 triệu</button>
                                <button class="filter-option" data-filter-type="priceFilter">Trên 20 triệu</button>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Bộ nhớ trong</p>
                            <div>
                                <button class="filter-option" data-filter-type="memoryFilter">Dưới 32GB</button>
                                <button class="filter-option" data-filter-type="memoryFilter">32GB và 64GB</button>
                                <button class="filter-option" data-filter-type="memoryFilter">128GB và 256GB</button>
                                <button class="filter-option" data-filter-type="memoryFilter">Trên 512GB</button>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Dung lượng RAM</p>
                            <div>
                                <button class="filter-option">Dưới 4GB</button>
                                <button class="filter-option">4GB - 6GB</button>
                                <button class="filter-option">8GB - 12GB</button>
                                <button class="filter-option">12GB trở lên</button>
                            </div>
                        </div>
                        <button class="btn-filter" id="applyFiltersButton">Xem kết quả</button>
                    </div>
                </div>
              
            
                <div class="filter-price">
                    <button class="btn-filter" id="priceFilterButton">
                        Giá
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                    <div class="filter-dropdown" id="priceFilterDropdown">
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="duoi-2trieu">Dưới 2 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="2-4trieu">Từ 2 - 4 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="4-7trieu">Từ 4- 7 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="7-13trieu">Từ 7 - 13 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="13-20trieu">Từ 13 - 20 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="tren-20trieu">Trên 20 triệu</button>
                    </div>
                </div>

                <div class="filter-memory">
                    <button class="btn-filter" id="memoryFilterButton">
                        Bộ nhớ trong
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                    <div class="filter-dropdown" id="memoryFilterDropdown">
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="duoi-32gb">Dưới 32GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="32gb-64gb">32GB và 64GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="128gb-256gb">128GB và 256GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="tren-512gb">Trên 512GB</button>
                    </div>
                </div>

                <div class="filter-capacityRam">
                    <button class="btn-filter" id="ramFilterButton">
                        Dung lượng RAM
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                    <div class="filter-dropdown" id="ramDropdown">
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="duoi-4gb">Dưới 4GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="4gb-6gb">4GB - 6GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="8gb-12gb">8GB - 12GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="tren-12gb">12GB trở lên</button>
                    </div>
                </div>
            </div>
            <div class="filter-sort_title">
                Sắp xếp theo
            </div>
            <div class="filter-sort_list-filter">
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
     


        <div class="hot-prod-product">
            <div class="prod-mobile">
                <div class="prod-mobile1" id="productContainer">
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
    document.addEventListener("DOMContentLoaded", function() {
        const filterOptions = document.querySelectorAll(".select-filter");

        filterOptions.forEach(option => {
            option.addEventListener("click", function() {
                const filterType = this.getAttribute("data-filter-type");
                const values = this.value;

                if (filterType === "memoryFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&memoryFilter=" + values);
                } else if (filterType === "ramFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&ramFilter=" + values);
                } else if (filterType === "priceFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=" + values);
                }

            });
        });
    })
</script>

</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
