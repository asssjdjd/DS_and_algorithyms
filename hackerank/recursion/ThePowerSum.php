<?php
function getArray($a, $n)
{
    $j = pow($a, (1 / $n));
    $index = [];

    for ($i = 1; $i <= $j; $i++) {
        array_push($index, pow($i, $n));
    }
    return $index;
}

function recursion($N, $sum, $result, $startIndex,$path, &$data)
{
    $length = count($result);
    for ($i = $startIndex; $i < $length; $i++) {
        $nextSum = $sum + $result[$i];
        $currentVal = $result[$i];
        if ($nextSum > $N) break;

         $newPath = ($path === "") ? (string)$currentVal : $path . "," . $currentVal;
        if ($nextSum == $N) {
           $data[] = $newPath;
        } else {
            recursion($N, $nextSum, $result, $i + 1, $newPath, $data);
        }
    }
}

function powerSum($X, $N)
{
    $result = getArray($X, $N);
    $data = [];
    $path = "";
    $sum = 0;
    $startIndex = 0;
    recursion($X, $sum, $result, $startIndex,$path, $data);
    // foreach($data as $value) {
    //     print($value);
    //     print("\n");
    // }
    return count($data);
}

function test()
{
    $a = 100;
    $n = 2;
    powerSum($a, $n);
}

test();
