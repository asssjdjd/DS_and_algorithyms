<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleCountingSortRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/CountingSort.php';
require_once __DIR__ . '/../../../../middleware/response/HandleCountingSortResponse.php';
class HandleCountingSorting implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = hanldeCountingSortDataRequest($data);
        $explaintData = [];
        $sorted = countingSort($arr,$explaintData);
        $response = handleInputCountingSortResponse($sorted);
        return $response;
    }
}