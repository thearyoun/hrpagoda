<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_members extends Security {

	public function index() {
		
		$data['title'] = "Manage members";
		
		$arr_where = array('members.status'=>1);
		$data['members'] = $this -> Globals -> select_where('members',$arr_where);
		$this -> load -> view('backend/index', $data);
	}

	public function create_member() {
		
		$data['title'] = "Create member";
		
		$this -> form_validation -> set_rules('username', 'username', 'required');
		$this -> form_validation -> set_rules('gender', 'gender', 'required');
		$this -> form_validation -> set_rules('nation', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		$this -> form_validation -> set_rules('education', 'education', 'required');
		$this -> form_validation -> set_rules('phone_number', 'phone number', 'required');
		$this -> form_validation -> set_rules('family_status', 'phone number', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_phone', 'father phone', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_phone', 'mother phone', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		$this -> form_validation -> set_rules('monk_response_id', 'monk response', 'required');
		$this -> form_validation -> set_rules('position', 'Positon', 'required');
		$this -> form_validation -> set_rules('identify_card', 'identify card', 'required');
		
		$this -> form_validation -> set_rules('student_type', 'student type', '');
		$this -> form_validation -> set_rules('study_at', 'study at', '');
		$this -> form_validation -> set_rules('year', 'year', '');
		$this -> form_validation -> set_rules('generation', 'generation', '');
		$this -> form_validation -> set_rules('group', 'group', '');
		$this -> form_validation -> set_rules('school_address', 'school address', '');
		$this -> form_validation -> set_rules('work_type', 'work type', '');
		$this -> form_validation -> set_rules('company_name', 'company name', '');
		$this -> form_validation -> set_rules('company_address', 'company address', '');
		
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['locations'] = $this -> Globals -> select_all('locations');
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
				$stay_date = date("Y-m-d", strtotime($this -> input -> post('stay_date')));
				$monk_id = $this -> input -> post('monk_response_id', TRUE);
				$use_house_id = $this->Globals->select_where('monks',array('id'=>$monk_id));
				
				$data = array(
					'username' => $this -> input -> post('username', TRUE), 
					'gender' =>  $this -> input -> post('gender', TRUE), 
					'nation' => $this -> input -> post('nation', TRUE),
					'nationality' => $this -> input -> post('nationality', TRUE),
					'date_of_birth' => $date_of_birth,
					'place_of_birth' => $this -> input -> post('place_of_birth', TRUE),			
					'stay_date' => $stay_date,
					'current_address' => $this -> input -> post('current_address', TRUE),
					'education' => $this -> input -> post('education', TRUE),
					'phone_number' => $this -> input -> post('phone_number', TRUE),
					'family_status' => $this -> input -> post('family_status', TRUE),
					'father_name' => $this -> input -> post('father_name', TRUE),
					'father_occupation' => $this -> input -> post('father_occupation', TRUE),
					'father_phone' => $this -> input -> post('father_phone', TRUE),
					'father_address' => $this -> input -> post('father_address', TRUE),
					'mother_name' => $this -> input -> post('mother_name', TRUE),
					'mother_occupation' => $this -> input -> post('mother_occupation', TRUE),
					'mother_phone' => $this -> input -> post('mother_phone', TRUE),
					'mother_address' => $this -> input -> post('mother_address', TRUE),
					'photo' => $image_name,
					'monk_response_id' => $this -> input -> post('monk_response_id', TRUE),
					'position' => $this -> input -> post('position', TRUE),
					'student_type' => $this -> input -> post('student_type', TRUE),
					'study_at' => $this -> input -> post('study_at', TRUE),
					'year' => $this -> input -> post('year', TRUE),
					'generation' => $this -> input -> post('generation', TRUE),
					'group' => $this -> input -> post('group', TRUE),
					'school_address' => $this -> input -> post('school_address', TRUE),
					'work_type' => $this -> input -> post('work_type', TRUE),
					'company_name' => $this -> input -> post('company_name', TRUE),
					'company_address' => $this -> input -> post('company_address', TRUE),
					'identify_card' => $this -> input -> post('identify_card', TRUE),
					'use_house_id' => $use_house_id->row()->use_house_id,
					'status' => 1, 
					'created_at' => null
				);
				var_dump($data);
				die();
				$isInserted = $this -> Globals -> insert('members', $data);
				if ($isInserted) {
	
					$this -> session -> set_flashdata('success', "Member account was created successfully.");
					redirect('manage_members/create_member');
				} else {
					
					$this -> session -> set_flashdata('error', 'Member account  was created fail.');
					redirect('manage_members/create_member');
				}
			}	
			}
			

	}

	public function update_member($member_id = 0) {
		$data['title'] = "Update Member";
		
		$this -> form_validation -> set_rules('username', 'username', 'required');
		$this -> form_validation -> set_rules('gender', 'gender', 'required');
		$this -> form_validation -> set_rules('nation', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		$this -> form_validation -> set_rules('education', 'education', 'required');
		$this -> form_validation -> set_rules('phone_number', 'phone number', 'required');
		$this -> form_validation -> set_rules('family_status', 'phone number', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_phone', 'father phone', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_phone', 'mother phone', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		$this -> form_validation -> set_rules('monk_response_id', 'monk response', 'required');
		$this -> form_validation -> set_rules('identify_card', 'identify card', 'required');
		
		$this -> form_validation -> set_rules('position', 'Positon', 'required');
		
		$this -> form_validation -> set_rules('student_type', 'student type', '');
		$this -> form_validation -> set_rules('study_at', 'study at', '');
		$this -> form_validation -> set_rules('year', 'year', '');
		$this -> form_validation -> set_rules('generation', 'generation', '');
		$this -> form_validation -> set_rules('group', 'group', '');
		$this -> form_validation -> set_rules('school_address', 'school address', '');
		$this -> form_validation -> set_rules('work_type', 'work type', '');
		$this -> form_validation -> set_rules('company_name', 'company name', '');
		$this -> form_validation -> set_rules('company_address', 'address', '');
		
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['locations'] = $this -> Globals -> select_all('locations');
			$data['member'] = $this -> Globals -> select_where('members', array('id'=> $member_id));
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
				$stay_date = date("Y-m-d", strtotime($this -> input -> post('stay_date')));
				$monk_id = $this -> input -> post('monk_response_id', TRUE);
				$use_house_id = $this->Globals->select_where('monks',array('id'=>$monk_id));
				
				$data = array(
					'username' => $this -> input -> post('username', TRUE), 
					'gender' =>  $this -> input -> post('gender', TRUE), 
					'nation' => $this -> input -> post('nation', TRUE),
					'nationality' => $this -> input -> post('nationality', TRUE),
					'date_of_birth' => $date_of_birth,
					'place_of_birth' => $this -> input -> post('place_of_birth', TRUE),			
					'stay_date' => $stay_date,
					'current_address' => $this -> input -> post('current_address', TRUE),
					'education' => $this -> input -> post('education', TRUE),
					'phone_number' => $this -> input -> post('phone_number', TRUE),
					'family_status' => $this -> input -> post('family_status', TRUE),
					'father_name' => $this -> input -> post('father_name', TRUE),
					'father_occupation' => $this -> input -> post('father_occupation', TRUE),
					'father_phone' => $this -> input -> post('father_phone', TRUE),
					'father_address' => $this -> input -> post('father_address', TRUE),
					'mother_name' => $this -> input -> post('mother_name', TRUE),
					'mother_occupation' => $this -> input -> post('mother_occupation', TRUE),
					'mother_phone' => $this -> input -> post('mother_phone', TRUE),
					'mother_address' => $this -> input -> post('mother_address', TRUE),
					'monk_response_id' => $this -> input -> post('monk_response_id', TRUE),
					'position' => $this -> input -> post('position', TRUE),
					'student_type' => $this -> input -> post('student_type', TRUE),
					'study_at' => $this -> input -> post('study_at', TRUE),
					'year' => $this -> input -> post('year', TRUE),
					'generation' => $this -> input -> post('generation', TRUE),
					'group' => $this -> input -> post('group', TRUE),
					'school_address' => $this -> input -> post('school_address', TRUE),
					'work_type' => $this -> input -> post('work_type', TRUE),
					'company_name' => $this -> input -> post('company_name', TRUE),
					'company_address' => $this -> input -> post('company_address', TRUE),
					'identify_card' => $this -> input -> post('identify_card', TRUE),
					'use_house_id' =>$use_house_id->row()->use_house_id
				);
				if($image_name!=""){
					$data['photo'] = $image_name;
				}
				$isUpdated = $this -> Globals -> update('members', $data, array('id'=> $member_id));
				if ($isUpdated) {
	
					$this -> session -> set_flashdata('success', "Member account was updated successfully.");
					redirect('manage_members');
				} else {
					
					$this -> session -> set_flashdata('error', 'Member account  was updated fail.');
					redirect('manage_members');
				}
			}
			
		}

	}

	public function delete_member($member_id = 0) {
		$isDeleted = $this -> Globals -> delete('members', array('id' => $member_id));
		if ($isDeleted) {
			
			$this -> session -> set_flashdata('success', 'Member account  was deleted success !.');
			redirect('manage_members');

		} else {
			$this -> session -> set_flashdata('error', 'Member account  was deleted fail !.');
			redirect('manage_members');
		}
	}

}