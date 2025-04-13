<?php

class Dokter extends My_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Dokter_models');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->check_login_only();
	}

	public function index()
	{
		$data['title'] = 'Data Dokter';
		$data['content'] = 'dokter/index';
		$data['dokter'] = $this->Dokter_models->get_all_dokter();

		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Dokter';
		$data['content'] = 'dokter/create';

		$this->load->view('layouts/main', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'spesialisasi' => $this->input->post('spesialisasi'),
			);
			$this->Dokter_models->insert_dokter($data);
			redirect('dokter');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Dokter';
		$data['content'] = 'dokter/edit';
		$data['dokter'] = $this->Dokter_models->get_dokter_by_id($id);

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'spesialisasi' => $this->input->post('spesialisasi'),
			);
			$this->Dokter_models->update_dokter($id, $data);
			redirect('dokter');
		}
	}

	public function delete($id)
	{
		$this->Dokter_models->delete_dokter($id);
		redirect('dokter');
	}
}
