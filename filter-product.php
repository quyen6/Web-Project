<?php
ob_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/header.php');
include("function-product.php");
$filterAll = filter();
if (!empty($filterAll['cartegory_id'])) {
    $cartegoryId = $filterAll['cartegory_id'];
}
?>
<div class="main_container">
    <?php
    if ($cartegoryId == '1' && !isset($_GET['brand_id'])) {
    ?>
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
                                    <button class="filter-option" id="1">Dưới 32GB</button>
                                    <button class="filter-option" id="2">32GB và 64GB</button>
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
                        <div class="filter-dropdown" id="ramFilterDropdown">
                            <button class="filter-option select-filter" data-filter-type="ramFilter" value="duoi-4gb">Dưới 4GB</button>
                            <button class="filter-option select-filter" data-filter-type="ramFilter" value="4gb-6gb">4GB - 6GB</button>
                            <button class="filter-option select-filter" data-filter-type="ramFilter" value="8gb-12gb">8GB - 12GB</button>
                            <button class="filter-option select-filter" data-filter-type="ramFilter" value="tren-12gb">12GB trở lên</button>
                        </div>
                    </div>
                </div>
                <div class="filter-sort_title">
                    Đang lọc theo
                </div>
                <div class="filter-sort_list-filter">
                    <button class="btn-filter active_1">
                        <?php
                        if (!empty($filterAll['memoryFilter'])) {
                            echo "Bộ nhớ trong: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['ramFilter'])) {
                            echo "Dung lượng Ram: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['priceFilter'])) {
                            echo "Giá: ";
                            echo $valuesname;
                        }
                        ?>
                    </button>
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

            <div class="hot-prod-product" style="margin-top:10px">
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
                        if (!empty($query)) :
                            foreach ($query as $item) :
                                if ($item['cartegory_Id'] == '1') :
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
    <?php
    } else if ($cartegoryId == '2' && !isset($_GET['brand_id'])) {
    ?>
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
                            <button class="filter-option select-filter" data-filter-type="priceFilter" value="duoi-10trieu">Dưới 10 triệu</button>
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
                        <div class="filter-dropdown" id="ramFilterDropdown">
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
                    Đang lọc theo
                </div>
                <div class="filter-sort_list-filter">
                    <button class="btn-filter active_1">
                        <?php
                        if (!empty($filterAll['memoryFilter'])) {
                            echo "ổ cứng: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['ramFilter'])) {
                            echo "Dung lượng Ram: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['priceFilter'])) {
                            echo "Giá: ";
                            echo $valuesname;
                        }
                        ?>
                    </button>
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
            <div class="hot-prod-product" style="margin-top:10px">
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
                        if (!empty($query)) :
                            foreach ($query as $item) :
                                if ($item['cartegory_Id'] == '2') :
                                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                        ?>
                                    <div class="mobile-link">
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
    <?php
    } else if ($cartegoryId == '1' && isset($_GET['brand_id'])) {
        $brandId = $_GET['brand_id'];
    ?>
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
            <div class="clear"></div>

            <div class="list-brand">
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
                                        <button class="filter-option" id="1">Dưới 32GB</button>
                                        <button class="filter-option" id="2">32GB và 64GB</button>
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
                            <div class="filter-dropdown" id="ramFilterDropdown">
                                <button class="filter-option select-filter" data-filter-type="ramFilter" value="duoi-4gb">Dưới 4GB</button>
                                <button class="filter-option select-filter" data-filter-type="ramFilter" value="4gb-6gb">4GB - 6GB</button>
                                <button class="filter-option select-filter" data-filter-type="ramFilter" value="8gb-12gb">8GB - 12GB</button>
                                <button class="filter-option select-filter" data-filter-type="ramFilter" value="tren-12gb">12GB trở lên</button>
                            </div>
                        </div>
                    </div>
                    <div class="filter-sort_title">
                        Đang lọc theo
                    </div>
                    <div class="filter-sort_list-filter">
                        <button class="btn-filter active_1">
                            <?php
                            if (!empty($filterAll['memoryFilter'])) {
                                echo "Bộ nhớ trong: ";
                                echo $valuesname;
                            }
                            if (!empty($filterAll['ramFilter'])) {
                                echo "Dung lượng Ram: ";
                                echo $valuesname;
                            }
                            if (!empty($filterAll['priceFilter'])) {
                                echo "Giá: ";
                                echo $valuesname;
                            }
                            ?>
                        </button>
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

                <div class="hot-prod-product" style="margin-top:10px">
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
                            if (!empty($query)) :
                                foreach ($query as $item) :
                                    if ($item['cartegory_Id'] == '1' && $item['brand_Id'] == $brandId) :
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
        </div>
    <?php
    } else if ($cartegoryId == '2' && isset($_GET['brand_id'])) {
        $brandId = $_GET['brand_id'];
    ?>
        <div class="laptop-container">
            <ul class="nav-list">
                <li><a href="<?php echo _WEB_HOST_1 ?>/index.php" target="_self"><i class="fa-solid fa-house" style="color: red;"></i>Trang chủ</a></li>
                <li><a href="<?php echo _WEB_HOST_1 ?>/laptop.php" target="_self"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>Laptop</a>
                </li>
                <li><a href="<?php echo _WEB_HOST_1 ?>/laptopBrand.php?brand_id=<?php echo $brandId ?>"><i class="fa-solid fa-greater-than" style="font-size: 12px;"></i>
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
            <div class="clear"></div>

            <div class="list-brand">
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
                            <button class="filter-option select-filter" data-filter-type="priceFilter" value="duoi-10trieu">Dưới 10 triệu</button>
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
                        <div class="filter-dropdown" id="ramFilterDropdown">
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
                    Đang lọc theo
                </div>
                <div class="filter-sort_list-filter">
                    <button class="btn-filter active_1">
                        <?php
                        if (!empty($filterAll['memoryFilter'])) {
                            echo "Ổ cứng: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['ramFilter'])) {
                            echo "Dung lượng Ram: ";
                            echo $valuesname;
                        }
                        if (!empty($filterAll['priceFilter'])) {
                            echo "Giá: ";
                            echo $valuesname;
                        }
                        ?>
                    </button>
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

            <div class="hot-prod-product" style="margin-top:10px">
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
                        if (!empty($query)) :
                            foreach ($query as $item) :
                                if ($item['cartegory_Id'] == '2' && $item['brand_Id'] == $brandId) :
                                    $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                        ?>
                                    <div class="mobile-link">
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
    <?php
    }
    ?>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterOptions = document.querySelectorAll(".select-filter");
        var cartegory_id = <?php echo json_encode($cartegoryId); ?>;
        var brand_id = <?php echo json_encode(isset($brandId) ? $brandId : null); ?>;
        console.log(cartegory_id);
        console.log(brand_id);
        filterOptions.forEach(option => {
            option.addEventListener("click", function() {
                const filterType = this.getAttribute("data-filter-type");
                const values = this.value;

                if (filterType === "memoryFilter") {
                    if (cartegory_id === "1" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&memoryFilter=" + values);
                    } else if (cartegory_id === "1" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&memoryFilter=" + values);

                    } else if (cartegory_id === "2" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&memoryFilter=" + values);
                    } else if (cartegory_id === "2" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&brand_id=" + brand_id + "&memoryFilter=" + values);

                    }
                } else if (filterType === "ramFilter") {
                    if (cartegory_id === "1" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&ramFilter=" + values);
                    } else if (cartegory_id === "1" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&ramFilter=" + values);

                    } else if (cartegory_id === "2" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&ramFilter=" + values);
                    } else if (cartegory_id === "2" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&brand_id=" + brand_id + "&ramFilter=" + values);

                    }
                } else if (filterType === "priceFilter") {
                    if (cartegory_id === "1" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&priceFilter=" + values);
                    } else if (cartegory_id === "1" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=1&brand_id=" + brand_id + "&priceFilter=" + values);

                    } else if (cartegory_id === "2" && brand_id == null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&priceFilter=" + values);
                    } else if (cartegory_id === "2" && brand_id != null) {
                        window.location.replace("<?php echo _WEB_HOST_1 ?>/filter-product.php?cartegory_id=2&brand_id=" + brand_id + "&priceFilter=" + values);
                    }
                }

            });
        });
    });
</script>
</body>

</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/aside.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Web_Project/layout/footer.php');
ob_end_flush();
