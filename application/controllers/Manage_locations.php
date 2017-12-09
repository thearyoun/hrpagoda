<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_locations extends Security {

	public function index() {
		$data['title'] = "locations";
		$data['locations'] = $this -> Globals -> select_all('locations');
		$this -> load -> view('backend/index', $data);
	}

	public function create_location() {
		$data['title'] = "Create location";
		$this -> form_validation -> set_rules('name', 'location Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE), 'created_at' => null);

			$is_inserted = $this -> Globals -> insert('locations', $data);
			if ($is_inserted) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'New location  was created success !.');
				redirect('manage_locations');

			} else {
				$this -> session -> set_flashdata('error', 'New location  was created fail !.');
				redirect('manage_locations');
			}
		}
	}

	public function update_location($id = 0) {
		$data['title'] = "Update location";
		$this -> form_validation -> set_rules('name', 'location Name', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$data['location_data'] = $this -> Globals -> select_where('locations', array('id' => $id));
			$this -> load -> view('backend/index', $data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data = array('name' => $this -> input -> post('name', TRUE), 'description' => $this -> input -> post('description', TRUE),
			//'password'=>sha1($this->input->post('password',TRUE)),
			'status' => $this -> input -> post('status', TRUE));

			$is_updated = $this -> Globals -> update('locations', $data, array('id' => $id));
			if ($is_updated) {
				//$activation_key=random_string('alnum', 12);
				//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'location selected was updated success !.');
				redirect('manage_locations');

			} else {
				$this -> session -> set_flashdata('error', 'location selected was updated fail !.');
				redirect('manage_locations');
			}
		}
	}

	public function delete_location($id = 0) {
		$is_deleted = $this -> Globals -> delete('locations', array('id' => $id));
		if ($is_deleted) {
			//$activation_key=random_string('alnum', 12);
			//$email=$this->input->post('email');
			$this -> session -> set_flashdata('success', 'location selected  was deleted success !.');
			redirect('manage_locations');

		} else {
			$this -> session -> set_flashdata('error', 'location selected  was deleted fail !.');
			redirect('manage_locations');
		}
	}

}
