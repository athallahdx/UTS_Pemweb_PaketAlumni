<?php

class Department_model extends CI_Model {

	protected $table = 'departments';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_all_departments() {
		return $this->db->get('departments')->result();
	}
}
