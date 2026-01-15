<?php

namespace App\Domain;

class AlgorithymEnum
{
    public static function getEnumAlgorithym(): array
    {
        return [
            ["group" => "sort", "id" => "big_sorting", "name" => "BigSorting"],
            ["group" => "sort", "id" => "counting_sort", "name" => "CountingSort"],
            ["group" => "sort", "id" => "insertion_sort1", "name" => "InsertionSort1"],
            ["group" => "sort", "id" => "insertion_sort2", "name" => "InsertionSort2"],
            ["group" => "sort", "id" => "quick_sort1", "name" => "QuickSort1"],
            ["group" => "sort", "id" => "quick_sort2", "name" => "QuickSort2"],
            ["group" => "search", "id" => "search_using_dictionary", "name" => "SearchUsingDictionary"],
            ["group" => "search", "id" => "search_missing_number", "name" => "SearchMissingNumber"],
            ["group" => "recursion", "id" => "the_power_sum", "name" => "ThePowerSum"],
            ["group" => "greedy", "id" => "minimum_absolute_diff", "name" => "Minimum_Absolute_Diff"],
        ];
    }

    public static function getAlgorithymNameById(string $id): ?string
    {
        foreach (self::getEnumAlgorithym() as $item) {
            if ($item['id'] === $id) {
                return $item['name'];
            }
        }
        return null;
    }
}