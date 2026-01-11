<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleMinimumAbsoluteDiffRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/greedy/MinimumAbsoluteDiff.php';
require_once __DIR__ . '/../../../../middleware/response/HandleMinimumAbsoluteDiffResponse.php';

class HandleMiniumAbsoluteDiff implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleMinimumAbsoluteDiffDataRequest($data);
        $sorted = minimumAbsoluteDifference($arr);
        $response = handleMinimumAbsoluteDiffResponse($sorted);
        return $response;
    }
}