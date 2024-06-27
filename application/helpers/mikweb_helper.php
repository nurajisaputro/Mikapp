<?php
function login()
{

    $data = [
        // IP MIKROTIK 1036

        'ip' => '192.168.3.1',
        'username' => 'mikwebAPI',
        'password' => 'nurajisaputro123',

        // IP TEST
        
        // 'ip' => '103.189.249.90',
        // 'username' => 'admin',
        // 'password' => '',



        // IP MIKROTIK 1009

        'ip1009' => '10.10.102.2',
        'username1009' => 'nuraji',
        'password1009' => 'nuraji12',

        // 'ip1009' => '10.10.99.2',
        // 'username1009' => 'admin',
        // 'password1009' => '',



        // IP MIKROTIK 2116
        'ip2116' => '10.10.101.1',
        'username2116' => 'nuraji',
        'password2116' => 'nurajisaputro123'
    ];

    return $data;
}

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

function version(){

    $version = "<b>Version</b> 1.2.2";

    echo $version;
}