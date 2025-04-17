<?php

class Kunjungan_models extends CI_Model
{
	protected $table = 'kunjungan';
	protected $primaryKey = 'id_kunjungan';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Get all records
	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	// Get by primary key
	public function getById($id)
	{
		return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
	}

	// Insert a new record
	public function insert(array $data)
	{
		return $this->db->insert($this->table, $data);
	}

	// Update a record
	public function update($id, array $data)
	{
		return $this->db->update($this->table, $data, [$this->primaryKey => $id]);
	}

	// Delete a record
	public function delete($id)
	{
		return $this->db->delete($this->table, [$this->primaryKey => $id]);
	}

	// Get by a specific column
	private function getByColumn($column, $value)
	{
		return $this->db->get_where($this->table, [$column => $value])->result();
	}

	// Specific get methods using getByColumn
	public function getByUser($id_user)
	{
		return $this->getByColumn('id_user', $id_user);
	}

	public function getByPasien($id_pasien)
	{
		return $this->getByColumn('id_pasien', $id_pasien);
	}

	public function getByDokter($id_dokter)
	{
		return $this->getByColumn('id_dokter', $id_dokter);
	}

	public function getByPoli($id_poli)
	{
		return $this->getByColumn('id_poli', $id_poli);
	}
}
