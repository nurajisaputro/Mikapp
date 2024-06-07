<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Connection extends CI_Controller
{
    public function connection()
    {
        $db = $this->db->query("SELECT * FROM connection WHERE 1")->result_array();

        // foreach ($db as $data) {
        //     echo $data['id'];
        //     echo "</br>";
        //     echo $data['ip'];
        //     echo "</br>";
        //     echo $data['router'];
        //     echo "</br>";
        //     echo $data['description'];
        //     echo "</br>";
        //     echo $data['username'];
        //     echo "</br>";
        //     echo $data ['password'];
        //     echo "</br>";
        // }
        // var_dump($db);
        $s =  $db['0']['ip'];
        $a = $db['0']['username'];
        $d = $db['0']['password'];

        // $id = $db['id'] ;
        // $router = $db['router'];
        // $description = $db['description'];
        // $ip = $db['1']['ip'];
        // $username = $db['username'];
        // $password = $db['password'];

        $API = new RouterosAPI;
        $API->connect($s, $a, $d);
        $test = $API->comm('/log/print');
        // var_dump($test);
    }
}
