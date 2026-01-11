<?php

function handleQuickSort2DataRequest($data) {
    $numbers = $data["data"][0]["data"];
    $arr = explode(" ", $numbers);
    return $arr;
}
