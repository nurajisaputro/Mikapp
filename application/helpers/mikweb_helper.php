<?php

function FormatBytes($Tx, $Rx = null)
{

    $satuan = ['Bits', 'Kb', 'Mb', 'Gb'];

    $i = 0;
    while ($Tx > 1024) {
        $Tx /= 1024;
        $i++;
    }

    return round($Tx) . ' ' . $satuan[$i];
}