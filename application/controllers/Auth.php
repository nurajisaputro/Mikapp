<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Please input Username'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Please input Password'
        ]);

        // Validasi Login
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login',);
        } else {
            $this->_login();
        }
    }

    // 
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // GET IP
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://httpbin.org/ip");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($output, true);
        $location = $result['origin'];

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];
                $this->session->set_userdata($data);
                $user_log = [
                    'username' => $user['username'],
                    'time' => date('Hi'),
                    'date' => date('dmy'),
                    'location' => $location
                ];
                $this->db->insert('user_log', $user_log);

                redirect('dashboard');
            } else {
                echo "
                <script>alert 
                    ('Password Yang Anda Masukkan Salah')
                </script>
                ";
                $this->load->view('auth/login',);
            }
        } else {
            echo "
            <script>alert 
                ('Login Gagal Username Tidak Di Temukan')
            </script>
            ";
            $this->load->view('auth/login',);
        }
    }

    // registration new user
    public function registration()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username already used. Please use another username'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/add-user-login',);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => password_hash(
                    $this->input->post('password2'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 1,
                'is_active' => 1,
                'data_created' => date('dmy')
            ];

            $this->db->insert('user', $data);
            echo "
            <script>alert 
                ('Data Berhasil Di tambahkan');
            </script>
            ";
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        redirect('auth');
    }
}
