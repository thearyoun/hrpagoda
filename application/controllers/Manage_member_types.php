<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_member_types extends Security {

	public function index() {
		$data['title'] = "member_types";
		$data['member_types'] = $this -> Globals -> select_all('member_types');
		$this -> load -> view('backend/index', $data);
	}

	public function create_member_type() {
		$data['title'] = "Create member_type";
		$this -> form_validation -> set_rules('name', 'member_type Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('member_types', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New member_type  was created success !.');
				redirect('manage_member_types');

			} else {
				$this -> session -> set_flashdata('error', 'New member_type  was created fail !.');
				redirect('manage_member_types');
			}
		}
	}

	public function update_member_type($id = 0) {
		$data['title'] = "Update member_type";
		$this -> form_validation -> set_rules('name', 'member_type Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['member_type_data'] = $this -> Globals -> select_where('member_types', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('member_types', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'member_type selected was updated success !.');
				redirect('manage_member_types');

			} else {
				$this -> session -> set_flashdata('error', 'member_type selected was updated fail !.');
				redirect('manage_member_types');
			}
		}
	}

	public function delete_member_type($id = 0) {
		$is_deleted = $this -> Globals -> delete('member_types', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'member_type selected  was deleted success !.');
			redirect('manage_member_types');

		} else {
			$this -> session -> set_flashdata('error', 'member_type selected  was deleted fail !.');
			redirect('manage_member_types');
		}
	}

}
