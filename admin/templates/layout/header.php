<?php
if (!defined('_CODE')) {
    die('Access denied...');
}
$listProduct = getRaw("SELECT * FROM product");
$listBrand = getRaw("SELECT * FROM brand");
$listCartegory = getRaw("SELECT * FROM cartegory");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/images/logo.ico? ver= <?php echo rand() ?>" type="image/x-icon">
    <title><?php echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Quản lý người dùng'; ?></title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js ? ver= <?php echo rand() ?>">
    <script src="<?php echo _WEB_HOST ?>/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <header class="header-admin" style="margin-bottom:50px;">
            <div class="nav">
                <ul>
                    <li>
                        <div class="logo">
                            <a href=""><img class="logo-img1" src="<?php echo BASE_URL; ?>images/header-icon/logo1.png" alt="Logo"><img class="logo-img2" src="<?php echo BASE_URL; ?>images/header-icon/logo2.png" alt="Logo"></a>
                        </div>
                    </li>
                    <li><a href="#" class="nav-link">Danh mục</a>
                        <ul>
                            <li><a href="?module=auth&action=cartegoryAdd">Thêm danh mục</a></li>
                            <li><a href="?module=auth&action=cartegoryList">Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link">Loại sản phẩm</a>
                        <ul>
                            <li><a href="?module=auth&action=brandAdd">Thêm loại sản phẩm</a></li>
                            <li><a href="?module=auth&action=brandList">Danh loại sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link">Sản phẩm</a>
                        <ul>
                            <li><a href="?module=auth&action=productAdd">Thêm sản phẩm</a></li>
                            <li><a href="?module=auth&action=productList">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?module=auth&action=cartList" class="nav-link">Quản lý đơn hàng</a>
                        <!-- <ul>
                            <li><a href="?module=auth&action=productAdd">Thêm sản phẩm</a></li>
                            <li><a href="?module=auth&action=productList">Danh sách sản phẩm</a></li>
                        </ul> -->
                    </li>
                    <!-- <li><a href="?module=users" class="nav-link">Tài khoản người dùng</a></li> -->
                </ul>
            </div>
            <form class="search-form" role="search">
                <input type="search" class="search-input" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown dropdown-right">
                <a href="#" class="dropdown-toggle" style="color:black">
                    <img src="<?php echo BASE_URL; ?>/images/logo.ico" width="32" height="32" class="avatar">
                    <!-- <i class="fa-solid fa-caret-down dropdown-arrow"></i> -->
                </a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#">Cài đặt</a></li> -->
                    <li><a href="?module=users&action=list">Thông tin người dùng</a></li>
                    <li><a href="?module=active&action=logout">Đăng xuất</a></li>
                </ul>
            </div>
            <script src="custom.js"></script>
        </header>