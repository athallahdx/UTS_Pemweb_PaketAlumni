<?php

class Dokter_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_dokter()
	{
		$query = $this->db->get('dokter');
		return $query->result();
	}

	public function get_dokter_by_id($id)
	{
		$query = $this->db->get_where('dokter', array('id_dokter' => $id));
		return $query->row();
	}

	public function insert_dokter($data)
	{
		return $this->db->insert('dokter', $data);
	}

	public function update_dokter($id, $data)
	{
		$this->db->where('id_dokter', $id);
		return $this->db->update('dokter', $data);
	}

	public function delete_dokter($id)
	{
		$this->db->where('id_dokter', $id);
		return $this->db->delete('dokter');
	}
}
