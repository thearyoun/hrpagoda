<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_houses extends Security {

	public function index() {
		$data['title'] = "houses";
		$data['houses'] = $this -> Globals -> select_all('houses');
		$this -> load -> view('backend/index', $data);
	}

	public function create_house() {
		$data['title'] = "Create house";
		$this -> form_validation -> set_rules('name', 'house Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('houses', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New house  was created success !.');
				redirect('manage_houses');

			} else {
				$this -> session -> set_flashdata('error', 'New house  was created fail !.');
				redirect('manage_houses');
			}
		}
	}

	public function update_house($id = 0) {
		$data['title'] = "Update house";
		$this -> form_validation -> set_rules('name', 'house Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['house_data'] = $this -> Globals -> select_where('houses', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('houses', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'house selected was updated success !.');
				redirect('manage_houses');

			} else {
				$this -> session -> set_flashdata('error', 'house selected was updated fail !.');
				redirect('manage_houses');
			}
		}
	}

	public function delete_house($id = 0) {
		$is_deleted = $this -> Globals -> delete('houses', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'house selected  was deleted success !.');
			redirect('manage_houses');

		} else {
			$this -> session -> set_flashdata('error', 'house selected  was deleted fail !.');
			redirect('manage_houses');
		}
	}

}
