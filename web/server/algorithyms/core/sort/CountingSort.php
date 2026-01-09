<?php 

$explant_data = [];
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
    global $explant_data;
    for($i = 0; $i <= $max; $i++) {
        array_push($explant_data, $fre[$i]);
        if($fre[$i] != 0) {
            for($j = 0; $j < $fre[$i]; $j++) {
               array_push($result,$i);
            }
        }
    }
    return $result;
}


function test() {
    $a = [1,3,4,5,6,1,5,3,6];
    countingSort($a);

    global $explant_data;
    foreach($explant_data as $value) {
        print($value);
    }
}

// test();