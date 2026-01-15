<?php
namespace App\Application\Service\Factory; // Namespace này khớp với đường dẫn thư mục

use App\Application\Service\Interface\GetIntroduceDataAlgorithymInterface;
use App\Application\Service\Impl\GetIntroduceData\BigSorting;
use App\Application\Service\Impl\GetIntroduceData\CountingSort;
use App\Application\Service\Impl\GetIntroduceData\InsertionSort1;
use App\Application\Service\Impl\GetIntroduceData\InsertionSort2;
use App\Application\Service\Impl\GetIntroduceData\MinimumAbsoluteDiff;
use App\Application\Service\Impl\GetIntroduceData\QuickSort1;
use App\Application\Service\Impl\GetIntroduceData\QuickSort2;
use App\Application\Service\Impl\GetIntroduceData\SearchMissingNumber;
use App\Application\Service\Impl\GetIntroduceData\SearchUsingDictionary;
use App\Application\Service\Impl\GetIntroduceData\ThePowerSum;

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
            case 'minimum_absolute_diff' :
                return new MinimumAbsoluteDiff();
            case 'the_power_sum' :
                return new ThePowerSum();
            default:
                return null;
        }
    }
}