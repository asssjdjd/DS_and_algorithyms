<?php 
function handleThePowerSumRequest($data) {
    
    $n = intval($data["data"][0]["data"]);
    $x = intval($data["data"][1]["data"]);
    
    return [$n, $x];
}