<?php
namespace App\Application\Core\Recursion;

class RecursionAlgorithm {

    private static function getArray($a, $n)
    {
        $j = pow($a, (1 / $n));
        $index = [];

        for ($i = 1; $i <= $j; $i++) {
            array_push($index, pow($i, $n));
        }
        return $index;
    }

    private static function recursion($N, $sum, $result, $startIndex,$path, &$data)
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

    public static function powerSum($X, $N)
    {
        $result = self::getArray($X, $N);
        $data = [];
        $path = "";
        $sum = 0;
        $startIndex = 0;
        self::recursion($X, $sum, $result, $startIndex,$path, $data);
        return $data;
    }

}






