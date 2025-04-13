<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller { // Mengubah CI_Controller menjadi My_Controller

    public function __construct() {
        parent::__construct();
        $this->check_login_only(); // hanya untuk yang sudah login
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard';
        $data['user'] = $this->session->userdata('id_user');

        $this->load->view('layouts/main', $data);
    }
}