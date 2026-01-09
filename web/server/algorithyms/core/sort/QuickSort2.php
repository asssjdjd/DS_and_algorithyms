<?php

$explant_data = [];

function storeArray($n, $arr) {
   global $explant_data;
   array_push($explant_data, $arr);
}

function quickSort($arr)
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

    $sortedLeft = quickSort($left);
    $sortedRight = quickSort($right);

    $result = array_merge($sortedLeft, [$pivot], $sortedRight);

    $n = count($result);
    storeArray($n,$result);
    return $result;
}


// function test() {
//     $a = [5,8,1,3,7,9,2];
//     quickSort($a);

//     global $explant_data;
//     for($i = 0; $i < count($explant_data); $i++) {
//         var_dump($explant_data[$i]);
//     }
// }

// test();