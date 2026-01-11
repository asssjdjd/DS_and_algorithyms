<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleQuickSort2Request.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/QuickSort2.php';
require_once __DIR__ . '/../../../../middleware/response/HandleQuickSort2Response.php';
class HandleQuickSort2 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleQuickSort2DataRequest($data);
        $explaintData = [];
        $sorted = quickSort_2($arr,$explaintData);
        $response = handleInputQuickSort2Response($sorted);
        return $response;
    }
}