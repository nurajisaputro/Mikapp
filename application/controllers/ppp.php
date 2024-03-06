<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function users()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        // $API->connect($iptest, $usertest, $passtest);

        $userPpp = $API->comm('/ppp/active/print');
        $resource = $API->comm('/system/resource/print');
        $resource = json_encode($resource);
        $resource = json_decode($resource, true);

        $data = [
            'systemName' => $resource['0']['board-name'],
            'countPpp' => count($userPpp),
            'activePpp' => $userPpp,
        ];

        $this->load->view('template/main');
        $this->load->view('ppp/users', $data);
    }


    public function addUser()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        $post = $this->input->post(null, true);
        $service = "pppoe";

        $API->comm("ppp/secret/add", array(
            "name" => $post['user'],
            "password" => $post['password'],
            "service" => $service,
            "profile" => $post['profile'],
            'nama' => $_POST['user'],
        ));

        $this->load->view('ppp/addUser');
        redirect('ppp/addUser');
    }

    public function isolir()
    {
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);
        // $API->connect($iptest, $usertest, $passtest);
        $profile = "ProfileDisconnect";

        $isolir = $API->comm("/ppp/secret/print", array(
            "?profile" => $profile,
        ));

        $data = [
            "isolir" => $isolir,
        ];
        $this->load->view('template/main');
        $this->load->view("ppp/isolir", $data);
    }

    // ENABLE USER 5M
    public function enableUser5M($name)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        ini_set('date.timezone', 'Asia/Jakarta');
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($ip, $username, $password);

        // API test
        // $API->connect($iptest, $usertest, $passtest);

        $now = date('d/m | H:i');
        $who = $data['user']['name'];
        $comment = "Lunas | " . $now . " - $who";
        $newProfile = "Profile5M";
        $name = $name . "@backbone.net";
        // Get ID
        $getId = $API->comm(
            '/ppp/secret/print',
            array(
                '?name' => $name
            )
        );
        $id = $getId['0']['.id'];

        // SET PROFILE
        $API->comm('/ppp/secret/set', array(
            ".id" => $id,
            "profile" => $newProfile,
            "comment" => $comment
        ));

        // REMOVE ACTIVE
        $removeId = $API->comm('/ppp/active/print', array(
            '?name' => $name
        ));
        $removeId = $removeId["0"]['.id'];

        $API->comm('/ppp/active/remove', array(
            ".id" => $removeId
        ));

        redirect('ppp/isolir');
    }

    // ENABLE USER 10M
    public function enableUser10M($name)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($iptest, $usertest, $passtest);

        $now = date('d/m | H:i');
        $comment = "Lunas | " . $now;
        $newProfile = "Profile10M";

        // Get ID
        $getId = $API->comm(
            '/ppp/secret/print',
            array(
                '?name' => $name
            )
        );
        $id = $getId["0"]['.id'];

        // SET PROFILE
        $API->comm('/ppp/secret/set', array(
            ".id" => $id,
            "profile" => $newProfile,
            "comment" => $comment
        ));

        // REMOVE ACTIVE
        $removeId = $API->comm('/ppp/active/print', array(
            '?name' => $name
        ));
        $removeId = $removeId["0"]['.id'];
        $API->comm('/ppp/active/remove', array(
            ".id" => $removeId
        ));
        redirect('ppp/isolir');
    }
    // ENABLE USER 20M
    public function enableUser20M($name)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        include "LoginAPI.php";
        $API = new RouterosAPI();
        $API->connect($iptest, $usertest, $passtest);

        $now = date('d/m | H:i');
        $comment = "Lunas | " . $now;
        $newProfile = "Profile20M";

        // Get ID
        $getId = $API->comm(
            '/ppp/secret/print',
            array(
                '?name' => $name
            )
        );
        $id = $getId["0"]['.id'];

        // SET PROFILE
        $API->comm('/ppp/secret/set', array(
            ".id" => $id,
            "profile" => $newProfile,
            "comment" => $comment
        ));

        // REMOVE ACTIVE
        $removeId = $API->comm('/ppp/active/print', array(
            '?name' => $name
        ));
        $removeId = $removeId["0"]['.id'];

        $API->comm('/ppp/active/remove', array(
            ".id" => $removeId
        ));

        redirect('ppp/isolir');
    }
}
