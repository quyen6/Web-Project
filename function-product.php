<?php
$filterAll = filter();
if (!empty($filterAll['priceFilter'])) {
    $values = $filterAll['priceFilter'];
    switch ($values) {
        case 'duoi-2trieu':
            $valuesname = 'Dưới 2 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) < 2000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '2-4trieu':
            $valuesname = 'Từ 2 - 4 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 2000000 AND 4000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '4-7trieu':
            $valuesname = 'Từ 4 - 7 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 4000000 AND 7000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '7-13trieu':
            $valuesname = 'Từ 7 - 13 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 7000000 AND 13000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '13-20trieu':
            $valuesname = 'Từ 13 - 20 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 13000000 AND 20000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case 'tren-20trieu':
            $valuesname = 'Trên 20 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) > 20000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
            //laptop
        case 'duoi-10trieu':
            $valuesname = 'Dưới 10 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) < 10000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '10-15trieu':
            $valuesname = 'Từ 10 - 15 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 10000000 AND 15000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '15-20trieu':
            $valuesname = 'Từ 15 - 20 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 15000000 AND 20000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '20-25trieu':
            $valuesname = 'Từ 20 - 25 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 20000000 AND 25000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case '25-30trieu':
            $valuesname = 'Từ 25 - 30 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) BETWEEN 25000000 AND 30000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
            break;
        case 'tren-30trieu':
            $valuesname = 'Trên 30 triệu';
            $query = getRaw("SELECT * FROM product WHERE CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) > 30000000 ORDER BY CAST(REPLACE(giaKhuyenMai, '.', '') AS UNSIGNED) ASC");
    }
}

if (!empty($filterAll['memoryFilter'])) {
    $values = $filterAll['memoryFilter'];
    switch ($values) {
        case 'duoi-32gb':
            $valuesname = 'Dưới 32GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (boNhoTrong LIKE '%GB%' AND CAST(REPLACE(boNhoTrong, 'GB', '') AS UNSIGNED) < 32) 
                    OR 
                    (boNhoTrong LIKE '%TB%' AND CAST(REPLACE(boNhoTrong, 'TB', '') AS UNSIGNED) * 1024 < 32)");
            break;

        case '32gb-64gb':
            $valuesname = '32GB và 64GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (boNhoTrong LIKE '%GB%' AND CAST(REPLACE(boNhoTrong, 'GB', '') AS DECIMAL) BETWEEN 32 AND 64) 
                    OR 
                    (boNhoTrong LIKE '%TB%' AND CAST(REPLACE(boNhoTrong, 'TB', '') AS DECIMAL) * 1024 BETWEEN 32 AND 64)");
            break;

        case '128gb-256gb':
            $valuesname = '128GB và 256GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (boNhoTrong LIKE '%GB%' AND CAST(REPLACE(boNhoTrong, 'GB', '') AS DECIMAL) BETWEEN 128 AND 256) 
                    OR 
                    (boNhoTrong LIKE '%TB%' AND CAST(REPLACE(boNhoTrong, 'TB', '') AS DECIMAL) * 1024 BETWEEN 128 AND 256)");
            break;

        case 'tren-512gb':
            $valuesname = 'Trên 512GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (boNhoTrong LIKE '%GB%' AND CAST(REPLACE(boNhoTrong, 'GB', '') AS UNSIGNED) > 512) 
                    OR 
                    (boNhoTrong LIKE '%TB%' AND CAST(REPLACE(boNhoTrong, 'TB', '') AS UNSIGNED) * 1024 > 512)");
            break;

        case '120gb':
            $valuesname = '120GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 120) 
                    OR 
                    (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 120)");
            break;

        case '128gb':
            $valuesname = '128GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 128) 
                    OR 
                    (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 128)");
            break;

        case '256gb':
            $valuesname = '256GB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 256) 
                    OR 
                    (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 256)");
            break;

        case '512gb':
            $valuesname = '512GB';
            $query = getRaw("SELECT * FROM product WHERE 
                (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 512) 
                OR 
                (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 512)");
            break;

        case '1tb':
            $valuesname = '1TB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 1024) 
                    OR 
                    (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 1024)");
            break;

        case '2tb':
            $valuesname = '2TB';
            $query = getRaw("SELECT * FROM product WHERE 
                    (oCung LIKE '%GB%' AND CAST(REPLACE(oCung, 'GB', '') AS UNSIGNED) = 2 * 1024) 
                    OR 
                    (oCung LIKE '%TB%' AND CAST(REPLACE(oCung, 'TB', '') AS UNSIGNED) * 1024 = 2 * 1024)");
            break;
    }
}
if (!empty($filterAll['ramFilter'])) {
    $values = $filterAll['ramFilter'];
    switch ($values) {
        case 'duoi-4gb':
            $valuesname = 'Dưới 4GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS UNSIGNED) < 4");
            break;

        case '4gb-6gb':
            $valuesname = '4GB - 6GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) BETWEEN 4 AND 6");
            break;

        case '8gb-12gb':
            $valuesname = '8GB - 12GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) BETWEEN 8 AND 12");
            break;

        case 'tren-12gb':
            $valuesname = 'Trên 12GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS UNSIGNED) > 12");
            break;

        case '8gb':
            $valuesname = '8GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 8");
            break;

        case '12gb':
            $valuesname = '12GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 12");
            break;

        case '16gb':
            $valuesname = '16GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 16");
            break;

        case '32gb':
            $valuesname = '32GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 32");
            break;

        case '48gb':
            $valuesname = '48GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 48");
            break;

        case '64gb':
            $valuesname = '64GB';
            $query = getRaw("SELECT * FROM product WHERE 
                dungLuongRam LIKE '%GB%' AND CAST(REPLACE(dungLuongRam, 'GB', '') AS DECIMAL) = 64");
            break;
    }
}
if (!empty($filterAll['product_id'])) {
    $productId = $filterAll['product_id'];
    $productDetail = oneRaw("SELECT * FROM product WHERE id='$productId'");
    if ($productDetail) {
        setFLashData('product-dail', $productDetail);
    } else {
        echo "Loi";
    }
}
