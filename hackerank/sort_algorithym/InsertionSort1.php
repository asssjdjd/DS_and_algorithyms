<?php
    // check the array sorted 
    function checkSort($n, $arr): int {
        for($i = 0; $i < $n - 1; $i++) {
            if($arr[$i] > $arr[$i + 1]) {
                return -1;
            }
        }
        return 1;
    }

    // print array
    function printArray($n, $arr) {
        for($i = 0; $i < $n; $i++) {
            print($arr[$i] . " ");
        }
        print("\n");
    }

    function insertionSort1($n, $arr) {

        for($i = $n - 1; $i >= 0; $i--) {
            // if array is sorted; break the loop
            if(checkSort($n, $arr) === 1) {
                printArray($n, $arr);
                break;
            }

            // store current value 
            $tmp = $arr[$i];
            $j = $i;
            while($j > 0 && $arr[$j] < $arr[$j - 1]) {
                $arr[$j] = $arr[$j-1];
                printArray($n, $arr);
                $j--;
            }

            // replace 
            $arr[$j] = $tmp;
        }
    }


    $a = [2,4,6,1,3];
    $n = 5;
    insertionSort1($n,$a);

?>