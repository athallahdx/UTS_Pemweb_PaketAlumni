<?php

class Pasien_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllPasien()
	{
		$query = $this->db->get('pasien');
		return $query->result();
	}

	public function getAllPasienByUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('pasien');
		return $query->result();
	}

	public function getPasienById($id)
	{
		$this->db->where('id_pasien', $id);
		$query = $this->db->get('pasien');
		return $query->row();
	}

	public function insertPasien($data)
	{
		return $this->db->insert('pasien', $data);
	}

	public function updatePasien($id, $data)
	{
		$this->db->where('id_pasien', $id);
		return $this->db->update('pasien', $data);
	}

	public function deletePasien($id)
	{
		$this->db->where('id_pasien', $id);
		return $this->db->delete('pasien');
	}
}
