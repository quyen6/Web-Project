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

$filterAll = filter();
if (!empty($filterAll['id'])) {
    $cart_id = $filterAll['id'];
    $cartDetail = getRows("SELECT * FROM shopping_cart WHERE id ='$cart_id'");
    if ($cartDetail > 0) {
        delete('shopping_cart', "id=$cart_id");
    } else {
        setFLashData('smg', 'Sản phẩm không có trong giỏ hàng !!');
        setFLashData('smg_type', 'danger');
    }
}
header('location: shopping_cart.php');
