<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_attendants extends Security {

	public function index() {
		
		$data['title'] = "Manage Attendants";
		$this->load->model('Custom_model');
		$data['attendants'] = $this -> Custom_model -> get_attendants();
		//$data['attendants'] = $this -> Globals -> select_all('attendants');
		$this -> load -> view('backend/index', $data);
	}

	public function create_attendant() {
		
		$data['title'] = "Create Attendant";
		
		$this -> form_validation -> set_rules('use_programme_id', 'programme', 'required');
		$this -> form_validation -> set_rules('times', 'times', 'required');
		$this -> form_validation -> set_rules('date', 'date', 'required');		
	
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where = array('monks.status'=>1), $limit = NULL,$sort=NULL);
			$data['programmes'] = $this -> Globals -> select_all('programmes');
			$this -> load -> view('backend/index', $data);
		} else {
			$monks= $this -> Globals -> select_all('monks');
			$array_monks= array();
			
			$use_programme_id = $this->input->post('use_programme_id');
			$time = $this->input->post('times');
			$date = date("Y-m-d", strtotime($this -> input -> post('date')));
			$attendants = $this->input->post('attendants');
			$take_leaves = $this->input->post('take_leaves');
			if($attendants == null){
				$attendants = array();
			}
			if($take_leaves == null){
				$take_leaves = array();
			}
			
			foreach($monks->result() as $row){
				$present = 0;
				$leave = 0;
				if (in_array($row->id, $attendants)){
				  	$present =  1;
				}
				if (in_array($row->id, $take_leaves)){
				  	$leave =  1;
				}
				
				$data = array(
				'use_programme_id'=> $use_programme_id,
				'use_monk_id'=> $row->id,
				'times'=> $time,
				'date'=> $date,
				'present'=> $present,
				'is_take_leave'=> $leave,
				'status' => 1,
				'created_at'=> null
				);
				$isInserted = $this -> Globals -> insert('attendants', $data);
			}
			
			if ($isInserted) {

				$this -> session -> set_flashdata('success', "Attendant was created successfully.");
				redirect('manage_attendants/create_attendant');
			} else {
				
				$this -> session -> set_flashdata('error', 'Attendant  was created fail.');
				redirect('manage_attendants/create_attendant');
			}
		}

	}

	public function update_attendant($attendant_id = 0) {
		$data['title'] = "Update Attendant";
		
		$data['title'] = "Create Attendant";
		
		$this -> form_validation -> set_rules('use_programme_id', 'programme', 'required');
		$this -> form_validation -> set_rules('times', 'times', 'required');
		$this -> form_validation -> set_rules('date', 'date', 'required');		
				
				
		if ($this -> form_validation -> run() === FALSE) {
			$monk_info = $this->Globals->select_join_get_only_fields('monks',array('attendants.*,username,nation,phone_number,houses.name as house_name,locations.name as location_name'),array('attendants' => array('id' => 'use_monk_id'),'houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')),'inner',array('attendants.id' => $attendant_id,'monks.status'=>1),'30');
			//$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL,$sort=NULL);
			$data['monk'] = $monk_info;
			$data['programmes'] = $this -> Globals -> select_all('programmes');
			$this -> load -> view('backend/index', $data);
		} else {						
			//$monks= $this -> Globals -> select_all('monks');
			
			$use_programme_id = $this->input->post('use_programme_id');
			$time = $this->input->post('times');
			$date = date("Y-m-d", strtotime($this -> input -> post('date')));
			$use_monk_id = $this->input->post('monk_id');
			$attendant = $this->input->post('attendant');
			$take_leaves = $this->input->post('take_leaves');
			
										
			$data = array(
			'use_programme_id'=> $use_programme_id,
			'use_monk_id'=> $use_monk_id,
			'times'=> $time,
			'date'=> $date,
			'present'=> $attendant,
			'is_take_leave'=> $take_leaves,
			'status' => 1,
			'created_at'=> null
			);
			$isUpdated = $this -> Globals -> update('attendants', $data,array('id'=> $attendant_id));						
			if ($isUpdated) {

				$this -> session -> set_flashdata('success', "Attendant was updated successfully.");
				redirect('manage_attendants');
			} else {
				
				$this -> session -> set_flashdata('error', 'Attendant  was updated fail.');
				redirect('manage_attendants');
			}
		}

	}

	public function delete_attendant($attendant_id = 0) {
		$isDeleted = $this -> Globals -> delete('attendants', array('id' => $attendant_id));
		if ($isDeleted) {
			
			$this -> session -> set_flashdata('success', 'Attendant  was deleted success !.');
			redirect('manage_attendants');

		} else {
			$this -> session -> set_flashdata('error', 'Attendant  was deleted fail !.');
			redirect('manage_attendants');
		}
	}

}