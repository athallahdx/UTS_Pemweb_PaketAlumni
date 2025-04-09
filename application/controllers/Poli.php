<?php

class Poli extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Poli_models');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Data Poli';
		$data['content'] = 'poli/index';
		$data['poli'] = $this->Poli_models->getAllPoli();

		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['title'] = 'Tambah Data Poli';
		$data['content'] = 'poli/create';

		$this->load->view('layouts/main', $data);
	}

	public function store()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_poli' => $this->input->post('nama_poli'),
			);
			$this->Poli_models->insertPoli($data);
			redirect('poli');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Poli';
		$data['content'] = 'poli/edit';
		$data['poli'] = $this->Poli_models->getPoliById($id);

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = array(
				'nama_poli' => $this->input->post('nama_poli'),
			);
			$this->Poli_models->updatePoli($id, $data);
			redirect('poli');
		}
	}

	public function delete($id)
	{
		$this->Poli_models->deletePoli($id);
		redirect('poli');
	}
}
