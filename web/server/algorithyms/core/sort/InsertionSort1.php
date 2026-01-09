<?php
// data
$explant_data = [];
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
function storeArray($arr)
{
  global $explant_data;
  array_push($explant_data,$arr);  
}

function insertionSort1($n, $arr)
{
    for ($i = $n - 1; $i >= 0; $i--) {
        // if array is sorted; break the loop
        if (checkSort($n, $arr) === 1) {
            storeArray($arr);
            break;
        }

        // store current value 
        $tmp = $arr[$i];
        $j = $i;
        while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
            $arr[$j] = $arr[$j - 1];
            storeArray($arr);
            $j--;
        }

        // replace 
        $arr[$j] = $tmp;
    }

    global $explant_data;
    return $explant_data;
}

// 

function check($storeArray) {
    for($i = 0; $i < count($storeArray); $i++) {
        var_dump($storeArray[$i]);
    }
}

// insertionSort1(5,[1,4,6,8,3]);
// check($explant_data);