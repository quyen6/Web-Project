<?php
$cartegoryId = $_GET['cartegory_id'];

if (!empty($cartegoryId)) {
    $listBrand = getRaw("SELECT * FROM brand ");

    foreach ($listBrand as $item) {
        if ($item['cartegory_Id'] == $cartegoryId) {
            echo "<option value='{$item['id']}'>{$item['name']}</option>";
        }
    }
}
