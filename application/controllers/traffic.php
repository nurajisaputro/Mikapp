<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Traffic extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    // SFP PLUS 1
    public function SFP1()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        

        $resource = $API->comm('/system/resource/print');
        $interface = $API->comm('/interface/ethernet/print');

        $data = [
            'interface1' => $interface['8']['name'],
            'deviceName' => $resource['0']['board-name'],
        ];

        $this->load->view('template/main');
        $this->load->view('templateTraffic/SFP1', $data);
    }
    // SFP PLUS 1 END

    // SFP PLUS 2
    public function SFP2()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        


        $resource = $API->comm('/system/resource/print');
        $interface = $API->comm('/interface/ethernet/print');

        $GetTrafficSfp2 = $API->comm(
            '/interface/monitor-traffic',
            array(
                'interface' => 'sfp-sfpplus2 - Uplink OLT',
                'once' => '',
            )
        );

        $txBps = $GetTrafficSfp2[0]['rx-bits-per-second'];
        $rxBps = $GetTrafficSfp2[0]['tx-bits-per-second'];

        // Convert Download
        $rxKbps = $rxBps / 1024;
        $rxMbps = $rxKbps / 1024;
        $Rxsfp2 = number_format($rxMbps);

        //  Convert Upload
        $txKbps = $txBps / 1024;
        $txMbps = $txKbps / 1024;
        $Txsfp2 = number_format($txMbps);


        $data = [
            'interface2' => $interface['9']['name'],
            'rxTrafficSFP2' => $Rxsfp2,
            'txTrafficSFP2' => $Txsfp2,
            'deviceName' => $resource['0']['board-name'],
        ];

        $this->load->view('template/main');
        $this->load->view('templateTraffic/SFP2', $data);
    }
    // SFP PLUS 2 END

    // ETHER 2
    public function TrafficETH2()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        


        $resource = $API->comm('/system/resource/print');
        $interface = $API->comm('/interface/ethernet/print');

        $GetTrafficSfp2 = $API->comm(
            '/interface/monitor-traffic',
            array(
                'interface' => 'ether2 TO OLT',
                'once' => '',
            )
        );

        $txBps = $GetTrafficSfp2[0]['rx-bits-per-second'];
        $rxBps = $GetTrafficSfp2[0]['tx-bits-per-second'];

        // Convert Download
        $rxKbps = $rxBps / 1024;
        $rxMbps = $rxKbps / 1024;
        $RxEth2 = number_format($rxMbps);

        //  Convert Upload
        $txKbps = $txBps / 1024;
        $txMbps = $txKbps / 1024;
        $TxEth2 = number_format($txMbps);


        $data = [
            'interface3' => $interface['1']['name'],
            'rxTrafficETH2' => $RxEth2,
            'txTrafficETH2' => $TxEth2,
            'deviceName' => $resource['0']['board-name'],
        ];

        $this->load->view('template/main');
        $this->load->view('templateTraffic/TrafficETH2', $data);
    }
    // ETHER 2 END


    // Traffic SFP 1 
    public function trafficSFP1()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        

        $GetTrafficSfp1 = $API->comm(
            '/interface/monitor-traffic',
            array(
                'interface' => 'sfp-sfpplus1-From1009',
                'once' => '',
            )
        );

        $rxBps = $GetTrafficSfp1[0]['rx-bits-per-second'];
        $txBps = $GetTrafficSfp1[0]['tx-bits-per-second'];

        // Convert Download
        $rxKbps = $rxBps / 1024;
        $rxMbps = $rxKbps / 1024;
        $Rxsfp1 = number_format($rxMbps, 0, ',', '.');

        //  Convert Upload
        $txKbps = $txBps / 1024;
        $txMbps = $txKbps / 1024;
        $Txsfp1 = number_format($txMbps);

        // chart js value
        $chartValueRx = $rxMbps;
        $chartValueTx = $txMbps;

        $data = [
            'rxTrafficSFP1' => $Rxsfp1,
            'txTrafficSFP1' => $Txsfp1,
            'chartValueRx' => $chartValueRx,
        ];

        $this->load->view('template/main');
        $this->load->view('templateTraffic/rxSFP1', $data);
    }
    // TRAFFIC SFP 1 END


    // TRAFFIC SFP 2
    public function trafficSFP2()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        

        $interface = $API->comm('/interface/ethernet/print');
        $GetTrafficSfp1 = $API->comm(
            '/interface/monitor-traffic',
            array(
                'interface' => 'sfp-sfpplus2 - Uplink OLT',
                'once' => '',
            )
        );

        $rxBps = $GetTrafficSfp1[0]['rx-bits-per-second'];
        $txBps = $GetTrafficSfp1[0]['tx-bits-per-second'];

        // Convert Download
        $rxKbps = $rxBps / 1024;
        $rxMbps = $rxKbps / 1024;
        $RxSFP2 = number_format($rxMbps, 0, ',', '.');

        //  Convert Upload
        $txKbps = $txBps / 1024;
        $txMbps = $txKbps / 1024;
        $TxSFP2 = number_format($txMbps);

        // chart js value
        $chartValueRx = $rxMbps;
        $chartValueTx = $txMbps;

        $data = [
            'rxTrafficSFP2' => $RxSFP2,
            'txTrafficSFP2' => $TxSFP2,
            'chartValueRx' => $chartValueTx,
        ];

        $this->load->view('template/main');
        $this->load->view('templateTraffic/rxSFP2', $data);
    }
    // TRAFFIC SFP 2 END
}