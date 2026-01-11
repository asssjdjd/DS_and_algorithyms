<?php 

function handleThePowerSumResponse ($data) {
    $explaint = "
        Thuật toán sẽ tìm tất cả các giá trị mũ N mà nhỏ hơn X.
        Ví dụ với X = 100 và N = 2; 
        Nó sẽ tìm các giá trị bình phương nhỏ hơn 100. 
        Ví dụ 1,4,9,16,25,36,49,64,81,100.
        duyệt qua các số này bằng thủ tục đệ quy.
        có một mảng đề lưu các số đã chọn
        Khi duyệt qua các giá trị thì bỏ các giá trị đã chọn trong mảng.
        Nếu mảng ấy có giá trị bằng N = 100. thì ghi nhận.
        Nếu vượt quá thì bỏ. 
        Lặp lại tất cả tổ hợp để thu được kết quả
    ";
    $response = [];

    foreach($data as &$value) {
        $value .= "\n";
    }
    array_push($response,$data);
    array_push($response,$explaint);
    return $response;
}