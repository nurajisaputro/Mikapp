<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index(){
        $this->load->view('auth/login',);
    }


    // public function login(){
    //     $ip = '192.168.155.1';
    //     $user ='nurajisaputro';
    //     $password = 'nurajisaputro123';

    //     $data = [
    //         'ip'=> $ip,
    //         'user'=> $user,
    //         'password'=> $password,
    //     ];

    //     $this->session->set_userdata($data);
    //     $this->load->view('auth/login');
    // }

    
}

