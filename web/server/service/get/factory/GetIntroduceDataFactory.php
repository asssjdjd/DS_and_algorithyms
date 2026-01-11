<?php
require_once __DIR__ . '/../impl/get_introduce_data/BigSorting.php';
require_once __DIR__ . '/../impl/get_introduce_data/CountingSort.php';
require_once __DIR__ . '/../impl/get_introduce_data/InsertionSort1.php';
require_once __DIR__ . '/../impl/get_introduce_data/InsertionSort2.php';
require_once __DIR__ . '/../impl/get_introduce_data/QuickSort1.php';
require_once __DIR__ . '/../impl/get_introduce_data/QuickSort2.php';
require_once __DIR__ . '/../impl/get_introduce_data/SearchUsingDictionary.php';
require_once __DIR__ . '/../impl/get_introduce_data/SearchMissingNumber.php';

class GetIntroduceDataFactory
{
    public static function create($id): ?GetIntroduceDataAlgorithymInterface
    {
        switch ($id) {
            case 'big_sorting':
                return new BigSorting();
            case 'counting_sort':
                return new CountingSort();
            case 'insertion_sort1' :
                return new InsertionSort1();
            case 'insertion_sort2':
                return new InsertionSort2();
            case 'quick_sort1' :
                return new QuickSort1();
            case 'quick_sort2' :
                return new QuickSort2();
            case 'search_using_dictionary' :
                return new SearchUsingDictionary();
            case 'search_missing_number' : 
                return new SearchMissingNumber();
            default:
                return null;
        }
    }
}