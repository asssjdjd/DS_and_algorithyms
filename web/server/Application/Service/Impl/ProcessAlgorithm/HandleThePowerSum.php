<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Recursion\RecursionAlgorithm;
use App\Application\DataTranfer\Request\HandleThePowerSumRequest;
use App\Application\DataTranfer\Response\HandleThePowerSumResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleThePowerSum implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleThePowerSumRequest::handleThePowerSumRequest($data);
        $sorted = RecursionAlgorithm::powerSum($arr[0], $arr[1]);
        $response = HandleThePowerSumResponse::handleThePowerSumResponse($sorted);
        return $response;
    }
}