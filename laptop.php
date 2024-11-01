<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
// $filterAll = filter();
// if (!empty($filterAll['product_id'])) {
//     $productId = $filterAll['product_id'];
//     $productDetail = oneRaw("SELECT * FROM product WHERE id='$productId'");
//     if ($productDetail) {
//         setFLashData('product-dail', $productDetail);
//     } else {
//         echo "Loi";
//     }
// }
// if (isPost()) {
//     $productCount = getRows("SELECT * FROM shopping_cart WHERE product_Id='$productId'");
//     if ($productCount > 0) {
//         if (!empty($listCart)) :
//             foreach ($listCart as $item) :
//                 if ($item['product_Id'] == $productId) :
//                     $soluong = $item['soLuong'];
//                 endif;
//             endforeach;
//         endif;
//         $soluong = intval($soluong) + 1;
//         $dataUpdate = [
//             'soLuong' => $soluong,
//         ];
//         $condition = "product_Id=$productId";
//         $updateStatus = update('shopping_cart', $dataUpdate, $condition);
//     } else {
//         if (!empty($listProduct)) :
//             foreach ($listProduct as $item) :
//                 if ($item['id'] == $productId) :
//                     $productName = $item['tenSanPham'];
//                     $productGia = $item['giaSanPham'];
//                     $productAnh = $item['anhSanPham'];
//                 endif;
//             endforeach;
//         endif;
//         $dataInsert = [
//             'product_Id' => $productId,
//             'tenSanPham' => $productName,
//             'gia' => $productGia,
//             'anhSanPham' => $productAnh,
//             'soLuong' => '1',
//         ];
//         $insertStatus = insert('shopping_cart', $dataInsert);
//         if ($insertStatus) {
//             setFLashData('smg', 'Thêm giỏ hàng thành công!!');
//             setFLashData('smg_type', 'success');
//         } else {
//             setFLashData('smg', 'Hệ thống đang lỗi vui lòng thử lại sau!!');
//             setFLashData('smg_type', 'danger');
//         }
//     }
//     $current_url = $_SERVER['HTTP_REFERER'];
//     header("Location: $current_url");
// }

// $smg = getFLashData('smg');
// $smg_type = getFLashData('smg_type');
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
    <div class="laptop-container">
        <ul class="nav-list">
            <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
            <li><a href="<?php echo _WEB_HOST_1 ?>/laptop.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Laptop</a>
            </li>
        </ul>
        <div class="clear"></div>

        <div class="list-brand">
            <nav>
                <?php
                if (!empty($listBrand)) :
                    foreach ($listBrand as $item) :
                        if ($item['cartegory_Id'] == '2') :
                ?>
                            <a href="<?php echo _WEB_HOST_1 ?>/laptopBrand.php?brand_id=<?php echo $item['id'] ?>" target="_self" class="list-brand_item"><span><?php echo $item['name'] ?></span> </a>

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
                                        if ($item['cartegory_Id'] == '2') :
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
                                <button class="filter-option">Dưới 10 triệu</button>
                                <button class="filter-option">Từ 10 - 15 triệu</button>
                                <button class="filter-option">Từ 15 - 20 triệu</button>
                                <button class="filter-option">Từ 20 - 25 triệu</button>
                                <button class="filter-option">Từ 25 - 30 triệu</button>
                                <button class="filter-option">Trên 30 triệu</button>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Ổ cứng</p>
                            <div>
                                <button class="filter-option " value="120gb">120GB</button>
                                <button class="filter-option " value="128gb">128GB</button>
                                <button class="filter-option " value="256gb">256GB</button>
                                <button class="filter-option " value="512gb">512GB</button>
                                <button class="filter-option " value="1tb">1TB</button>
                                <button class="filter-option " value="2tb">2TB</button>
                            </div>
                            <hr>
                        </div>
                        <div>
                            <p>Dung lượng RAM</p>
                            <div>
                                <button class="filter-option" value="8gb">8GB</button>
                                <button class="filter-option" value="12gb">12GB</button>
                                <button class="filter-option" value="16gb">16GB</button>
                                <button class="filter-option" value="32gb">32GB</button>
                                <button class="filter-option" value="48gb">48GB</button>
                                <button class="filter-option" value="64gb">64GB</button>
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
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="duoi-10trieu">Dưới 10 triệu </button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="10-15trieu">Từ 10 - 15 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="15-20trieu">Từ 15 - 20 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="20-25trieu">Từ 20 - 25 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="25-30trieu">Từ 25 - 30 triệu</button>
                        <button class="filter-option select-filter" data-filter-type="priceFilter" value="tren-30trieu">Trên 30 triệu</button>
                    </div>
                </div>
                <div class="filter-memory">
                    <button class="btn-filter" id="memoryFilterButton">
                        Ổ cứng
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                    <div class="filter-dropdown" id="memoryFilterDropdown">
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="120gb">120GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="128gb">128GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="256gb">256GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="512gb">512GB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="1tb">1TB</button>
                        <button class="filter-option select-filter" data-filter-type="memoryFilter" value="2tb">2TB</button>
                    </div>
                </div>

                <div class="filter-capacityRam">
                    <button class="btn-filter" id="ramFilterButton">
                        Dung lượng RAM
                        <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 5px;"></i>
                    </button>
                    <div class="filter-dropdown" id="ramDropdown">
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="8gb">8GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="12gb">12GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="16gb">16GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="32gb">32GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="48gb">48GB</button>
                        <button class="filter-option select-filter" data-filter-type="ramFilter" value="64gb">64GB</button>
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
            <div class="prod-laptop">
                <div class="prod-laptop1" id="productContainer">
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
                            if ($item['cartegory_Id'] == '2') :
                                $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                    ?>
                                <div class="laptop-link product-link">
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
    document.addEventListener("DOMContentLoaded", function() {
        const filterOptions = document.querySelectorAll(".select-filter");

        filterOptions.forEach(option => {
            option.addEventListener("click", function() {
                const filterType = this.getAttribute("data-filter-type");
                const values = this.value;

                if (filterType === "memoryFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&memoryFilter=" + values);
                } else if (filterType === "ramFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&ramFilter=" + values);
                } else if (filterType === "priceFilter") {
                    window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=" + values);
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
