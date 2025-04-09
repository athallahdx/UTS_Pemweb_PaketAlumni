<?php

class Auth_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register($data)
	{
		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			$user = $query->row();
			if (password_verify($password, $user->password)) {
				return $user;
			}
		}

		return false;
	}
}
