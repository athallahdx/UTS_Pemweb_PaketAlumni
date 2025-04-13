<?php

class Kunjungan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kunjungan_models');
		$this->load->model('Pasien_models');
		$this->load->model('Dokter_models');
		$this->load->model('Poli_models');
	}

	public function index()
	{
		$data['kunjungan'] = $this->Kunjungan_models->getAllKunjungan();
		$data['content'] = 'kunjungan/index';
		$data['title'] = 'Data Kunjungan';
		
		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['pasien'] = $this->Pasien_models->getAllPasien();
		$data['dokter'] = $this->Dokter_models->get_all_dokter();
		$data['poli'] = $this->Poli_models->getAllPoli();
		$data['content'] = 'kunjungan/create';
		$data['title'] = 'Tambah Data Kunjungan';
		$data['id_user'] = $this->session->userdata('id_user');
		
		$this->load->view('layouts/main', $data);
	}

	public function store()
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_pasien' => $this->input->post('id_pasien'),
			'id_dokter' => $this->input->post('id_dokter'),
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'keluhan' => $this->input->post('keluhan'),
			'id_poli' => $this->input->post('id_poli'),
			'id_user' => $this->session->userdata('id_user')
		);

		if ($this->Kunjungan_models->insertKunjungan($data)) {
			redirect('kunjungan');
		} else {
			redirect('kunjungan/create');
		}
	}

	public function edit($id)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getKunjunganById($id);
		$data['pasien'] = $this->Pasien_models->getAllPasien();
		$data['dokter'] = $this->Dokter_models->get_all_dokter();
		$data['content'] = 'kunjungan/edit';
		$data['title'] = 'Edit Data Kunjungan';

		$this->load->view('layouts/main', $data);
	}

	public function update($id)
	{
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_pasien' => $this->input->post('id_pasien'),
			'id_dokter' => $this->input->post('id_dokter'),
			'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
			'keluhan' => $this->input->post('keluhan')
		);

		if ($this->Kunjungan_models->updateKunjungan($id, $data)) {
			redirect('kunjungan');
		} else {
			echo "Error updating data";
		}
	}

	public function delete($id)
	{
		if ($this->Kunjungan_models->deleteKunjungan($id)) {
			redirect('kunjungan');
		} else {
			echo "Error deleting data";
		}
	}

	public function detail($id)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getKunjunganById($id);
		$this->load->view('layouts/main', $data);
	}

	public function getKunjunganByPasien($id_pasien)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getKunjunganByPasien($id_pasien);
		$this->load->view('layouts/main', $data);
	}

	public function getKunjunganByDokter($id_dokter)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getKunjunganByDokter($id_dokter);
		$this->load->view('layouts/main', $data);
	}

	public function getKunjunganByUser($id_user)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getAllKunjunganByUser($id_user);
		$this->load->view('layouts/main', $data);
	}

	public function getKunjunganById($id)
	{
		$data['kunjungan'] = $this->Kunjungan_models->getKunjunganById($id);
		$this->load->view('layouts/main', $data);
	}
}
