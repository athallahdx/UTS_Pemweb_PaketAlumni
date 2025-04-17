<?php

class Mahasiswa_model extends CI_Model {
	protected $table = 'students';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_all_students() {
		return $this->db->get($this->table)->result();
	}

	public function get_all_students_with_departement() {
		$this->db->select('students.*, departments.id as department_id, departments.name as department_name');
		$this->db->from('students'); // Main table
		$this->db->join('departments', 'departments.id = students.department_id', 'left');

		return $this->db->get()->result();
	}

	public function get_all_students_alumni_with_departement() {
		$this->db->select('students.*, departments.id as department_id, departments.name as department_name');
		$this->db->from('students'); // Main table
		$this->db->join('departments', 'departments.id = students.department_id', 'left');
		$this->db->where('students.status', 'alumni');

		return $this->db->get()->result();
	}


	public function get_students_by_id($id) {
		return $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
	}

	public function insert_student($data) {
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows() > 0;
	}

	public function update_student($id, $data) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete_student($id) {
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}

	public function get_student_by_nim($nim) {
		$this->db->where('student_id', $nim);
		return $this->db->get($this->table)->row();
	}
}
