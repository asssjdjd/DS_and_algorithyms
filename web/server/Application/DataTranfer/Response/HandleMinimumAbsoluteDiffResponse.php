<?php

namespace App\Application\DataTranfer\Response;

class  HandleMinimumAbsoluteDiffResponse
{
    public static function handleMinimumAbsoluteDiffResponse($data)
    {
        $explaint = "
        Thuật toán giúp tìm ra khoảng cách nhỏ nhất giữa các phần tử trong mảng.
        Được thực hiện bằng cách sort mảng.
        Lúc này chỉ cần lấy | số sau - số trước | để cập nhật giá trị nhỏ nhất.
    ";
        $response = [];
        array_push($response, $data);
        array_push($response, $explaint);
        return $response;
    }
}
