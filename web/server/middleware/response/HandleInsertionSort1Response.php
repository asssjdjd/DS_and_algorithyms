<?php 

function handleInsertionSort1Response ($data) {
    // $data[0]: Mảng số đã sắp xếp
    // $data[1]: Có thể là String hoặc Array 
    $explaintText = "
        VÀ THUẬT TOÁN CHỈ DUYỆT 1 LẦN. ĐỂ SẮP XẾP SỐ CUỐI.
        Thuật toán được sắp xếp dần dần.
        Bắt đầu từ ký tự cuối cung nếu tồn tại số trước lớn hơn thì đổi chỗ.
        Và dịch chuyển xuống các ký tự dưới
        Nếu tìm được số nhỏ hơn thì ghi nhập vào vị trí đó
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