<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_monks extends Security {

	public function index() {
		$data['title'] = "Manage monks";
		
		$arr_where = array('monks.status'=>1);
		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL,$sort=NULL);
		$this -> load -> view('backend/index', $data);
	}

	public function create_monk() {
		
		$data['title'] = "Create monk";
		
		$this -> form_validation -> set_rules('username', 'username', 'required');
		$this -> form_validation -> set_rules('nation', 'nation', 'required');
		$this -> form_validation -> set_rules('nationality', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('use_position_id', 'position', 'required');
		
		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		$this -> form_validation -> set_rules('education', 'education', 'required');
		$this -> form_validation -> set_rules('phone_number', 'phone number', 'required');
		
		$this -> form_validation -> set_rules('vegetarian_date', 'vegetarian date', 'required');
		$this -> form_validation -> set_rules('vegetarian_place', 'vegetarian place', 'required');
		$this -> form_validation -> set_rules('vegetarian_types', 'vegetarian type', 'required');
		$this -> form_validation -> set_rules('vegetarian_year', 'vegetarian year', 'required');
		
		$this -> form_validation -> set_rules('monk_reference', 'monk reference', 'required');
		$this -> form_validation -> set_rules('monk_reference_position', 'monk reference position', 'required');
		$this -> form_validation -> set_rules('monk_reference_phone', 'monk reference phone', 'required');
		$this -> form_validation -> set_rules('monk_current_address', 'monk current address', 'required');
		
		$this -> form_validation -> set_rules('from_pagoda', 'from pagoda', 'required');
		$this -> form_validation -> set_rules('number_of_bro_sis', 'number brother and sister', 'required');
		$this -> form_validation -> set_rules('number_of_brother', 'number of brother', 'required');
		$this -> form_validation -> set_rules('number_of_sister', 'number of sister', 'required');
		$this -> form_validation -> set_rules('child_level', 'child level', 'required');
		
		$this -> form_validation -> set_rules('use_house_id', 'house', '');
		$this -> form_validation -> set_rules('use_location_id', 'location', 'required');
		
		
		//$this -> form_validation -> set_rules('family_status', 'phone number', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_phone', 'father phone', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_phone', 'mother phone', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');
		
		$this -> form_validation -> set_rules('monk_number', 'monk number', '');
		$this -> form_validation -> set_rules('acknow_by', 'acknowledge by', '');
		
		if ($this -> form_validation -> run() === FALSE) {
			$data['groups'] = $this -> Globals -> select_all('groups');
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['positions'] = $this -> Globals -> select_all('positions');
			$data['locations'] = $this -> Globals -> select_all('locations');
			$data['member_types'] = $this -> Globals -> select_all('member_types');
			$this -> load -> view('backend/index', $data);
		} else {
			
			$image_name="";
			$error_upload=FALSE;
			if (!empty($_FILES['userfile']['name'])){
				$config['upload_path'] = './ftemplate/images/';
	            $config['allowed_types'] = 'gif|jpg|jpeg|png';
	            $config['max_size'] = '30000';
	            $this->load->library('upload', $config);
	
	            if (!$this->upload->do_upload()) {
	            	$data['errors']= array('error' => $this->upload->display_errors());
					$error_upload=TRUE;
	                $this->load->view('backend/index',$data);
	            } else {
	
	                $data = $this->upload->data();
					
	                $image_name = $data['file_name'];

				}
				
			}
			
			
			if($error_upload!=TRUE){
				$date_of_birth = date("Y-m-d", strtotime($this -> input -> post('date_of_birth')));
				$vegetarian_date = date("Y-m-d", strtotime($this -> input -> post('vegetarian_date')));
				$stay_date = date("Y-m-d", strtotime($this -> input -> post('stay_date')));
				
				$data = array(
					'username' => $this -> input -> post('username', TRUE), 
					'nation' => $this -> input -> post('nation', TRUE),
					'nationality' => $this -> input -> post('nationality', TRUE),
					'date_of_birth' => $date_of_birth,
					'use_position_id' => $this -> input -> post('use_position_id', TRUE),
					'place_of_birth' => $this -> input -> post('place_of_birth', TRUE),			
					
					'current_address' => $this -> input -> post('current_address', TRUE),
					'education' => $this -> input -> post('education', TRUE),
					'phone_number' => $this -> input -> post('phone_number', TRUE),
					'use_group_id'=>$this->input->post('group'),
					'vegetarian_date' => $vegetarian_date,
					'vegetarian_place' => $this -> input -> post('vegetarian_place', TRUE),
					'vegetarian_types' => $this -> input -> post('vegetarian_types', TRUE),
					'vegetarian_year' => $this -> input -> post('vegetarian_year', TRUE),
					'monk_reference' => $this -> input -> post('monk_reference', TRUE),
					'monk_reference_position' => $this -> input -> post('monk_reference_position', TRUE),
					'monk_reference_phone' => $this -> input -> post('monk_reference_phone', TRUE),
					'monk_current_address' => $this -> input -> post('monk_current_address', TRUE),
		
					'father_name' => $this -> input -> post('father_name', TRUE),
					'father_occupation' => $this -> input -> post('father_occupation', TRUE),
					'father_phone' => $this -> input -> post('father_phone', TRUE),
					'father_address' => $this -> input -> post('father_address', TRUE),
					'mother_name' => $this -> input -> post('mother_name', TRUE),
					'mother_occupation' => $this -> input -> post('mother_occupation', TRUE),
					'mother_phone' => $this -> input -> post('mother_phone', TRUE),
					'mother_address' => $this -> input -> post('mother_address', TRUE),
					
					'from_pagoda' => $this -> input -> post('from_pagoda', TRUE),
					'number_of_bro_sis' => $this -> input -> post('number_of_bro_sis', TRUE),
					'number_of_brother' => $this -> input -> post('number_of_brother', TRUE),
					'number_of_sister' => $this -> input -> post('number_of_sister', TRUE),
					'child_level' => $this -> input -> post('child_level', TRUE),
					'use_house_id' => $this -> input -> post('use_house_id', TRUE),
					'use_location_id' => $this -> input -> post('use_location_id', TRUE),
					'photo' => $image_name,
					'stay_date' => $stay_date,
					'monk_number' => $this -> input -> post('monk_number', TRUE),
					'acknow_by' => $this -> input -> post('acknow_by', TRUE),
					'status' => 1, 
					'created_at' => null
				);
	
				$is_last_id = $this -> Globals -> insert_get_last_id('monks', $data);
				if ($is_last_id) {
					
					$group_data = array(
					'use_group_id'=>$this->input->post('group'),
					'use_monk_id'=>$is_last_id,
					'status'=>1,
					'created_at'=>null
					);
					$this -> Globals -> insert('monk_groups', $group_data);
					
					$this -> session -> set_flashdata('success', "monk account was created successfully.");
					redirect('manage_monks/create_monk');
				} else {
					
					$this -> session -> set_flashdata('error', 'monk account  was created fail.');
					redirect('manage_monks/create_monk');
				}
			}
			
		}

	}

	public function update_monk($monk_id = 0) {
		$data['title'] = "Update monk";
		
		$this -> form_validation -> set_rules('username', 'username', 'required');
		$this -> form_validation -> set_rules('nation', 'nation', 'required');
		$this -> form_validation -> set_rules('nationality', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('use_position_id', 'position', 'required');
		
		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		$this -> form_validation -> set_rules('education', 'education', 'required');
		$this -> form_validation -> set_rules('phone_number', 'phone number', 'required');
		
		$this -> form_validation -> set_rules('vegetarian_date', 'vegetarian date', 'required');
		$this -> form_validation -> set_rules('vegetarian_place', 'vegetarian place', 'required');
		$this -> form_validation -> set_rules('vegetarian_types', 'vegetarian type', 'required');
		$this -> form_validation -> set_rules('vegetarian_year', 'vegetarian year', 'required');
		
		$this -> form_validation -> set_rules('monk_reference', 'monk reference', 'required');
		$this -> form_validation -> set_rules('monk_reference_position', 'monk reference position', 'required');
		$this -> form_validation -> set_rules('monk_reference_phone', 'monk reference phone', 'required');
		$this -> form_validation -> set_rules('monk_current_address', 'monk current address', 'required');
		
		$this -> form_validation -> set_rules('from_pagoda', 'from pagoda', 'required');
		$this -> form_validation -> set_rules('number_of_bro_sis', 'number brother and sister', 'required');
		$this -> form_validation -> set_rules('number_of_brother', 'number of brother', 'required');
		$this -> form_validation -> set_rules('number_of_sister', 'number of sister', 'required');
		$this -> form_validation -> set_rules('child_level', 'child level', 'required');
		
		$this -> form_validation -> set_rules('use_house_id', 'house', '');
		$this -> form_validation -> set_rules('use_location_id', 'location', 'required');
		
		
		//$this -> form_validation -> set_rules('family_status', 'phone number', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_phone', 'father phone', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_phone', 'mother phone', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');
		
		$this -> form_validation -> set_rules('monk_number', 'monk number', '');
		$this -> form_validation -> set_rules('acknow_by', 'acknowledge by', '');
		
		if ($this -> form_validation -> run() === FALSE) {
			$data['groups'] = $this -> Globals -> select_all('groups');
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['positions'] = $this -> Globals -> select_all('positions');
			$data['locations'] = $this -> Globals -> select_all('locations');
			$data['member_types'] = $this -> Globals -> select_all('member_types');
			$data['monk'] = $this -> Globals -> select_where('monks',array('id'=>$monk_id));
			$data['monk_group_info'] = $this -> Globals -> select_where('monk_groups',array('use_monk_id'=>$monk_id));
			$this -> load -> view('backend/index', $data);
		} else {
			
			$image_name="";
			$error_upload=FALSE;
			if (!empty($_FILES['userfile']['name'])){
				$config['upload_path'] = './ftemplate/images/';
	            $config['allowed_types'] = 'gif|jpg|jpeg|png';
	            $config['max_size'] = '30000';
	            $this->load->library('upload', $config);
	
	            if (!$this->upload->do_upload()) {
	            	$data['errors']= array('error' => $this->upload->display_errors());
					$error_upload=TRUE;
	                $this->load->view('backend/index',$data);
	            } else {
	
	                $data = $this->upload->data();
					
	                $image_name = $data['file_name'];

				}
				
			}
			
			
			if($error_upload!=TRUE ){
				$date_of_birth = date("Y-m-d", strtotime($this -> input -> post('date_of_birth')));
				$vegetarian_date = date("Y-m-d", strtotime($this -> input -> post('vegetarian_date')));
				$stay_date = date("Y-m-d", strtotime($this -> input -> post('stay_date')));
				
				$leave_date = $this -> input -> post('leave_date');
				
				$data = array(
					'username' => $this -> input -> post('username', TRUE), 
					'nation' => $this -> input -> post('nation', TRUE),
					'nationality' => $this -> input -> post('nationality', TRUE),
					'date_of_birth' => $date_of_birth,
					'use_position_id' => $this -> input -> post('use_position_id', TRUE),
					'place_of_birth' => $this -> input -> post('place_of_birth', TRUE),			
					
					'current_address' => $this -> input -> post('current_address', TRUE),
					'education' => $this -> input -> post('education', TRUE),
					'phone_number' => $this -> input -> post('phone_number', TRUE),
					
					'vegetarian_date' => $vegetarian_date,
					'vegetarian_place' => $this -> input -> post('vegetarian_place', TRUE),
					'vegetarian_types' => $this -> input -> post('vegetarian_types', TRUE),
					'vegetarian_year' => $this -> input -> post('vegetarian_year', TRUE),
					'monk_reference' => $this -> input -> post('monk_reference', TRUE),
					'monk_reference_position' => $this -> input -> post('monk_reference_position', TRUE),
					'monk_reference_phone' => $this -> input -> post('monk_reference_phone', TRUE),
					'monk_current_address' => $this -> input -> post('monk_current_address', TRUE),
		
					'father_name' => $this -> input -> post('father_name', TRUE),
					'father_occupation' => $this -> input -> post('father_occupation', TRUE),
					'father_phone' => $this -> input -> post('father_phone', TRUE),
					'father_address' => $this -> input -> post('father_address', TRUE),
					'mother_name' => $this -> input -> post('mother_name', TRUE),
					'mother_occupation' => $this -> input -> post('mother_occupation', TRUE),
					'mother_phone' => $this -> input -> post('mother_phone', TRUE),
					'mother_address' => $this -> input -> post('mother_address', TRUE),
					'use_group_id'=>$this->input->post('group'),
					'from_pagoda' => $this -> input -> post('from_pagoda', TRUE),
					'number_of_bro_sis' => $this -> input -> post('number_of_bro_sis', TRUE),
					'number_of_brother' => $this -> input -> post('number_of_brother', TRUE),
					'number_of_sister' => $this -> input -> post('number_of_sister', TRUE),
					'child_level' => $this -> input -> post('child_level', TRUE),
					'use_house_id' => $this -> input -> post('use_house_id', TRUE),
					'use_location_id' => $this -> input -> post('use_location_id', TRUE),
					'stay_date' => $stay_date,
					'monk_number' => $this -> input -> post('monk_number', TRUE),
					'acknow_by' => $this -> input -> post('acknow_by', TRUE)
				);
				if($leave_date!=""){
					
					$leave_date=date("Y-m-d", strtotime($leave_date));
					$data['leave_date'] = $leave_date;
				
				}
				//die($image_name);
				if($image_name!=""){
					$data['photo'] = $image_name;
				}
	
				$isUpdated = $this -> Globals -> update('monks', $data, array('id'=>$monk_id));
				if ($isUpdated) {
					$group_data = array(
					'use_group_id'=>$this->input->post('group')
					);
					$this -> Globals -> update('monk_groups', $group_data,array('use_monk_id'=>$monk_id));
					$this -> session -> set_flashdata('success', "monk account was updated successfully.");
					redirect('manage_monks');
				} else {
					
					$this -> session -> set_flashdata('error', 'monk account  was updated fail.');
					redirect('manage_monks');
				}	
			}
			
		}

	

	}

	public function delete_monk($monk_id = 0) {
		$isDeleted = $this -> Globals -> delete('monks', array('id' => $monk_id));
		if ($isDeleted) {
			
			$this -> session -> set_flashdata('success', 'monk account  was deleted success !.');
			redirect('manage_monks');

		} else {
			$this -> session -> set_flashdata('error', 'monk account  was deleted fail !.');
			redirect('manage_monks');
		}
	}

}
