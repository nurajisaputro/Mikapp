<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        // $this->load->view('template/main');
        $this->load->view('super_admin/super_admin');
        $test = $this->db->get('superadmin_sub_menu')->row_array();
        var_dump($test);
    }


    public function log()
    {
        $this->load->view('template/main');
        $this->load->view('super_admin/log');
    }

    public function userMgmt()
    {
        $this->load->view('template/main');
        $this->load->view('super_admin/user_mgmt');
    }

    public function deleteUser()
    {
        redirect('admin/userMgmt');
    }
}
