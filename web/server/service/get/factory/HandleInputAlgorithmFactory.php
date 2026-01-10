<?php
require_once __DIR__ . '/../impl/process_algorithym/HandleBigSorting.php';
require_once __DIR__ . '/../impl/process_algorithym/HandleCountingSort.php';

class HandleInputAlgorithmFactory {
    public static function create($name): ?HandleInputAlgorithmDataInterface
    {
        switch ($name) {
            case 'big_sorting':
                return new HandleBigSorting();
            case 'counting_sort':
                return new HandleCountingSorting();
            default:
                return null;
        }
    }
}