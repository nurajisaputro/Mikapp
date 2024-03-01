<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ccr1009 extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function boardname()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['board-name']);
    }
    public function cpuload()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['cpu-load']);
        echo (" %");
    }

    public function memory()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $resource = $API->comm('/system/resource/print');
        echo FormatBytes($resource['0']['free-memory']);
    }

    public function cputemp()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['cpu-temperature']);
        echo ("°");
    }

    public function bodytemp()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['temperature']);
        echo ("°");
    }
    public function psu1()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['psu1-state']);
    }

    public function psu2()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['psu2-state']);
    }

    public function uptime()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip1009, $username1009, $password1009);
        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['uptime']);
    }
}