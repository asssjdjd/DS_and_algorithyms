<?php 

function insertion_Sort1($n, &$arr)
{
    for ($i = $n - 1; $i >= 0; $i--) {
        $tmp = $arr[$i];
        $j = $i;
        while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
            $arr[$j] = $arr[$j - 1];
            $j--;
        }
        if ($j >= 0) $arr[$j] = $tmp;
    }
}

// function storeArray($arr, &$explaint)
// {
//     // Chuyển mảng thành chuỗi, ví dụ: [1, 2, 3] thành "1 2 3"
//     $arrayString = implode(" ", $arr);
    
//     // Thêm chuỗi vào mảng giải thích
//     $explaint[] = $arrayString; 
// }

function insertionSort2($n, $arr, &$explaint)
{
     if (empty($arr)) {
        return [[], []];
    }
    $res = "Danh sách của mảng đã dịch chuyển \n";
    $explaint[] = $res;
    storeArray($arr,$explaint);
    // loop n - 1 cycle
    for ($i = 1; $i < $n; $i++) {
        insertion_Sort1($i + 1, $arr);
        storeArray($arr, $explaint);
    }
    return [$arr, $explaint];
}

// $n = 7;
// $arr = [3, 4, 7, 5, 6, 2, 1];
// insertionSort2($n, $arr);

// var_dump(insertionSort2($n,$arr));

?>