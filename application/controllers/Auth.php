<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_models');
		$this->load->helper('url_helper');
	}

	public function register()
	{
		$data['title'] = 'Register';
		$data['content'] = 'auth/register';

		$this->load->view('layouts/main', $data);
	}

	public function register_user()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			if ($this->Auth_models->register($data)) {
				redirect('auth/login');
			} else {
				redirect('auth/register');
			}
		}
	}

	public function login()
	{
		$data['users'] = $this->Auth_models->getAllUsers();
		$data['title'] = 'Login';
		$data['content'] = 'auth/login';

		$this->load->view('layouts/main', $data);
	}

	public function login_user()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->Auth_models->login($username, $password);

			if ($user) {
				$this->session->set_userdata('user_id', $user->id);
				redirect('dashboard');
			} else {
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
