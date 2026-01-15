<?php
namespace App\Application\DataTranfer\Request;
class HandleQuickSort2Request
{
    public static function handleQuickSort2DataRequest($data)
    {
        $numbers = $data["data"][0]["data"];
        $arr = explode(" ", $numbers);
        return $arr;
    }
}
