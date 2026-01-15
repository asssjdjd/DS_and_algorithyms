<?php

namespace App\Application\Core\Sort;

class SortAlgorithm
{
    public static function bigSorting($unsorted)
    {
        // Write your code here
        usort($unsorted, [self::class, 'conditionSort']);
        return $unsorted;
    }

    public static function countingSort($arr, &$explaint)
    {
        if (empty($arr)) {
            return [[], []];
        }

        $max = max($arr);

        // Khởi tạo mảng tần suất
        $fre = array_fill(0, $max + 1, 0);

        // Cập nhật tần suất
        foreach ($arr as $value) {
            $fre[$value]++;
        }

        $result = [];
        // Tái tạo mảng đã sắp xếp
        for ($i = 0; $i <= $max; $i++) {
            if ($fre[$i] > 0) {
                for ($j = 0; $j < $fre[$i]; $j++) {
                    $result[] = $i; // Cú pháp ngắn gọn hơn array_push
                }
            }
        }

        $res = "Bảng tần suất (Value: Count): \n";
        for ($i = 0; $i <= $max; $i++) {

            $res .= "[{$i}: {$fre[$i]}]\n";
        }

        $explaint = [$res];

        return [$result, $explaint];
    }

    public static function insertionSort1($n, $arr, $explaint)
    {
        if (empty($arr)) {
            return [[], []];
        }
        $res = "Danh sách của mảng đã dịch chuyển \n";
        $explaint[] = $res;
        self::storeArray($arr, $explaint);

        for ($i = $n - 1; $i >= 0; $i--) {
            // if array is sorted; break the loop
            if (self::checkSort($n, $arr) === 1) {
                self::storeArray($arr, $explaint);
                break;
            }

            // store current value 
            $tmp = $arr[$i];
            $j = $i;
            while ($j > 0 && $arr[$j] < $arr[$j - 1]) {
                $arr[$j] = $arr[$j - 1];
                self::storeArray($arr, $explaint);
                $j--;
            }

            // replace 
            $arr[$j] = $tmp;
        }
        self::storeArray($arr, $explaint);

        return [$arr, $explaint];
    }

    public static function insertionSort2($n, $arr, &$explaint)
    {
        if (empty($arr)) {
            return [[], []];
        }
        $res = "Danh sách của mảng đã dịch chuyển \n";
        $explaint[] = $res;
        self::storeArray($arr, $explaint);
        // loop n - 1 cycle
        for ($i = 1; $i < $n; $i++) {
            self::insertion_Sort1($i + 1, $arr);
            self::storeArray($arr, $explaint);
        }
        return [$arr, $explaint];
    }

    public static function quickSort1($arr)
    {
        // Ép kiểu số cho các phần tử
        $arr = array_map('intval', $arr);

        $pivot = $arr[0];
        $left = [];
        $right = [];
        $equal = [];

        $length = count($arr);
        for ($i = 0; $i < $length; $i++) {
            if ($arr[$i] > $pivot) {
                array_push($right, $arr[$i]);
            } else if ($arr[$i] < $pivot) {
                array_push($left, $arr[$i]);
            } else {
                array_push($equal, $arr[$i]);
            }
        }

        $result = [];
        $result = array_merge($result, $left);
        $result = array_merge($result, $equal);
        $result = array_merge($result, $right);

        return $result;
    }

    public static function quickSort_2($arr, $explaint)
    {

        if (empty($arr)) {
            return [[], []];
        }

        $res = "Danh sách của mảng sau khi thực hiện thuật toán QuickSort \n";
        $explaint[] = $res;
        self::storeArrayQuickSort2($arr, $explaint);

        $arr = self::quickSort2($arr, $explaint);
        return [$arr, $explaint];
    }

    // Các hàm hỗ trợ 
    private static function storeArrayQuickSort2($arr, &$explaint)
    {

        if (!empty($arr)) {
            $explaint[] = implode(" ", $arr);
        }
    }
    private static function quickSort2($arr, &$explaint)
    {
        if (count($arr) <= 1) return $arr;

        $pivot = $arr[0];
        $left = [];
        $right = [];
        $equal = [];

        $length = count($arr);

        for ($i = 0; $i < $length; $i++) {
            if ($arr[$i] > $pivot) {
                array_push($right, $arr[$i]);
            } else if ($arr[$i] < $pivot) {
                array_push($left, $arr[$i]);
            } else {
                array_push($equal, $arr[$i]);
            }
        }

        $sortedLeft = self::quickSort2($left, $explaint);
        $sortedRight = self::quickSort2($right, $explaint);

        $result = array_merge($sortedLeft, $equal, $sortedRight);

        self::storeArrayQuickSort2($result, $explaint);
        return $result;
    }


    private static function insertion_Sort1($n, &$arr)
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

    private static function storeArray($arr, &$explaint)
    {
        // Chuyển mảng thành chuỗi, ví dụ: [1, 2, 3] thành "1 2 3"
        $arrayString = implode(" ", $arr);

        // Thêm chuỗi vào mảng giải thích
        $explaint[] = $arrayString;
    }

    private static function checkSort($n, $arr): int
    {
        for ($i = 0; $i < $n - 1; $i++) {
            if ($arr[$i] > $arr[$i + 1]) {
                return -1;
            }
        }
        return 1;
    }

    private static function conditionSort($a, $b): int
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
}
