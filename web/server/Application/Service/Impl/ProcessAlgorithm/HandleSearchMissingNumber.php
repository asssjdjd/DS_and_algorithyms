<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Search\SearchAlgorithm;
use App\Application\DataTranfer\Request\HandleSearchMissingNumberRequest;
use App\Application\DataTranfer\Response\HandleSearchMissingNumberResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleSearchMissingNumber implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleSearchMissingNumberRequest::handleSearchMissingNumberRequest($data);
        $sorted = SearchAlgorithm::missingNumbers($arr[0], $arr[1]);
        $response = HandleSearchMissingNumberResponse::handleSearchMissingNumberResponse($sorted);
        return $response;
    }
}