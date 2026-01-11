<?php
function quickSort1($arr)
{
    // Ép kiểu số cho các phần tử
    $arr = array_map('intval', $arr);
    
    $pivot = $arr[0];
    $left = [];
    $right = [];
    $equal = [];

    $length = count($arr);
    for ($i = 0; $i < $length; $i++) {
        if ($arr[$i] > $pivot) {
            array_push($right, $arr[$i]);
        } else if ($arr[$i] < $pivot) {
            array_push($left, $arr[$i]);
        } else {
            array_push($equal, $arr[$i]);
        }
    }

    $result = [];
    $result = array_merge($result, $left);
    $result = array_merge($result, $equal);
    $result = array_merge($result, $right);

    return $result;
}

// var_dump(quickSort1([5,4,2,6,7,8]));

?>