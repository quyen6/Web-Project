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

delete('shopping_cart', "");
header('location: shopping_cart.php');
