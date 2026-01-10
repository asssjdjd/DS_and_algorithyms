<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleBigSortingRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/sort/BigSorting.php';
require_once __DIR__ . '/../../../../middleware/response/HandleBigSortingResponse.php';
class HandleBigSorting implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = hanldeBigSortingDataRequest($data);
        $sorted = bigSorting($arr);
        $response = handleInputBigSortingResponse($sorted);
        return $response;
    }
}