<?php 

function countingSort($arr) {
    $max = max($arr);

    // initial frequence array
    $fre = [];
    for($i = 0; $i <= $max; $i++) {
        $fre[$i] = 0;
    }

    // update frequence value 
    foreach($arr as $value) {
        $fre[$value] += 1;
    }

    $result = [];

    for($i = 0; $i <= $max; $i++) {
        if($fre[$i] != 0) {
            for($j = 0; $j < $fre[$i]; $j++) {
               array_push($result,$i);
            }
        }
    }

    return $result;

    // for($i = 0; $i <= $max; $i++) {
    //    print($fre[$i] . " ");
    // }
    
}

$a = [1,3,4,5,6,1,5,3,6];

countingSort($a);