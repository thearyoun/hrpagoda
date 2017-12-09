<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_departments extends Security {

	public function index() {
		$data['title'] = "departments";
		$data['departments'] = $this -> Globals -> select_all('departments');
		$this -> load -> view('backend/index', $data);
	}

	public function create_department() {
		$data['title'] = "Create department";
		$this -> form_validation -> set_rules('name', 'department Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('departments', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New department  was created success !.');
				redirect('manage_departments');

			} else {
				$this -> session -> set_flashdata('error', 'New department  was created fail !.');
				redirect('manage_departments');
			}
		}
	}

	public function update_department($id = 0) {
		$data['title'] = "Update department";
		$this -> form_validation -> set_rules('name', 'department Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['department_data'] = $this -> Globals -> select_where('departments', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('departments', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'department selected was updated success !.');
				redirect('manage_departments');

			} else {
				$this -> session -> set_flashdata('error', 'department selected was updated fail !.');
				redirect('manage_departments');
			}
		}
	}

	public function delete_department($id = 0) {
		$is_deleted = $this -> Globals -> delete('departments', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'department selected  was deleted success !.');
			redirect('manage_departments');

		} else {
			$this -> session -> set_flashdata('error', 'department selected  was deleted fail !.');
			redirect('manage_departments');
		}
	}

}
