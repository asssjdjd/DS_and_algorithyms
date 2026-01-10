<?php 
function hanldeCountingSortDataRequest($data) {
    $numbers = $data["data"][0]["data"];
    $arr = explode(" ", $numbers);
    return $arr;
}