<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_leave_types extends Security {

	public function index() {
		$data['title'] = "leave_types";
		$data['leave_types'] = $this -> Globals -> select_all('leave_types');
		$this -> load -> view('backend/index', $data);
	}

	public function create_leave_type() {
		$data['title'] = "Create leave_type";
		$this -> form_validation -> set_rules('name', 'leave_type Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => date("Y-m-d H:i:s"));

			$is_inserted = $this -> Globals -> insert('leave_types', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New leave_type  was created success !.');
				redirect('manage_leave_types');

			} else {
				$this -> session -> set_flashdata('error', 'New leave_type  was created fail !.');
				redirect('manage_leave_types');
			}
		}
	}

	public function update_leave_type($id = 0) {
		$data['title'] = "Update leave_type";
		$this -> form_validation -> set_rules('name', 'leave_type Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['leave_type_data'] = $this -> Globals -> select_where('leave_types', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('leave_types', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'leave_type selected was updated success !.');
				redirect('manage_leave_types');

			} else {
				$this -> session -> set_flashdata('error', 'leave_type selected was updated fail !.');
				redirect('manage_leave_types');
			}
		}
	}

	public function delete_leave_type($id = 0) {
		$is_deleted = $this -> Globals -> delete('leave_types', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'leave_type selected  was deleted success !.');
			redirect('manage_leave_types');

		} else {
			$this -> session -> set_flashdata('error', 'leave_type selected  was deleted fail !.');
			redirect('manage_leave_types');
		}
	}

}
