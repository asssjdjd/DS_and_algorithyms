<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleInsertionSort1Request;
use App\Application\DataTranfer\Response\HandleInsertionSort1Response;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleInsertionSort1 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleInsertionSort1Request::hanldeInsertionSort1DataRequest($data);
        $explaintData = [];
        $sorted = SortAlgorithm::insertionSort1($arr[0], $arr[1], $explaintData);
        $response = HandleInsertionSort1Response::handleInsertionSort1Response($sorted);
        return $response;
    }
}