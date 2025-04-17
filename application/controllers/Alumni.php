<?php

class Alumni extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->model('Department_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['title'] = 'Dashboard Alumni';
		$data['content'] = 'alumni/index';
		$data['alumnus'] = $this->Mahasiswa_model->get_all_students_alumni_with_departement();
		$data['departments'] = $this->Department_model->get_all_departments();
		$this->load->view('layouts/main', $data);
	}


}
