<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleInsertionSort2Request.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/InsertionSort2.php';
require_once __DIR__ . '/../../../../middleware/response/HandleInsertionSort2Response.php';
class HandleInsertionSort2 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = hanldeInsertionSort2DataRequest($data);
        $explaintData = [];
        $sorted = insertionSort2($arr[0],$arr[1],$explaintData);
        $response = handleInsertionSort2Response($sorted);
        return $response;
    }
}