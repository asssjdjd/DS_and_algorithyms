<?php

namespace App\Application\DataTranfer\Response;

class HandleSearchMissingNumberResponse
{
    public static function handleSearchMissingNumberResponse($data)
    {
        $explaint = "
        Thuật toán này giúp tìm các số có trong mảng số 2 mà không có trong mảng số 1.
        Vì vậy thuật toán này bắt buộc mảng số 2 phải có chứa mảng số 1.
        Thuật toán này chỉ tìm các số thiếu chứ không tìm cụ thể thiếu bao nhiêu. 
        Thuật toán sắp xếp lại kết quả.
        Ví dụ mảng 1 có 2 số 100, mảng số 2 có 4 số 100.
        Thì thuật toán chỉ tìm mảng 2 hơn mảng 1 số 100 chứ không liệt kê cụ thể 2 số 100
    ";
        $response = [];
        array_push($response, $data);
        array_push($response, $explaint);
        return $response;
    }
}
