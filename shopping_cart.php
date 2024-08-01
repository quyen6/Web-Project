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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            background-color: #f3f3f3;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: center;
            background-color: #e8e8e8;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #236B8E;
            color: white;
        }

        td {
            background-color: white;
            color: #333;
        }

        td:nth-child(3) img {
            width: 100px;
            height: auto;
        }

        td:nth-child(1),
        td:nth-child(4),
        td:nth-child(5),
        td:nth-child(6),
        td:nth-child(7) {
            text-align: center;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>LAPTOP</td>
                <td><img src="laptop.jpg" alt="Laptop"></td>
                <td>25000/-</td>
                <td>
                    <div class="quantity_box">
                        <input type="number" min="1">
                        <input type="submit" class="update_quantity" value="Update">
                    </div>
                </td>
                <td>25000/-</td>
                <td><a href="#"><i class="fas fa-trash"></i>
                        REMOVE</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>LAPTOP</td>
                <td><img src="laptop.jpg" alt="Laptop"></td>
                <td>25000/-</td>
                <td>1</td>
                <td>25000/-</td>
                <td><a href="#">REMOVE</a></td>
            </tr>
        </tbody>
    </table>
</body>

</html>