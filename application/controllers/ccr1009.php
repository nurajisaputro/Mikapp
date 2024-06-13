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
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['board-name']);
    }

    public function users()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $userPpp = $API->comm('/ppp/active/print');
        echo (count($userPpp));
    }

    public function cpuload()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['cpu-load']);
        echo (" %");
    }

    public function memory()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);
        
        $resource = $API->comm('/system/resource/print');
        echo FormatBytes($resource['0']['free-memory']);
    }

    public function cputemp()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['cpu-temperature']);
        echo ("°");
    }

    public function bodytemp()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['temperature']);
        echo ("°");
    }
    public function psu1()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['psu1-state']);
    }

    public function psu2()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['psu2-state']);
    }

    public function uptime()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['uptime']);
    }
    public function description()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip1009'];
        $username = $login['username1009'];
        $password = $login['password1009'];
        $API->connect($ip, $username, $password);

        $identity = $API->comm('/system/identity/print');
        echo ($identity['0']['name']);
    }
}
