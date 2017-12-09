<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_lines extends Security {

	public function index() {
		$data['title'] = "groups";
		$data['lines'] = $this -> Globals -> select_all('groups');
		$this -> load -> view('backend/index', $data);
	}

	public function create_line() {
		$data['title'] = "Create line";
		$this -> form_validation -> set_rules('name', 'line Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('groups', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New line  was created success !.');
				redirect('manage_lines');

			} else {
				$this -> session -> set_flashdata('error', 'New line  was created fail !.');
				redirect('manage_lines');
			}
		}
	}

	public function update_line($id = 0) {
		$data['title'] = "Update line";
		$this -> form_validation -> set_rules('name', 'line Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['line_data'] = $this -> Globals -> select_where('groups', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('groups', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'line selected was updated success !.');
				redirect('manage_lines');

			} else {
				$this -> session -> set_flashdata('error', 'line selected was updated fail !.');
				redirect('manage_lines');
			}
		}
	}

	public function delete_line($id = 0) {
		$is_deleted = $this -> Globals -> delete('groups', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'line selected  was deleted success !.');
			redirect('manage_lines');

		} else {
			$this -> session -> set_flashdata('error', 'line selected  was deleted fail !.');
			redirect('manage_lines');
		}
	}

}
