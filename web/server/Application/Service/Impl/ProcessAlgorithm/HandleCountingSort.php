<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleCountingSortRequest;
use App\Application\DataTranfer\Response\HandleCountingSortResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleCountingSort implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleCountingSortRequest::hanldeCountingSortDataRequest($data);
        $explaintData = [];
        $sorted = SortAlgorithm::countingSort($arr, $explaintData);
        $response = HandleCountingSortResponse::handleInputCountingSortResponse($sorted);
        return $response;
    }
}