<?php
class My_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    protected function check_login_only() {
        if (!is_logged_in()) {
            redirect('auth/login');
        }
    }

    protected function check_guest_only() {
        if (is_logged_in()) {
            redirect('dashboard');
        }
    }
}
