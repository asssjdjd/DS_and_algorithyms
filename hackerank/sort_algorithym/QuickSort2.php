<?php

function printArray($n, $arr) {
    for($i = 0; $i < $n; $i++) {
        print($arr[$i] . " ");
    }
    print("\n");
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
    printArray($n,$result);
    return $result;
}

$a = [5,8,1,3,7,9,2];

quickSort($a);