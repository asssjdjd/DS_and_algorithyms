<?php

function handleMinimumAbsoluteDiffDataRequest($data) {
    $numbers = $data["data"][0]["data"];
    $arr = explode(" ", $numbers);
    return $arr;
}
