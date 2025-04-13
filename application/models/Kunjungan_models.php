<?php

class Kunjungan_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllKunjungan()
	{
		$query = $this->db->get('kunjungan');
		return $query->result();
	}

	public function getAllKunjunganByUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('kunjungan');
		return $query->result();
	}

	public function getKunjunganById($id)
	{
		$this->db->where('id_kunjungan', $id);
		$query = $this->db->get('kunjungan');
		return $query->row();
	}

	public function insertKunjungan($data)
	{
		return $this->db->insert('kunjungan', $data);
	}

	public function updateKunjungan($id, $data)
	{
		$this->db->where('id_kunjungan', $id);
		return $this->db->update('kunjungan', $data);
	}

	public function deleteKunjungan($id)
	{
		$this->db->where('id_kunjungan', $id);
		return $this->db->delete('kunjungan');
	}

	public function getKunjunganByPasien($id_pasien)
	{
		$this->db->where('id_pasien', $id_pasien);
		$query = $this->db->get('kunjungan');
		return $query->result();
	}

	public function getKunjunganByDokter($id_dokter)
	{
		$this->db->where('id_dokter', $id_dokter);
		$query = $this->db->get('kunjungan');
		return $query->result();
	}

	public function getKunjunganByPoli($id_poli)
	{
		$this->db->where('id_poli', $id_poli);
		$query = $this->db->get('kunjungan');
		return $query->result();
	}
}
