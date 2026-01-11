<?php
require_once __DIR__ . '/../impl/process_algorithym/HandleBigSorting.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleCountingSort.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleInsertionSort1.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleInsertionSort2.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleQuickSort1.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleQuickSort2.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleSearchUsingDictionary.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleSearchMissingNumber.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleMiniumAbsoluteDiff.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleThePowerSum.php';


class HandleInputAlgorithmFactory {
    public static function create($name): ?HandleInputAlgorithmDataInterface
    {
        switch ($name) {
            case 'big_sorting':
                return new HandleBigSorting();
            case 'counting_sort':
                return new HandleCountingSorting();
            case 'insertion_sort1':
                return new HandleInsertionSort1();
            case 'insertion_sort2' :
                return new HandleInsertionSort2();
            case 'quick_sort1' :
                return new HandleQuickSort1();
            case 'quick_sort2' :
                 return new HandleQuickSort2();
            case 'search_using_dictionary' :
                return new HandleSearchUsingDictionary();
            case 'search_missing_number' : 
                return new HandleSearchMissingNumber();
            case 'minimum_absolute_diff' :
                return new HandleMiniumAbsoluteDiff();
            case 'the_power_sum' :
                return new HandleThePowerSum();
            default:
                return null;
        }
    }
}