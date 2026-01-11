<?php

function icecreamParlor($m, $arr)
{
    // dictionary using search algorithym.
    $map = [];

    // create dictionary
    foreach ($arr as $i => $price) {
        $need = $m - $price;

        if (isset($map[$need])) {
            return [$map[$need] + 1, $i + 1];
        }

        $map[$price] = $i;
    }
    return [];
}

// var_dump(icecreamParlor(4, [1,3,4,5,6,7,8,4,3,2,1]));
