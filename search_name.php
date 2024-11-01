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

if (isset($_POST['action']) && $_POST['action'] == 'searchRecord') {
    $search_name = $_POST['search_name'];

    if (strlen($search_name) > 0 && strlen($search_name) < 50) {
        $query = getRaw("SELECT * FROM product WHERE tenSanPham LIKE '%$search_name%' ORDER BY id DESC");

        if (!empty($query)) {
            $selectedProducts = array_slice($query, 0, 5);
            echo '<li>Sản phẩm gợi ý</li>';

            foreach ($selectedProducts as $item) {
                $imagePath = "admin/modules/auth/uploads/" . $item['anhSanPham'];
                if ($item['cartegory_Id'] == 1) {
                    echo '<li>
                    <a class="row" href="' . _WEB_HOST_1 . '/mobileDetail.php?product_id=' . $item['id'] . '">
                    <div class="col col-xl-2">
                        <img src="' . $imagePath . '" alt="" style="width:50px; height:40px">
                     </div>
                    <span>' . $item['tenSanPham'] . '</span>
                     </a>
                    </li>';
                } else if ($item['cartegory_Id'] == 2) {
                    echo '<li>
                <a class="row" href="' . _WEB_HOST_1 . '/laptopDetail.php?product_id=' . $item['id'] . '">
                <div class="col col-xl-2">
                    <img src="' . $imagePath . '" alt="" style="width:50px; height:40px">
                 </div>
                <span>' . $item['tenSanPham'] . '</span>
                 </a>
                </li>';
                }
            }
        } else {
            echo '<li>Không tìm thấy sản phẩm phù hợp</li>';
        }
    } else {
        echo '<li>Không tìm thấy sản phẩm phù hợp</li>';
    }
}
