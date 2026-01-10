<?php 

function handleInputCountingSortResponse ($data) {
    // $data[0]: Mảng số đã sắp xếp
    // $data[1]: Có thể là String hoặc Array (do logic countingSort trả về)

    $explaintText = "
        Thuật toán được sắp xếp dựa trên tần suất.
        Nó chọn ra từ lớn nhất về đếm tần suất từ 0 -> max.
    ";

    // Xử lý chuẩn hóa data[1]
    $rawExplaint = "";
    if (isset($data[1])) {
        if (is_array($data[1])) {
            // Nếu là mảng, lấy phần tử đầu tiên hoặc nối lại
            $rawExplaint = implode("\n", $data[1]);
        } else {
            $rawExplaint = $data[1];
        }
    }

    // Logic tách dòng cũ của bạn
    if (!empty($rawExplaint)) {
        $lines = preg_split('/\r\n|\r|\n/', $rawExplaint);
        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            if (!empty($trimmedLine)) {
                $explaintText .= "\n        " . $trimmedLine; 
            }
        }
    }

    return [$data[0], $explaintText];
}