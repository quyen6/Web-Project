<!-- các hàm chung project -->

<?php

if (!defined('_CODE')) {
    die('Access denied...');
}

function layout($layoutName = 'header', $data = [])
{
    if (file_exists(_WEB_PATH_TEMPLATES . '/layout/' . $layoutName . '.php')) {
        require_once(_WEB_PATH_TEMPLATES . '/layout/' . $layoutName . '.php');
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $content)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'vietcyberjutsu@gmail.com';                     //SMTP username
        $mail->Password   = 'dipmrwqxvogomqvs';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('hoangvietpk16@gmail.com', 'Hoàng Việt');
        $mail->addAddress($to);     //Add a recipient

        //Content

        $mail->CharSet = "UTF-8";
        $mail->isHTML(true);                                  //Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_seft_signed' => true
            )
        );

        $sendMail = $mail->send();
        if ($sendMail) {
            return $sendMail;
        }
    } catch (Exception $e) {
        echo "Gửi mail thất bại: {$mail->ErrorInfo}";
    }
}

//Kiểm tra phương thức GET
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }
    return false;
}

//Kiểm tra phương thức POST
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }
    return false;
}

//Hàm Filter dọc dữ liệu
function filter()
{
    if (isGet()) {
        //Xử lý các dữ liệu trước khi hiển thị ra
        // return $_POST;
        $filterArr = [];
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    if (isPost()) {
        //Xử lý các dữ liệu trước khi hiển thị ra
        // return $_GET;
        $filterArr = [];
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

//Hàm kiểm tra email
function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}

// Hàm kiểm tra số nguyên
function isNumberInt($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}

// Hàm kiểm tra số thực
function isNumberFloat($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
    return $checkNumber;
}

//Hàm kiểm tra số điện thoại
function isPhone($phone)
{
    $checkZero = false;

    //Điều kiện 1: ký tự đầu tiên là số 0
    if ($phone[0] = 0) {
        $checkZero = true;
        $phone = substr($phone, 1);
    }

    //Điều kiện 2: kiểm tra đằng sau có 9 số
    $checkNumber = true;
    if (isNumberInt($phone) && strlen($phone) == 9) {
        $checkNumber = true;
    }

    if ($checkZero && $checkNumber) {
        return true;
    }
    return false;
}

//Thông báo lỗi
function getSmg($smg, $type = 'success')
{
    echo '<div class="alert alert-' . $type . '">';
    echo $smg;
    echo '</div>';
}

// Hàm điều hướng
function redirect($path='index.php')
{
    header("Location: $path");
    exit;
}

//Hàm thông báo lỗi
function form_error($fileName, $beforeHtml = '', $afterHtml = '', $errors = [])
{
    return (!empty($errors[$fileName])) ? $beforeHtml . reset($errors[$fileName]) . $afterHtml : null;
}

//Hàm hiển thị dữ liệu cũ
function old($fileName, $old)
{
    return !empty($old[$fileName]) ? $old[$fileName] : null;
}

//Hàm kiểm tra trạng thái đăng nhập
function isLogin()
{
    $checkLogin = false;
    if (getSession('tokenlogin')) {
        $tokenLogin = getSession('tokenlogin');

        //Kiểm tra token có giống trong database
        $queryToken = oneRaw("SELECT admin_Id FROM tokenlogin WHERE token='$tokenLogin'");

        if (!empty($queryToken)) {
            $checkLogin = true;
        } else {
            removeSession('tokenlogin');
        }
    }
    return $checkLogin;
}
