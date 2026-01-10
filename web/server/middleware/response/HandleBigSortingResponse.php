<?php 

function handleInputBigSortingResponse ($data) {
    $explaint = "
        Thuật toán giúp sắp xếp các số lớn.
        Ví dự với số có 18 chữ số, ví dụ 128193819381841848149817.
        Các thuật toán bình thường không sắp xếp được.
    ";
    $response = [];
    array_push($response,$data);
    array_push($response,$explaint);
    return $response;
}