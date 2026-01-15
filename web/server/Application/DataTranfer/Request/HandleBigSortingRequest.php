<?php
namespace App\Application\DataTranfer\Request;
class HandleBigSortingRequest {
        public static function hanldeBigSortingDataRequest($data) {
        $numbers = $data["data"][0]["data"];
        $arr = explode(" ", $numbers);
        return $arr;
    }
}
