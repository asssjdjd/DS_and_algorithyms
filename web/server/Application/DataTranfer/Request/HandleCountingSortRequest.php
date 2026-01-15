<?php

namespace App\Application\DataTranfer\Request;

class HandleCountingSortRequest
{
    public static function hanldeCountingSortDataRequest($data)
    {
        $numbers = $data["data"][0]["data"];
        $arr = explode(" ", $numbers);
        return $arr;
    }
}
