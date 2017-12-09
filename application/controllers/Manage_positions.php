<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_positions extends Security {

	public function index() {
		$data['title'] = "positions";
		$data['positions'] = $this -> Globals -> select_all('positions');
		$this -> load -> view('backend/index', $data);
	}

	public function create_position() {
		$data['title'] = "Create position";
		$this -> form_validation -> set_rules('name', 'position Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('positions', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New position  was created success !.');
				redirect('manage_positions');

			} else {
				$this -> session -> set_flashdata('error', 'New position  was created fail !.');
				redirect('manage_positions');
			}
		}
	}

	public function update_position($id = 0) {
		$data['title'] = "Update position";
		$this -> form_validation -> set_rules('name', 'position Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['position_data'] = $this -> Globals -> select_where('positions', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('positions', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'position selected was updated success !.');
				redirect('manage_positions');

			} else {
				$this -> session -> set_flashdata('error', 'position selected was updated fail !.');
				redirect('manage_positions');
			}
		}
	}

	public function delete_position($id = 0) {
		$is_deleted = $this -> Globals -> delete('positions', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'position selected  was deleted success !.');
			redirect('manage_positions');

		} else {
			$this -> session -> set_flashdata('error', 'position selected  was deleted fail !.');
			redirect('manage_positions');
		}
	}

}
