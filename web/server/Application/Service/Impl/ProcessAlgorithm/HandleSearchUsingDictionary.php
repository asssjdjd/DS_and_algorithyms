<?php

namespace App\Application\Service\Impl\ProcessAlgorithm;

use App\Application\Core\Search\SearchAlgorithm;
use App\Application\DataTranfer\Request\HandleSearchUsingDictionaryRequest;
use App\Application\DataTranfer\Response\HandleSearchUsingDictionaryResponse;
use App\Application\Service\Interface\HandleInputAlgorithmDataInterface;

class HandleSearchUsingDictionary implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data): array {
        $arr = HandleSearchUsingDictionaryRequest::handleSearchUsingDictionaryDataRequest($data);
        $sorted = SearchAlgorithm::icecreamParlor($arr[0], $arr[1]);
        $response = HandleSearchUsingDictionaryResponse::handleSearchUsingDictionaryResponse($sorted);
        return $response;
    }
}