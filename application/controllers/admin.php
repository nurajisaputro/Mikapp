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
        echo "TESTING";
    }
}
