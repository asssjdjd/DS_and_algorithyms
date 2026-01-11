<?php
require_once __DIR__ . '/../impl/process_algorithym/HandleBigSorting.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleCountingSort.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleInsertionSort1.php';

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
            default:
                return null;
        }
    }
}