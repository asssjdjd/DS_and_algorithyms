<?php
// data
function checkSort($n, $arr): int
{
    for ($i = 0; $i < $n - 1; $i++) {
        if ($arr[$i] > $arr[$i + 1]) {
            return -1;
        }
    }
    return 1;
}

// store Array
function storeArray($arr, &$explaint)
{
    // Chuyển mảng thành chuỗi, ví dụ: [1, 2, 3] thành "1 2 3"
    $arrayString = implode(" ", $arr);
    
    // Thêm chuỗi vào mảng giải thích
    $explaint[] = $arrayString; 
}

function insertionSort1($n, $arr,$explaint)
{
    if (empty($arr)) {
        return [[], []];
    }
    $res = "Danh sách của mảng đã dịch chuyển \n";
    $explaint[] = $res;
    storeArray($arr,$explaint);

    for ($i = $n - 1; $i >= 0; $i--) {
        // if array is sorted; break the loop
        if (checkSort($n, $arr) === 1) {
            storeArray($arr,$explaint);
            break;
        }

        // store current value 
        $tmp = $arr[$i];
        $j = $i;
        while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
            $arr[$j] = $arr[$j - 1];
            storeArray($arr,$explaint);
            $j--;
        }

        // replace 
        $arr[$j] = $tmp;
    }
    storeArray($arr,$explaint);

    return [$arr, $explaint];
}

// 

// function check($storeArray) {
//     for($i = 0; $i < count($storeArray); $i++) {
//         var_dump($storeArray[$i]);
//     }
// }

// insertionSort1(5,[1,4,6,8,3]);
// check($explant_data);