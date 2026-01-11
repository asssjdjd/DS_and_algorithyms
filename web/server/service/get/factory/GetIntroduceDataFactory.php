<?php
require_once __DIR__ . '/../impl/get_introduce_data/BigSorting.php';
require_once __DIR__ . '/../impl/get_introduce_data/CountingSort.php';
require_once __DIR__ . '/../impl/get_introduce_data/InsertionSort1.php';
require_once __DIR__ . '/../impl/get_introduce_data/InsertionSort2.php';
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
            default:
                return null;
        }
    }
}