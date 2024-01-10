<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // Validasi Login
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login',);
        } else {
            $this->_login();
        }
    }

    // 
    private function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username'=> $username])->row_array();

        if($user){
            if(password_verify($password, $user['password'])){
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id'],
                ];
                // $this->session->set_userdata($data);
                redirect('dashboard');
            }else{
                echo 'GAGAL1';
            }
        }else{
            echo 'GAGAL2';
        }
    }

    // registration new user
    public function registration()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username already used. Please use another username'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/add-user-login',);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash(
                    $this->input->post('password2'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 1,
                'is_active' => 1,
                'data_created' => time()
            ];

            $this->db->insert('user', $data);
            redirect('dashboard');
        }
    }
}
