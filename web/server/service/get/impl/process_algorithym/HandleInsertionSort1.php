<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleInsertionSort1Request.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/InsertionSort1.php';
require_once __DIR__ . '/../../../../middleware/response/HandleInsertionSort1Response.php';
class HandleInsertionSort1 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = hanldeInsertionSort1DataRequest($data);
        $explaintData = [];
        $sorted = insertionSort1($arr[0],$arr[1],$explaintData);
        $response = handleInsertionSort1Response($sorted);
        return $response;
    }
}