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

$provinceId = $_GET['province_id'];

if (!empty($provinceId)) {
    $listDistrict = getRaw("SELECT * FROM district WHERE province_id='$provinceId'");
    foreach ($listDistrict as $item) {
        echo "<option value='{$item['id']}'>{$item['name']}</option>";
    }
}
