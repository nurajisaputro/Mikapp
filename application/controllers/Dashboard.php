<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    // DASHBOARD
    public function index()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        // 1036 Login
        $API->connect($ip, $username, $password);
        // 1009 Login
        // $API->connect($ip1009, $username1009, $password1009);
        // resource 1036
        $resource = $API->comm('/system/resource/print');
        // resource 1009
        $resource1009 = $API->comm('/system/resource/print');
        $data = [
            'uptime' => $resource['0']['uptime'],
            'name1' => $resource['0']['board-name'],
            'systemName1009' => $resource1009['0']['board-name'],
            'uptime1009' => $resource1009['0']['uptime'],
        ];

        $this->load->view('template/main');
        $this->load->view('dashboard', $data);
    }

    public function boardname1(){
        include "LoginAPI.php";
        $API = new RouterosAPI();
        // 1036 Login
        $API->connect($ip, $username, $password);
        $resource = $API->comm('/system/resource/print');

        $data = [
            'uptime' => $resource['0']['uptime'],
            'name1' => $resource['0']['board-name'],
        ];

        $this->load->view('template/main');
        $this->load->view('dashboard', $data);
    }
}
