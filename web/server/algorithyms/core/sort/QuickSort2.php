<?php
function storeArrayQuickSort2($arr, &$explaint) {
       
        if (!empty($arr)) {
            $explaint[] = implode(" ", $arr);
        }
    }
function quickSort2($arr,&$explaint)
{
    
    

    if(count($arr) <= 1) return $arr;

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

    $sortedLeft = quickSort2($left, $explaint);
    $sortedRight = quickSort2($right, $explaint);

    $result = array_merge($sortedLeft, $equal, $sortedRight);

    storeArrayQuickSort2($result,$explaint);
    return $result;
}

function quickSort_2 ($arr, $explaint) {

    if (empty($arr)) {
        return [[], []];
    }
    
    $res = "Danh sách của mảng sau khi thực hiện thuật toán QuickSort \n";
    $explaint[] = $res;
    storeArrayQuickSort2($arr,$explaint);

    $arr = quickSort2($arr,$explaint);
    return [$arr,$explaint];
}
