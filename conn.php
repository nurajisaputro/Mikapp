<?php

require('routeros_api.class.php');

$ip = "192.168.3.1";
$userLogin = "nurajisaputro";
$passLogin = "nurajisaputro123";

$API = new RouterosAPI();

if ($API->connect($ip, $userLogin, $passLogin)) {
}
