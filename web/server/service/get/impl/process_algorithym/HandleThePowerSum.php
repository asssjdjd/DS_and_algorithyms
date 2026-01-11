<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleThePowerSumRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/recursion/ThePowerSum.php';
require_once __DIR__ . '/../../../../middleware/response/HandleThePowerSumResponse.php';

class HandleThePowerSum implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleThePowerSumRequest($data);
        $sorted = powerSum($arr[0],$arr[1]);
        $response = handleThePowerSumResponse($sorted);
        return $response;
    }
}