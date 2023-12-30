<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    // DASHBOARD
    public function index()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $userPpp = $API->comm('/ppp/active/print');
        $resource = $API->comm('/system/resource/print');
        $resource = json_encode($resource);
        $resource = json_decode($resource, true);
        $interface = $API->comm('/interface/ethernet/print');
        $data = [
            'ppp' => count($userPpp),
            'cpu' => $resource['0']['cpu-load'],
            'uptime' => $resource['0']['uptime'],
            'systemName' => $resource['0']['board-name'],
            'interface1' => $interface['8']['name'],
            'interface2' => $interface['9']['name'],
            'interface3' => $interface['1']['name'],
            'interface4' => $interface['7']['name'],
        ];


        $this->load->view('template/main');
        $this->load->view('dashboard', $data);
    }


    // TRAFFIC
    // public function traffic()
    // {
    //     include "LoginAPI.php";
    //     $API = new RouterosAPI();
    //     $API->connect($ip, $username, $password);

    //     $GetInterfaceTraffic = $API->comm(
    //         '/interface/monitor-traffic',
    //         array(
    //             'interface' => 'sfp-sfpplus1-From1009',
    //             // 'interface2' => 'sfp-sfpplus2 - Uplink OLT',
    //             'once' => '',
    //         )
    //     );

    //     $rxBps = $GetInterfaceTraffic[0]['rx-bits-per-second'];
    //     $txBps = $GetInterfaceTraffic[0]['tx-bits-per-second'];
    //     $data = [
    //         'rxBps' => $rxBps,
    //         'txBps' => $txBps,
    //     ];

    //     $this->load->view('traffic/TrafficSFP1', $data);
    // }

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
            echo $data['message']. '<br>';
            echo $data['topics'] . '<br>';
            echo $data['time'] . '<br>';
            echo $data['.id'] . '<br>';
        }

        $this->load->view('log', $data);
    }
}