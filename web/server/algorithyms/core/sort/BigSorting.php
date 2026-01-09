<?php
// Hàm sort theo chuỗi số => chuỗi to ví dụ trên 50 ký tự vẫn sort được thay vì tràn bộ nhớ
function conditionSort($a, $b): int
{
    // elimilates '0' in the front of strings
    $a = ltrim($a, '0');
    $b = ltrim($b, '0');

    // the length of strings
    $lenA = strlen($a);
    $lenB = strlen($b);

    // check the length of strings
    if ($lenA > $lenB) return 1;
    else if ($lenA < $lenB) return -1;
    else {

        // if strings is same length 
        if ($a > $b) return 1;
        else if ($a < $b) return -1;
        else return 0;
    }
}

function bigSorting($unsorted)
{
    // Write your code here
    usort($unsorted, 'conditionSort');
    return $unsorted;
}

?>
