<?php

namespace App\Application\DataTranfer\Request;
class HandleQuickSort1Request
{
    public static function handleQuickSort1DataRequest($data)
    {
        $numbers = $data["data"][0]["data"];
        $arr = explode(" ", $numbers);
        return $arr;
    }
}
