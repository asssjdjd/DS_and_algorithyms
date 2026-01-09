<?php
$a = [-59, -36, -13, 1, -53, -92, -2, -96, -54, 75];

function minimumAbsoluteDifference($arr)
{
    // Write your code here
    sort($arr);
    $min = PHP_INT_MAX;
    for ($i = 1; $i < count($arr); $i++) {
        $dif = abs($arr[$i] - $arr[$i - 1]);
        if ($dif < $min) $min = $dif;
    }
    return $min;
}

print(minimumAbsoluteDifference($a));
