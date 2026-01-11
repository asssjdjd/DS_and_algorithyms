<?php 
function handleSearchMissingNumberRequest($data) {
    // chuẩn hóa trong dòng số 2
    $numbers_1 = $data["data"][0]["data"];
    $numbers_2 = $data["data"][1]["data"];
    $numbers_1 = trim($numbers_1);
    $numbers_2 = trim($numbers_2);

    $arr_1 = preg_split('/\s+/', $numbers_1);
    $arr_2 = preg_split('/\s+/', $numbers_2);
    // lấy số lượng ký tự

    return [$arr_1,$arr_2];
}