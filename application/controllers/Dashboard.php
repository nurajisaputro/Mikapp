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
            // 'interface1' => $interface['8']['name'],
            // 'interface2' => $interface['9']['name'],
            // 'interface3' => $interface['1']['name'],
            // 'interface4' => $interface['7']['name'],
        ];


        $this->load->view('template/main');
        $this->load->view('dashboard', $data);
    }

    public function trafficIN()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $GetInterfaceTraffic = $API->comm(
            '/interface/monitor-traffic',
            array(
                'interface' => 'sfp-sfpplus2 - Uplink OLT',
                'once' => '',
            )
        );

        $rxBps2 = $GetInterfaceTraffic[0]['rx-bits-per-second'];
        $txBps2 = $GetInterfaceTraffic[0]['tx-bits-per-second'];
        $data = [
            'rxBps2' => $rxBps2,
            'txBps2' => $txBps2,
        ];

        $this->load->view('traficIN', $data);
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


    public function Log()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $log = $API->comm('/log/print');

        // $data = [
        //     'logPpp' => $log['10']['topics'],
        //     'logMessage' => $log['0']['message'],
        // ];
        foreach ($log as $data) {
            echo $data['message'] . '<br>';
            echo $data['topics'] . '<br>';
            echo $data['time'] . '<br>';
            echo $data['.id'] . '<br>';
        }

        $this->load->view('log', $data);
    }
}