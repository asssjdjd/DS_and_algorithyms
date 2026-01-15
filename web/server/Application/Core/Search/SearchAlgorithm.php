<?php

namespace App\Application\Core\Search;

class SearchAlgorithm
{
    public static function missingNumbers($arr, $brr)
    {
        // Write your code here
        $countA = [];
        $countB = [];

        foreach ($arr as $value) {
            $countA[$value] = ($countA[$value] ?? 0) + 1;
        }

        foreach ($brr as $value) {
            $countB[$value] = ($countB[$value] ?? 0) + 1;
        }

        $result = [];
        foreach ($countB as $key => $fre) {
            if (($countA[$key] ?? 0) < $fre) {
                array_push($result, $key);
            }
        }
        sort($result);
        return $result;
    }

    public static function icecreamParlor($m, $arr)
    {
        // dictionary using search algorithym.
        $map = [];

        // create dictionary
        foreach ($arr as $i => $price) {
            $need = $m - $price;

            if (isset($map[$need])) {
                return [$map[$need] + 1, $i + 1];
            }

            $map[$price] = $i;
        }
        return [];
    }
}
