<?php

class Pasien extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_models');
		$this->load->helper('url');
		$this->check_login_only();
	}

	public function index()
	{
		$data['title'] = 'Data Pasien';
		$data['content'] = 'pasien/index';
		$data['pasien'] = $this->Pasien_models->getAllPasien();

		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Pasien';
		$data['content'] = 'pasien/create';

		$this->load->view('layouts/main', $data);
	}

	public function store()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'id_user' => $this->session->userdata('id_user'),
			);
			$this->Pasien_models->insertPasien($data);
			redirect('pasien');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Pasien';
		$data['content'] = 'pasien/edit';
		$data['pasien'] = $this->Pasien_models->getPasienById($id);

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'id_user' => $this->session->userdata('id_user'),
			);
			$this->Pasien_models->updatePasien($id, $data);
			redirect('pasien');
		}
	}

	public function delete($id)
	{	
		$this->Pasien_models->deletePasien($id);
		redirect('pasien');
	}
}
