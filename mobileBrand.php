<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');

/////////
$filterAll = filter();

if (!empty($filterAll['brand_id'])) {
    $brandId = $filterAll['brand_id'];
    $_SESSION['brand_id'] = $brandId; // Lưu brand_id vào session
    $brandDetail = oneRaw("SELECT * FROM product WHERE brand_Id='$brandId'");
    if ($brandDetail) {
        setFLashData('brand-dail', $brandDetail);
    } else {
        echo "Loi";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandId = isset($_SESSION['brand_id']) ? $_SESSION['brand_id'] : null; // Lấy lại brand_id từ session
    header("Location: " . $_SERVER['PHP_SELF'] . "?brand_id=" . $brandId);
    exit;
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     header("Location: " . $_SERVER['PHP_SELF'] . "?brand_id=" .$brandId);
//     exit;
// }

?>

<div class="main_container_chil">
    <div class="mobile-container">
        <ul class="nav-list">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/mobile.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Điện
                    thoại</a>
            </li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/mobileBrand.php?brand_id=<?php echo $brandId ?>"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>
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
        <!-- <div class="clear"></div> -->
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
                                <button class="filter-option">Dưới 2 triệu</button>
                                <button class="filter-option">Từ 2 - 4 triệu</button>
                                <button class="filter-option">Từ 4- 7 triệu</button>
                                <button class="filter-option">Từ 7 - 13 triệu</button>
                                <button class="filter-option">Từ 13 - 20 triệu</button>
                                <button class="filter-option">Trên 20 triệu</button>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Bộ nhớ trong</p>
                            <div>
                                <button class="filter-option">Dưới 32GB</button>
                                <button class="filter-option">32GB và 64GB</button>
                                <button class="filter-option">128GB và 256GB</button>
                                <button class="filter-option">Trên 512GB</button>
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
        <div class="prod-mobile">
            <div class="prod-mobile1" id="productContainer">
                <?php
                if (!empty($listProduct)) :
                    foreach ($listProduct as $item) :
                        if ($item['brand_Id'] == $brandId && $item['cartegory_Id'] == '1') :
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterOptions = document.querySelectorAll(".select-filter");
        var brand_id = <?php echo json_encode($brandId); ?>;

        filterOptions.forEach(option => {
            option.addEventListener("click", function() {
                const filterType = this.getAttribute("data-filter-type");
                const values = this.value;

                if (filterType === "memoryFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&memoryFilter=" + values);
                } else if (filterType === "ramFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&ramFilter=" + values);
                } else if (filterType === "priceFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&priceFilter=" + values);
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
