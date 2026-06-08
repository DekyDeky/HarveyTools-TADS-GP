<?php

function rollDice($qtd, $faces)
{
    $rolls = [];
    $total = 0;

    for ($i = 0; $i < $qtd; $i++) {
        $r = rand(1, $faces);
        $rolls[] = $r;
        $total += $r;
    }

    return [
        "results" => $rolls,
        "total" => $total
    ];
}