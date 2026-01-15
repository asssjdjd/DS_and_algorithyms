<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleQuickSort2Request;
use App\Application\DataTranfer\Response\HandleQuickSort2Response;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleQuickSort2 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleQuickSort2Request::handleQuickSort2DataRequest($data);
        $explaintData = [];
        $sorted = SortAlgorithm::quickSort_2($arr, $explaintData);
        $response = HandleQuickSort2Response::handleInputQuickSort2Response($sorted);
        return $response;
    }
}