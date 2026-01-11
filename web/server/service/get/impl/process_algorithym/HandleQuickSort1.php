<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleQuickSort1Request.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/QuickSort1.php';
require_once __DIR__ . '/../../../../middleware/response/HandleQuickSort1Response.php';

class HandleQuickSort1 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleQuickSort1DataRequest($data);
        $sorted = quickSort1($arr);
        $response = handleInputQuickSort1Response($sorted);
        return $response;
    }
}