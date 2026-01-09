<?php
require_once __DIR__ . '/../impl/get_introduce_data/BigSorting.php';

class GetIntroduceDataFactory
{
    public static function create($id): ?GetIntroduceDataAlgorithymInterface
    {
        switch ($id) {
            case 'big_sorting':
                return new BigSorting();
            default:
                return null;
        }
    }
}