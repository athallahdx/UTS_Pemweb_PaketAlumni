<?php

class Poli_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllPoli()
	{
		$query = $this->db->get('poli');
		return $query->result();
	}

	public function getPoliById($id)
	{
		$query = $this->db->get_where('poli', array('id_poli' => $id));
		return $query->row();
	}

	public function insertPoli($data)
	{
		return $this->db->insert('poli', $data);
	}

	public function updatePoli($id, $data)
	{
		$this->db->where('id_poli', $id);
		return $this->db->update('poli', $data);
	}

	public function deletePoli($id)
	{
		return $this->db->delete('poli', array('id_poli' => $id));
	}
}
