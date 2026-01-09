<?php


function insertionSort1($n, &$arr)
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

function printArray($n, $arr): void
{
    for ($i = 0; $i < $n; $i++) {
        print($arr[$i] . " ");
    }
    print("\n");
}

// full sort
function insertionSort2($n, $arr)
{
    // loop n - 1 cycle
    for ($i = 1; $i < $n; $i++) {
        insertionSort1($i + 1, $arr);
        printArray($n, $arr);
    }
}

$n = 7;
$arr = [3, 4, 7, 5, 6, 2, 1];
insertionSort2($n, $arr);

// 3 4 7 5 6 2 1
// 3 4 7 5 6 2 1
// 3 4 5 7 6 2 1
// 3 4 5 6 7 2 1
// 2 3 4 5 6 7 1
// 1 2 3 4 5 6 7