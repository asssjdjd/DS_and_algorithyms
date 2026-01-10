<?php 

function countingSort($arr, &$explaint) {
    if (empty($arr)) {
        return [[], []];
    }

    $max = max($arr);

    // Khởi tạo mảng tần suất
    $fre = array_fill(0, $max + 1, 0);

    // Cập nhật tần suất
    foreach($arr as $value) {
        $fre[$value]++;
    }

    $result = [];
    // Tái tạo mảng đã sắp xếp
    for($i = 0; $i <= $max; $i++) {
        if($fre[$i] > 0) {
            for($j = 0; $j < $fre[$i]; $j++) {
               $result[] = $i; // Cú pháp ngắn gọn hơn array_push
            }
        }
    }

    $res = "Bảng tần suất (Value: Count): \n";
    for($i = 0; $i <= $max; $i++) {
    
        $res .= "[{$i}: {$fre[$i]}]\n"; 
    }
    
    
    $explaint = [$res];

    return [$result, $explaint];
}