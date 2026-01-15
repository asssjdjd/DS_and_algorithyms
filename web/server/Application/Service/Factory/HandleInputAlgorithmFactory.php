<?php
namespace App\Application\Service\Factory;

use App\Application\Service\Impl\ProcessAlgorithm\HandleBigSorting;
use App\Application\Service\Impl\ProcessAlgorithm\HandleCountingSort;
use App\Application\Service\Impl\ProcessAlgorithm\HandleInsertionSort1;
use App\Application\Service\Impl\ProcessAlgorithm\HandleInsertionSort2;
use App\Application\Service\Impl\ProcessAlgorithm\HandleMiniumAbsoluteDiff;
use App\Application\Service\Impl\ProcessAlgorithm\HandleQuickSort1;
use App\Application\Service\Impl\ProcessAlgorithm\HandleQuickSort2;
use App\Application\Service\Impl\ProcessAlgorithm\HandleSearchMissingNumber;
use App\Application\Service\Impl\ProcessAlgorithm\HandleSearchUsingDictionary;
use App\Application\Service\Impl\ProcessAlgorithm\HandleThePowerSum;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleInputAlgorithmFactory {
    public static function create($name): ?HandleInputAlgorithmDataInterface
    {
        switch ($name) {
            case 'big_sorting':
                return new HandleBigSorting();
            case 'counting_sort':
                return new HandleCountingSort();
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