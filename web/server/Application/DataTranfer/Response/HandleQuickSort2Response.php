<?php
namespace App\Application\DataTranfer\Response;
class HandleQuickSort2Response
{
    public static function handleInputQuickSort2Response($data)
    {
        // $data[0]: Mảng số đã sắp xếp
        // $data[1]: Có thể là String hoặc Array 
        $explaintText = "
        Thuật toán dựa trên việc lựa chọn pivot.
        Pivot thường là vị trí đầu, giữa hoặc cuối mảng.
        Ở đây chọn pivot ở đầu mảng arr[0].
        có 3 mảng left = [] : các giá trị nhỏ hơn pivot
        mid = [] : các giá trị bằng pivot
        right = [] : các giá trị lớn hơn pivot.
        Lặp lại cho đến khi mảng chỉ còn 1 phần tử.
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
}
