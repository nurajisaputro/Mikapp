<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
        ini_set('date.timezone', 'Asia/Jakarta');
    }

    public function users()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

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

    public function allUsers()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $allusers = $API->comm('/ppp/secret/print');
        $resource = $API->comm('/system/resource/print');

        $data = [
            'systemName' => $resource['0']['board-name'],
            'countPpp' => count($allusers),
            'allUsers' => $allusers,
            'lastDisconnect' => $allusers[0]['last-logged-out'],
            'reasonDisconnect' => $allusers[0]['last-disconnect-reason'],
        ];

        $this->load->view('template/main');
        $this->load->view('ppp/allUsers', $data);
    }


    public function addUser()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
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
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        $profile = "ProfileDisconnect";

        $getMonth = $this->input->post('bulan');
        if ($getMonth == null) {
            $month = "All";
        } else {
            $month = $getMonth;
        }


        if ($month == "All") {
            $isolirUsers = $API->comm("/ppp/secret/print", array(
                "?profile" => $profile,
            ));
        } else {
            $isolirUsers = $API->comm("/ppp/secret/print", array(
                "?comment" => $month,
            ));
        }

        $data = [
            "isolir" => $isolirUsers,
            "month" => $month,
        ];

        $this->load->view('template/main');
        $this->load->view("ppp/isolir", $data);
    }

    // ENABLE USER 5M
    public function enableUser5M($name)
    {
        // BASE API
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        // GET USER FROM LOGIN
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // USER FROM LOGIN
        $who = $data['user']['name'];
        $now = date('d/m | H:i');
        $comment = "Lunas | " . $now . " - $who";
        // AKTIFASI PAKET
        $newProfile = "Profile5M";
        // REPLACE USERNAME
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
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $now = date('d/m | H:i');
        $who = $data['user']['name'];
        $comment = "Lunas | " . $now . " - $who";
        $newProfile = "Profile10M";
        $name = $name . "@backbone.net";

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
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $now = date('d/m | H:i');
        $who = $data['user']['name'];
        $comment = "Lunas | " . $now . " - $who";
        $newProfile = "Profile20M";
        $name = $name . "@backbone.net";

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


    public function Disable($name)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $now = date('d/m | H:i');
        $who = $data['user']['name'];
        // $comment = "Lunas | " . $now . " - $who";

        // COMMENT MANUAL
        $comment = "april";
        $newProfile = "ProfileDisconnect";
        $name = $name . "@backbone.net";

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

    public function markUser($id)
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);
        
        $comment  = wib_time(date("m"));
        $id = '*' . $id;
        $API->comm('/ppp/secret/set', array(
            ".id" => $id,
            "comment" => $comment
        ));

        redirect('ppp/allUsers');
    }

    public function test()
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $allusers = $API->comm('/ppp/secret/print');
        $resource = $API->comm('/system/resource/print');

        var_dump($allusers);
    }

    public function isolirAllUserThisMonth($month)
    {
        $API = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $now = wib_time(date('m'));
        if ($month == $now) {
            // Get ID
            $getId = $API->comm(
                '/ppp/secret/print',
                array(
                    '?comment' => $month
                )
            );

            // LOOPING SET PROFILE
            foreach ($getId as $data) {
                
                $i = count($getId);
                $id = $data['.id'];
                if ($i > 0) {
                    while ($i > 0) {
                        $API->comm('/ppp/secret/set', array(
                            ".id" => $id,
                            "profile" => 'test',
                            "comment" => $month
                        ));

                        // echo $getId['0']['.id'];
                        $i--;
                    }
                }
            }

            // SET PROFILE
            // $API->comm('/ppp/secret/set', array(
            //     ".id" => $id,
            //     "profile" => $newProfile,
            //     "comment" => $comment
            // ));

            // REMOVE ACTIVE
            // $removeId = $API->comm('/ppp/active/print', array(
            //     '?name' => $name
            // ));
            // $removeId = $removeId["0"]['.id'];

            // $API->comm('/ppp/active/remove', array(
            //     ".id" => $removeId
            // ));
            // var_dump($getId);

            // foreach($getId as $data){
            //     echo $data['.id'];
            //     echo "</br>";
            //     echo $data['name'];

            // }
        } else {
            echo "else";
        }
    }
}
