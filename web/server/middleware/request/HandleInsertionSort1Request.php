<?php 
function hanldeInsertionSort1DataRequest($data) {
    // chuẩn hóa trong dòng số 2
    $numbers = $data["data"][1]["data"];
    $numbers = trim($numbers);

    $arr = preg_split('/\s+/', $numbers);
    // lấy số lượng ký tự
    $n = intval($data["data"][0]["data"]);

    return [$n, $arr];
}