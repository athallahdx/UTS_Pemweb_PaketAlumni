<?php

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->model('Department_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['title'] = 'Data Mahasiswa';
		$data['content'] = 'mahasiswa/index';
		$data['students'] = $this->Mahasiswa_model->get_all_students_with_departement();
		$data['departments'] = $this->Department_model->get_all_departments();
		$this->load->view('layouts/main', $data);
	}

	public function create() {
		$this->load->library('form_validation');

		// Validation rules for the form fields
		$this->form_validation->set_rules('student_id', 'Student ID', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('department_id', 'Department', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('year_entry', 'Year Entry', 'required|exact_length[10]');

		// Make 'year_graduation' optional
		$this->form_validation->set_rules('year_graduation', 'Year Graduation', 'exact_length[10]');  // Optional, if provided.

		if ($this->form_validation->run() == FALSE) {
			// If validation fails, redirect back with errors
			$this->session->set_flashdata('error', validation_errors());
			redirect('mahasiswa');
		} else {
			// If validation passes, prepare the data for insertion
			$data = [
				'student_id' => $this->input->post('student_id', TRUE),
				'full_name' => $this->input->post('full_name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone_number' => $this->input->post('phone_number', TRUE),
				'department_id' => $this->input->post('department_id', TRUE),
				'status' => $this->input->post('status', TRUE),
				'year_entry' => $this->input->post('year_entry', TRUE),
				'year_graduation' => $this->input->post('year_graduation', TRUE) ?: NULL
			];
			if ($this->Mahasiswa_model->insert_student($data)) {
				$this->session->set_flashdata('success', 'Student added successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to add student.');
			}
			redirect('mahasiswa');
		}
	}

	public function update($id)
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('student_id', 'Student ID', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('department_id', 'Department', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('year_entry', 'Year Entry', 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');

		// Only validate graduation date if it's not empty
		if ($this->input->post('year_graduation')) {
			$this->form_validation->set_rules('year_graduation', 'Year Graduation', 'regex_match[/^\d{4}-\d{2}-\d{2}$/]');
		}

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('mahasiswa');
		} else {
			$data = [
				'student_id' => $this->input->post('student_id', TRUE),
				'full_name' => $this->input->post('full_name', TRUE),
				'email' => $this->input->post('email', TRUE),
				'phone_number' => $this->input->post('phone_number', TRUE),
				'department_id' => $this->input->post('department_id', TRUE),
				'status' => $this->input->post('status', TRUE),
				'year_entry' => $this->input->post('year_entry', TRUE),
			];

			// Only include graduation year if it's filled
			$yearGraduation = $this->input->post('year_graduation', TRUE);
			if (!empty($yearGraduation)) {
				$data['year_graduation'] = $yearGraduation;
			}

			$this->Mahasiswa_model->update_student($id, $data);

			$this->session->set_flashdata('success', 'Student updated successfully.');
			$this->index();
		}
	}


	public function delete($id){
		$this->Mahasiswa_model->delete_student($id);
		redirect('mahasiswa');
	}
}
