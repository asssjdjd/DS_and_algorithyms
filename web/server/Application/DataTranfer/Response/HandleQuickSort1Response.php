<?php

namespace App\Application\DataTranfer\Response;

class HandleQuickSort1Response
{
    public static function handleInputQuickSort1Response($data)
    {
        $explaint = "
        Thuật toán dựa trên việc lựa chọn pivot.
        Pivot thường là vị trí đầu, giữa hoặc cuối mảng.
        Ở đây chọn pivot ở đầu mảng arr[0].
        có 3 mảng left = [] : các giá trị nhỏ hơn pivot
        mid = [] : các giá trị bằng pivot
        right = [] : các giá trị lớn hơn pivot.
        Ví dụ với mảng 5 4 2 6 7 8;
        pivot = 5;
        left : [2,4]
        mid : [5]
        right : [6 7 8]
    ";
        $response = [];
        array_push($response, $data);
        array_push($response, $explaint);
        return $response;
    }
}
