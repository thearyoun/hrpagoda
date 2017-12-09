<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_member_take_leaves extends Security {

	public function index() {
		
		$data['title'] = "Manage member take leaves";
		$this->load->model('Custom_model');
		$data['member_take_leaves'] = $this -> Custom_model -> get_member_take_leaves();
		$this -> load -> view('backend/index', $data);
	}

	public function create_member_take_leave() {
		
		$data['title'] = "Create member";
		
		$this -> form_validation -> set_rules('use_member_id', 'member', 'required');
		$this -> form_validation -> set_rules('use_handle_by_id', 'handle by', 'required');
		$this -> form_validation -> set_rules('use_leave_type_id', 'leave type', 'required');
		$this -> form_validation -> set_rules('request_date', 'request date', 'required');
		$this -> form_validation -> set_rules('from_date', 'from date', 'required');
		$this -> form_validation -> set_rules('to_date', 'to date', 'required');
		$this -> form_validation -> set_rules('reason', 'reason', '');
		$this -> form_validation -> set_rules('notes', 'notes', '');
	
		
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['monks'] = $this -> Globals -> select_where('monks', array('status'=>1));
			$data['members'] = $this -> Globals -> select_where('members', array('status'=>1));
			$data['leave_types'] = $this -> Globals -> select_all('leave_types');
			$this -> load -> view('backend/index', $data);
		} else {
			
			$from_date = date("Y-m-d", strtotime($this -> input -> post('from_date')));
			$to_date = date("Y-m-d", strtotime($this -> input -> post('to_date')));
			$request_date = date("Y-m-d", strtotime($this -> input -> post('request_date')));
			
			$data = array(
				'use_member_id' => $this -> input -> post('use_member_id', TRUE), 
				'use_handle_by_id' =>  $this -> input -> post('use_handle_by_id', TRUE), 
				'use_leave_type_id' => $this -> input -> post('use_leave_type_id', TRUE),
				'from_date' => $from_date,
				'to_date' => $to_date,
				'reason' => $this -> input -> post('reason', TRUE),			
				'notes' => $this -> input -> post('notes', TRUE),
				'request_date' => $request_date,
				'status' => 'Pending',
				'created_at' => null
			);

			$isInserted = $this -> Globals -> insert('member_take_leaves', $data);
			if ($isInserted) {

				$this -> session -> set_flashdata('success', "Member take leave was created successfully.");
				redirect('manage_member_take_leaves/create_member_take_leave');
			} else {
				
				$this -> session -> set_flashdata('error', 'Member take leave  was created fail.');
				redirect('manage_member_take_leaves/create_member_take_leave');
			}
		}

	}

	public function update_member_take_leave($take_leave_id = 0) {
		$data['title'] = "Update Member Take Leave";
		
		$this -> form_validation -> set_rules('use_member_id', 'member', 'required');
		$this -> form_validation -> set_rules('use_handle_by_id', 'handle by', 'required');
		$this -> form_validation -> set_rules('use_leave_type_id', 'leave type', 'required');
		$this -> form_validation -> set_rules('request_date', 'request date', 'required');
		$this -> form_validation -> set_rules('from_date', 'from date', 'required');
		$this -> form_validation -> set_rules('to_date', 'to date', 'required');
		$this -> form_validation -> set_rules('reason', 'reason', '');
		$this -> form_validation -> set_rules('notes', 'notes', '');
	
		
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['monks'] = $this -> Globals -> select_where('monks', array('status'=>1));
			$data['members'] = $this -> Globals -> select_where('members', array('status'=>1));
			$data['leave_types'] = $this -> Globals -> select_all('leave_types');
			$data['member_take_leave'] = $this -> Globals -> select_where('member_take_leaves',array('id'=> $take_leave_id));
			
			$this -> load -> view('backend/index', $data);
		} else {
			
			$from_date = date("Y-m-d", strtotime($this -> input -> post('from_date')));
			$to_date = date("Y-m-d", strtotime($this -> input -> post('to_date')));
			$request_date = date("Y-m-d", strtotime($this -> input -> post('request_date')));
			
			$data = array(
				'use_member_id' => $this -> input -> post('use_member_id', TRUE), 
				'use_handle_by_id' =>  $this -> input -> post('use_handle_by_id', TRUE), 
				'use_leave_type_id' => $this -> input -> post('use_leave_type_id', TRUE),
				'from_date' => $from_date,
				'to_date' => $to_date,
				'reason' => $this -> input -> post('reason', TRUE),			
				'notes' => $this -> input -> post('notes', TRUE),
				'request_date' => $request_date,
				'status' => 'Pending', 
				'created_at' => null
			);

			$isUpdated = $this -> Globals -> update('member_take_leaves', $data, array('id'=> $take_leave_id));
			if ($isUpdated) {

				$this -> session -> set_flashdata('success', "Member take leave was updated successfully.");
				redirect('manage_member_take_leaves');
			} else {
				
				$this -> session -> set_flashdata('error', 'Member take leave  was updated fail.');
				redirect('manage_member_take_leaves');
			}
		}

	}

	public function delete_member_take_leave($take_leave_id = 0) {
		$isDeleted = $this -> Globals -> delete('member_take_leaves', array('id' => $take_leave_id));
		if ($isDeleted) {
			
			$this -> session -> set_flashdata('success', 'Member take leave  was deleted success !.');
			redirect('manage_member_take_leaves');

		} else {
			$this -> session -> set_flashdata('error', 'Member take leave  was deleted fail !.');
			redirect('manage_member_take_leaves');
		}
	}

}