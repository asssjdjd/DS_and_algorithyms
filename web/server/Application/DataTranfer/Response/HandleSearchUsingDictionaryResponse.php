<?php

namespace App\Application\DataTranfer\Response;

class HandleSearchUsingDictionaryResponse
{
    public static function handleSearchUsingDictionaryResponse($data)
    {
        $explaint = "
        Thuật toán này giúp tìm ra 2 vị trí đầu tiên mà sao cho tổng của chúng bằng m.
        Ví dụ cho m = 5; mảng [1,2,3,4,5]
        Các vị trí cho tổng bằng 5 là [1 và 4] và [2 và 3]
        Do đó thuật toán trả về 2 vị trí đầu tiên là 1 và 4.
        Các vị trí này đã cộng thêm 1 so với index.
        VÀ NÓ TÌM KIẾM DỰA TRÊN 2 VỊ TRÍ ĐỀU ĐÃ XUẤT HIỆN.
        Ví dụ nếu có mảng [5 2 4 1] và m = 6.
        Kết quả trả về [2,3] ứng với [2,4] thay vì [1,4] ứng với [5,1] mặc dù 5 xuất hiện trước.
    ";
        $response = [];
        array_push($response, $data);
        array_push($response, $explaint);
        return $response;
    }
}
