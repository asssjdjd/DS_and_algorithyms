<?php

namespace App\Application\DataTranfer\Request;
class HandleMinimumAbsoluteDiffRequest
{
    public static function handleMinimumAbsoluteDiffDataRequest($data)
    {
        $numbers = $data["data"][0]["data"];
        $arr = explode(" ", $numbers);
        return $arr;
    }
}
