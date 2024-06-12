<?php
function ip1(){
    $ip = "192.168.1.1";
    return $ip;
}
function user1(){
    $user = "admin";
    return $user;
}
function pass1(){
    $pass = "";
    return $pass;
}

function ip2(){
    $ip = "192.168.2.1";
    return $ip;
}
function user2(){
    $user = "admin";
    return $user;
}
function pass2(){
    $pass = "";
    return $pass;
}


function ip3(){
    $ip = "192.168.3.1";
    return $ip;
}
function user3(){
    $user = "admin";
    return $user;
}
function pass3(){
    $pass = "";
    return $pass;
}


function iptest(){
    $ip = "103.189.249.90";
    return $ip;
}
function usertest(){
    $user = "admin";
    return $user;
}
function passtest(){
    $pass = "";
    return $pass;
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