<?php 
// Config Header
header('Content-Type: application/json; charset=utf-8');
// config CORS
header('Access-Control-Allow-Origin: *');
// list algorithyms : Data
$algorithyms = [
    // group : sort algorithyms
    ["group" => "sort", "id" => "big_sorting", "name" => "BigSorting"],
    ["group" => "sort", "id" => "counting_sort", "name" => "CountingSort"],
    ["group" => "sort", "id" => "insertion_sort1", "name" => "InsertionSort1"],
    ["group" => "sort", "id" => "insertion_sort2", "name" => "InsertionSort2"],
    ["group" => "sort", "id" => "quick_sort1", "name" => "QuickSort1"],
    ["group" => "sort", "id" => "quick_sort2", "name" => "QuickSort2"],

    // group : search algorithyms 
    ["group" => "search", "id" => "search_using_dictionary", "name" => "SearchUsingDictionary"],
    ["group" => "search", "id" => "search_missing_number", "name" => "SearchMissingNumber"],


    // group : recursion
    ["group" => "recursion", "id" => "the_power_sum", "name" => "ThePowerSum"],

    // group : greedy
    ["group" => "greedy", "id" => "minimum_absolute_diff", "name" => "Minimum_Absolute_Diff"],
    
];

// Encode
echo json_encode($algorithyms);
exit;