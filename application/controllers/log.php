<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function log()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $array = $API->comm('/log/print');
        $resource = $API->comm('/system/resource/print');

        $data = [
            'log' => $array,
            'systemName' => $resource['0']['board-name'],
        ];
        $this->load->view('template/main');
        $this->load->view('log/all-log', $data);
    }


    public function pppLog()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        

        $pppLog = $API->comm(
            '/log/print',
            array("?topics"=>"pppoe,ppp,info,account"),
        );
        $resource = $API->comm('/system/resource/print');

        $data = [
            'pppLog' => $pppLog,
            'systemName' => $resource['0']['board-name'],
        ];
        $this->load->view('template/main');
        $this->load->view('log/ppp-log', $data);
    }
}