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


// function FormatBytes($Tx, $Rx = null){
//     //  Kovert Download
// $rxKbps = $rxBps / 1024;
// $rxMbps = $rxKbps / 1024;
// $Rx = number_format($rxMbps);


// //  Kovert Upload
// $txKbps = $txBps / 1024;
// $txMbps = $txKbps / 1024;
// $Tx = number_format($txMbps);
// }


function LoginAPI()
{
    $ip = "192.168.155.1";
    $user = "admin";
    $password = "";

    $API = new RouterosAPI;
    $API->connect($ip, $user, $password);

}

?>