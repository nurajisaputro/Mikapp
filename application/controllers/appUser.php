<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppUser extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->users();
    }
    public function users(){
        // $this->load->view('template/main');
        // $this->load->view('app-users/users');

        // $user = $this->db->get_where('user', 'username')->row_array();

        // $query = $this->db->query('SELECT `id`, `name`, `username`, `password`, `role_id`, `is_active`, `data_created` FROM `user` WHERE 1');

        // var_dump($query);
        date_default_timezone_set('Asia/Jakarta');

        echo date('dmy');
    }

}