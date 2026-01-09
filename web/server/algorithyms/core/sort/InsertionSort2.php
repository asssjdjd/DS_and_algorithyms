<?php 

$explant_data = [];

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

function storeArray($n, $arr): void
{
    // for ($i = 0; $i < $n; $i++) {
    //     print($arr[$i] . " ");
    // }
    // print("\n");

    global $explant_data;
    array_push($explant_data,$arr);
}

function insertionSort2($n, $arr)
{
    // loop n - 1 cycle
    for ($i = 1; $i < $n; $i++) {
        insertionSort1($i + 1, $arr);
        storeArray($n, $arr);
    }
    global $explant_data;
    return $explant_data;
}

// $n = 7;
// $arr = [3, 4, 7, 5, 6, 2, 1];
// insertionSort2($n, $arr);

// var_dump(insertionSort2($n,$arr));

?>