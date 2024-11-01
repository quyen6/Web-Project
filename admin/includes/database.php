<?php
if (!defined('_CODE')) {
    die('Access denied...');
}

function query($sql, $data = [], $check = false)
{
    global $conn;
    $ketqua = false;
    try {
        $statement = $conn->prepare($sql);

        if (!empty($data)) {
            $ketqua = $statement->execute($data);
        } else {
            $ketqua = $statement->execute();
        }
    } catch (Exception $exception) {
        echo $exception->getMessage() . '<br>';
        echo 'File: ' . $exception->getFile() . '<br>';
        echo 'Line: ' . $exception->getLine();
        die();
    }

    if ($check) {
        return $statement;
    }
    return $ketqua;
}
// Hàm insert vào data
function insert($table, $data)
{
    $data = array_filter($data, function($value) {
        return !is_null($value) && $value !== '';
    });

    $key = array_keys($data);
    $truong = implode(',', $key);
    $valuetb = ':' . implode(',:', $key);

    $sql = "INSERT INTO $table ( $truong ) VALUES ( $valuetb )";
    $kq = query($sql, $data);
    return $kq;
}
// Hàm update
function update($table, $data, $condition = '')
{
    $update = '';
    foreach ($data as $key => $value) {
        $update .= $key . '= :' . $key . ',';
    }
    $update = trim($update, ',');

    if (!empty($condition)) {
        $sql = "UPDATE $table SET $update WHERE $condition";
    } else {
        $sql = "UPDATE $table SET $update ";
    }

    $kq =  query($sql, $data);
    return $kq;
}

// Hàm delete
function delete($table, $condition)
{
    if (empty($condition)) {
        $sql = "DELETE FROM $table";
    } else {
        $sql = "DELETE FROM $table WHERE $condition";
    }
    $kq =  query($sql);
    return $kq;
}

// Hàm lấy nhiều dòng dữ liệu

function getRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetchAll(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}

// Lấy 1 dòng dữ liệu

function oneRaw($sql)
{
    $kq = query($sql, '', true);
    if (is_object($kq)) {
        $dataFetch = $kq->fetch(PDO::FETCH_ASSOC);
    }
    return $dataFetch;
}
// Đếm số dòng dữ liệu

function getRows($sql)
{
    $kq = query($sql, '', true);
    if (!empty($kq)) {
        return $kq->rowCount();// đếm số dòng
    }
}
