<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ping extends CI_Controller
{
    public function ping()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $iplist = array
        (
            array("192.168.2.101", "UBUNTU SERVER"),
            array("1.1.1.1", "Cloud Flare"),
        );

        $replay = 0;
        $i = count($iplist);
        $results = [];
        $replay = 0;

        for ($j = 0; $j < $i; $j++) {
            $ip = $iplist[$j][0];
            $ping = exec("ping -n 1 $ip", $output, $status);
            $results[] = $status;
        }

        $data = [
            'results' => $results,
            'item_list' => $iplist
        ];

        $this->load->view('template/main');
        $this->load->view('ping/ping', $data);
    }
}