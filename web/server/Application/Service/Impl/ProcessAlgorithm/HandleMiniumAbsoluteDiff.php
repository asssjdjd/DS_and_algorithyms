<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Greedy\GreedyAlgorithm;
use App\Application\DataTranfer\Request\HandleMinimumAbsoluteDiffRequest;
use App\Application\DataTranfer\Response\HandleMinimumAbsoluteDiffResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleMiniumAbsoluteDiff implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleMinimumAbsoluteDiffRequest::handleMinimumAbsoluteDiffDataRequest($data);
        $sorted = GreedyAlgorithm::minimumAbsoluteDifference($arr);
        $response = HandleMinimumAbsoluteDiffResponse::handleMinimumAbsoluteDiffResponse($sorted);
        return $response;
    }
}