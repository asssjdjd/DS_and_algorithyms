<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleQuickSort1Request;
use App\Application\DataTranfer\Response\HandleQuickSort1Response;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleQuickSort1 implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleQuickSort1Request::handleQuickSort1DataRequest($data);
        $sorted = SortAlgorithm::quickSort1($arr);
        $response = HandleQuickSort1Response::handleInputQuickSort1Response($sorted);
        return $response;
    }
}