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
        $API2 = new RouterosAPI();
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $API->connect($ip, $username, $password);

        $resource = $API->comm('/system/resource/print');
        $resource = json_encode($resource);
        $resource = json_decode($resource, true);
        
        $userPpp = $API->comm('/ppp/active/print');


        $ip2 = $login['ip1009'];
        $username2 = $login['username1009'];
        $password2 = $login['password1009'];
        $API2->connect($ip2, $username2, $password2);
        
        $userPpp2 = $API2->comm('/ppp/active/print');
        
        $count = count($userPpp) + count($userPpp2);

        $data = [
            'systemName' => $resource['0']['board-name'],
            'countPpp' => $count,
            'activePpp' => $userPpp,
            'activePpp2' => $userPpp2,
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

    public function deleteMark($id)
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

        $id = '*' . $id;
        $API->comm('/ppp/secret/set', array(
            ".id" => $id,
            "comment" => $comment
        ));

        redirect('ppp/dataIsolir');
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

        $profile = "ProfileDisconnect";
        $now = wib_time(date('m'));
        if ($month == $now) {
            // Get ID
            $getId = $API->comm(
                '/ppp/secret/print',
                array(
                    '?comment' => $month
                )
            );

            // LOOPING
            foreach ($getId as $data) {
                $i = count($getId);
                $id = $data['.id'];

                if ($i > 0) {
                    while ($i > 0) {
                        // SET PROFILE
                        $API->comm('/ppp/secret/set', array(
                            ".id" => $id,
                            "profile" => $profile,
                            "comment" => $month
                        ));

                        // REMOVE ACTIVE
                        // GET REMOVE ID
                        $removeId = $API->comm('/ppp/active/print', array(
                            '?name' => $data['name'],
                        ));
                        $removeId = $removeId["0"]['.id'];
                        echo $removeId;

                        // REMOVE ACTIVE
                        $API->comm('/ppp/active/remove', array(
                            ".id" => $removeId
                        ));

                        $i--;
                        sleep(0.1);
                    }
                }
            }
            $this->load->view('status_code/202');
            // echo "<a href='ppp/dataIsolir'>Back To Isolir Menu<a>";
        } else {
            echo "ERROR";
        }
    }


    public function dataIsolir()
    {
        $API = new RouterosAPI;
        $login = login();
        $ip = $login['ip'];
        $username = $login['username'];
        $password = $login['password'];
        $month = wib_time(date('m'));


        $API->connect($ip, $username, $password);

        $result = $API->comm('/ppp/secret/print', [
            '?comment' => $month
        ]);

        if (count($result) < 1) {
            echo "TIDAK ADA DATA";
            $data = [
                'result' => $result,
            ];
        } else {
            $data = [
                'result' => $result,
            ];
        }
        $this->load->view('template/main');
        $this->load->view('ppp/daftarIsolir', $data);
    }
}
