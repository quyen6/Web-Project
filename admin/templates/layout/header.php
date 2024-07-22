<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Quản lý người dùng'; ?></title>
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/css/style.css ? ver= <?php echo rand() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js">
</head>

<body>
    <div class="container">
        <header class="header-admin">
            <div class="nav">
                <ul>
                    <li><a href="#" class="nav-link">Danh mục</a></li>
                    <li><a href="#" class="nav-link">Loại sản phẩm</a></li>
                    <li><a href="#" class="nav-link">Sản phẩm</a></li>
                    <li><a href="#" class="nav-link">Tài khoản người dùng</a></li>
                </ul>
            </div>
            <form class="search-form" role="search">
                <input type="search" class="search-input" placeholder="Search..." aria-label="Search">
            </form>

            <div class="dropdown">
                <!-- <a href="#" class="dropdown-toggle">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="avatar">
            
        </a> -->
                <a href="">
                    <img src="https://github.com/mdo.png" width="32" height="32" class="avatar">

                </a>
                <i class="fa-solid fa-caret-down dropdown-arrow"></i>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="#">Thông tin người dùng</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="?module=auth&action=logout">Đăng xuất</a></li>
                </ul>
            </div>
            <script src="custom.js"></script>
        </header>