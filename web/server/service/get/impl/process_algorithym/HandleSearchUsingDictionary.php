
<?php
require_once __DIR__ . '/../../interface/HandleInputAlgorithmData.php';
require_once __DIR__ . '/../../../../middleware/request/HandleSearchUsingDictionaryRequest.php';
require_once __DIR__ . '/../../../../algorithyms/core/search/SearchUsingDictionary.php';
require_once __DIR__ . '/../../../../middleware/response/HandleSearchUsingDictionaryResponse.php';
class HandleSearchUsingDictionary implements HandleInputAlgorithmDataInterface {
    public function handleInputDataAlgorithm($data) : array {
        $arr = handleSearchUsingDictionaryDataRequest($data);
        $sorted = icecreamParlor($arr[0],$arr[1]);
        $response = handleSearchUsingDictionaryResponse($sorted);
        return $response;
    }
}