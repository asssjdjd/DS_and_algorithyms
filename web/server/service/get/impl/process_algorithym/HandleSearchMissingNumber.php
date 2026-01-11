<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleSearchMissingNumberRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/search/SearchMissingNumber.php';
require_once __DIR__ . '/../../../../middleware/response/HandleSearchMissingNumber.php';

class HandleSearchMissingNumber implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleSearchMissingNumberRequest($data);
        $sorted = missingNumbers($arr[0],$arr[1]);
        $response = handleSearchMissingNumberResponse($sorted);
        return $response;
    }
}