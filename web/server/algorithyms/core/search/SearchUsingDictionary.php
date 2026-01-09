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
}
