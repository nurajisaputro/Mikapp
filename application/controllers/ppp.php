<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{
    public function users()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        $userPpp = $API->comm('/ppp/active/print');
        $resource = $API->comm('/system/resource/print');
        $resource = json_encode($resource);
        $resource = json_decode($resource, true);

        $data =[
            'systemName' => $resource['0']['board-name'],
            'countPpp' => count($userPpp),
            'activePpp' => $userPpp,
        ];

        $this->load->view('template/main');
        $this->load->view('ppp/users', $data);
    }


    public function addUser(){
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        $post = $this->input->post(null, true);
        $service = "pppoe";

        $API->comm("ppp/secret/add",array(
            "name" => $post['user'],
            "password" => $post['password'],
            "service" => $service,
            "profile" => $post['profile'],
            'nama' => $_POST['user'],
        ));

        $this->load->view('ppp/addUser');
        redirect('ppp/addUser');
    }
}

?>