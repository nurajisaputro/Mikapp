<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ccr2116 extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
        ini_set('date.timezone', 'Asia/Jakarta');
    }

    public function index()
    {
        $API = new RouterosAPI;
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];

        $API->connect($ip, $username, $password);
        $test = $API->comm('/system/resource/print');

        // var_dump($test);

        echo $test['0']['board-name'];
        echo $test['0']['uptime'];
    }

    public function boardname()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['board-name']);
    }

    public function cpuload()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['cpu-load']);
        echo (" %");
    }

    public function memory()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo FormatBytes($resource['0']['free-memory']);
    }

    public function cputemp()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['0']['value']);
        echo ("°");
    }

    public function bodytemp()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['6']['value']);
        echo ("°");
    }

    public function psu1()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['7']['value']);
    }

    public function psu2()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $sysHealth = $API->comm('/system/health/print');
        echo ($sysHealth['8']['value']);
    }
    public function uptime()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        echo ($resource['0']['uptime']);
    }
    public function description()
    {
        $API = new RouterosAPI();
        $login = login();
        $login = login();
        $ip = $login['ip2116'];
        $username = $login['username2116'];
        $password = $login['password2116'];
        $API->connect($ip, $username, $password);

        $identity = $API->comm('/system/identity/print');
        echo ($identity['0']['name']);
    }
}
