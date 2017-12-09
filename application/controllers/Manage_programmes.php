<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_programmes extends Security {

	public function index() {
		$data['title'] = "programmes";
		$data['programmes'] = $this -> Globals -> select_all('programmes');
		$this -> load -> view('backend/index', $data);
	}

	public function create_programme() {
		$data['title'] = "Create programme";
		$this -> form_validation -> set_rules('name', 'programme Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('programmes', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New programme  was created success !.');
				redirect('manage_programmes');

			} else {
				$this -> session -> set_flashdata('error', 'New programme  was created fail !.');
				redirect('manage_programmes');
			}
		}
	}

	public function update_programme($id = 0) {
		$data['title'] = "Update programme";
		$this -> form_validation -> set_rules('name', 'programme Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['programme_data'] = $this -> Globals -> select_where('programmes', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('programmes', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'programme selected was updated success !.');
				redirect('manage_programmes');

			} else {
				$this -> session -> set_flashdata('error', 'programme selected was updated fail !.');
				redirect('manage_programmes');
			}
		}
	}

	public function delete_programme($id = 0) {
		$is_deleted = $this -> Globals -> delete('programmes', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'programme selected  was deleted success !.');
			redirect('manage_programmes');

		} else {
			$this -> session -> set_flashdata('error', 'programme selected  was deleted fail !.');
			redirect('manage_programmes');
		}
	}

}
