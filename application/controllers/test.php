<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function ping()
    {
        $iplist = array(
            array("1", "192.168.2.101", "UBUNTU SERVER", ""),
            array("2", "10.10.124.1", "METRO HSP", ""),
            array("3", "103.189.249.11", "METRO ICON", ""),
            array("4", "192.168.3.1", "CCR 1036", ""),
            array("5", "10.10.101.1", "CCR 1009", ""),
            array("6", "192.168.60.2", "RB750", ""),
            array("7", "192.168.155.1", "RB750Gr3", ""),
            array("8", "192.168.2.253", "RB2011", ""),
        );

        $replay = 0;
        $i = count($iplist);
        $results = [];
        $replay = 0;

        for ($j = 0; $j < $i; $j++) {
            $ip = $iplist[$j][1];
            $ping = exec("ping -n 1 $ip", $output, $status);
            $results[] = $status;
        }
        var_dump($output);
        echo "</br>";
        echo $results[$results];
    }

    public function connection()
    {
        $a = $this->db->query("SELECT * FROM connection WHERE 1")->result_array();
        $login = $this->db->get('connection')->row_array();

        var_dump($a);
    }

    public function test2116()
    {
        $this->load->view('test/test');
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect('10.10.101.1', 'nuraji', 'nurajisaputro123');
        $resource = $API->comm('/system/health/print');
        // echo ($resource['0']['board-name']);
        var_dump($resource);
    }



    public function allUsers()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        // $API->connect($ip, $username, $password);
        $API->connect($iptest, $usertest, $passtest);

        $allusers = $API->comm('/ppp/secret/print');
        $resource = $API->comm('/system/resource/print');

        $data = [
            'systemName' => $resource['0']['board-name'],
            'countPpp' => count($allusers),
            'allUsers' => $allusers,
            'last' => $allusers[0]['last-logged-out'],
            'last-disconnect' => $allusers[0]['last-disconnect-reason']
        ];

        // echo $allusers['1'];
        var_dump($data);

        // $this->load->view('template/main');
        // $this->load->view('test/test');
    }


    public function index()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['iptest'];
        $username = $login['usernametest'];
        $password = $login['passwordtest'];
        $API->connect($ip, $username, $password);

        $data = $API->comm('/interface/print');

        // $data = json_decode($dataAPI, true);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
