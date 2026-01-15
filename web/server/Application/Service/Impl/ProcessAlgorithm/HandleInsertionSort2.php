<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleInsertionSort2Request;
use App\Application\DataTranfer\Response\HandleInsertionSort2Response;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleInsertionSort2 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleInsertionSort2Request::hanldeInsertionSort2DataRequest($data);
        $explaintData = [];
        $sorted = SortAlgorithm::insertionSort2($arr[0], $arr[1], $explaintData);
        $response = HandleInsertionSort2Response::handleInsertionSort2Response($sorted);
        return $response;
    }
}