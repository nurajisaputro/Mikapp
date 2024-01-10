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
        $API->connect($ip1009, $username1009, $password1009);

        // PPP 1036
        $userPpp = $API->comm('/ppp/active/print');

        // resource 1036
        $resource = $API->comm('/system/resource/print');

        // resource 1009
        $resource1009 = $API->comm('/system/resource/print');


        $resource = json_encode($resource);
        $resource = json_decode($resource, true);
        $interface = $API->comm('/interface/ethernet/print');
        $data = [
            'ppp' => count($userPpp),
            'cpu' => $resource['0']['cpu-load'],
            'uptime' => $resource['0']['uptime'],
            'systemName' => $resource['0']['board-name'],
            'systemName1009' => $resource1009['0']['board-name'],
            'cpu1009' => $resource1009['0']['cpu-load'],
            'uptime1009' => $resource1009['0']['uptime'],
        ];


        $this->load->view('template/main');
        $this->load->view('dashboard', $data);
    }


    // CPULOAD
    public function cpuLoad()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        $resource = $API->comm('/system/resource/print');

        $resource = json_encode($resource);
        $resource = json_decode($resource, true);

        $data = [
            'cpu' => $resource['0']['cpu-load'],
            'uptime' => $resource['0']['uptime'],
            'memory' => $resource['0']['free-memory'],
            'systemName' => $resource['0']['board-name'],
        ];

        $this->load->view('cpuLoad', $data);
    }


    // CPULOAD 1009
    public function cpuLoad1009()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        // 1009 Login
        $API->connect($ip1009, $username1009, $password1009);
        $resource = $API->comm('/system/resource/print');

        $resource = json_encode($resource);
        $resource = json_decode($resource, true);

        $data = [
            'cpu1009' => $resource['0']['cpu-load'],
        ];

        $this->load->view('cpuLoad1009', $data);
    }


    // MEMORYLOAD
    public function memoryLoad()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        $resource = $API->comm('/system/resource/print');

        $resource = json_encode($resource);
        $resource = json_decode($resource, true);

        $data = [
            'cpu' => $resource['0']['cpu-load'],
            'uptime' => $resource['0']['uptime'],
            'memory' => $resource['0']['free-memory'],
            'systemName' => $resource['0']['board-name'],
        ];

        $this->load->view('memoryLoad', $data);
    }


    // ACTIVE USER
    public function activeUser()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $userPpp = $API->comm('/ppp/active/print');
        $data = [
            'activePpp' => count($userPpp),
        ];

        $this->load->view('activeUser', $data);
    }
}