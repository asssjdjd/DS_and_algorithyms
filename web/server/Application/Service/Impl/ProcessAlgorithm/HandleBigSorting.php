<?php
namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Sort\SortAlgorithm;
use App\Application\DataTranfer\Request\HandleBigSortingRequest;
use App\Application\DataTranfer\Response\HandleBigSortingResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleBigSorting implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr =  HandleBigSortingRequest::hanldeBigSortingDataRequest($data);;
        $sorted = SortAlgorithm::bigSorting($arr);
        $response = HandleBigSortingResponse::handleInputBigSortingResponse($sorted);
        return $response;
    }
}