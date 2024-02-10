<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{
    public function log()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
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
        include "LoginAPI.php";
        $API = new RouterosAPI();
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