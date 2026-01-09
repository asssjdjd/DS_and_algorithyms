<?php 

function missingNumbers($arr, $brr) {
    // Write your code here
    $countA = [];
    $countB = [];

    foreach($arr as $value) {
        $countA[$value] = ($countA[$value] ?? 0) + 1;
    }

    foreach($brr as $value) {
         $countB[$value] = ($countB[$value] ?? 0) + 1;
    }

    $result = [];
    foreach($countB as $key => $fre) {
        if(($countA[$key] ?? 0) < $fre) {
            array_push($result,$key);
        }
    }
    sort($result);
    return $result;
}

