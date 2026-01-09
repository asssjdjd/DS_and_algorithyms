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

function test() {
    $a = [203,204,205, 206,207,208,203,204,205,206];
    $b = [203,204,204,205,206,207,205,208,203,206,205,206,204];
    $result = missingNumbers($a,$b);
    foreach($result as $val) {
        print($val . " ");
    }
}

test();