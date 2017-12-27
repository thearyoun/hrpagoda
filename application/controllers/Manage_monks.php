<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_monks extends Security {

	public function index() {
		$data['title'] = "Manage monks";

		$arr_where = array('monks.status'=>1);
		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks',
															$arr_fields = array('`monks`.username,monks.nation,monks.date_of_birth,
																monks.phone_number,monks.id, `houses`.`name` as `house_name`,monks.status,
																`locations`.`name` as `location_name`, `member_types`.`name` as typesname, `groups`.`name` as groupname,
																DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), monks.vegetarian_date)), "%Y")+0 as yeartime'),
															$arr_join = array('houses'=>array('use_house_id'=>'id'),
																							'locations'=>array('use_location_id'=>'id'),
																							'member_types'=>array('vegetarian_types'=> 'id'),
																							'monk_groups'=>array('id'=>'use_monk_id'),
																							'groups'=> array('use_group_id'=>'id')),
															$join_type = 'INNER', $arr_where = NULL, $limit = NULL,
															$sort='houses.id asc,monks.vegetarian_types asc,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), monks.vegetarian_date)), "%Y")+0 desc');
		$this -> load -> view('backend/index', $data);
	}

	public function create_monk() {

		$data['title'] = "Create monk";
		$this -> form_validation -> set_rules('username', 'username', 'required');
		// $this -> form_validation -> set_rules('nick_name', 'NickName', 'required');
		$this -> form_validation -> set_rules('nation', 'nation', 'required');
		$this -> form_validation -> set_rules('nationality', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('use_position_id', 'position', 'required');

		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		// $this -> form_validation -> set_rules('phone_number', 'phone number', 'required');

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
		$this -> form_validation -> set_rules('child_level', 'child level', 'required');

		$this -> form_validation -> set_rules('use_house_id', 'house', '');
		$this -> form_validation -> set_rules('use_location_id', 'location', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');

		$this -> form_validation -> set_rules('user_account', 'user account', 'required');
		$this -> form_validation -> set_rules('user_password', 'user password', 'required');

		// $this -> form_validation -> set_rules('jop', 'Current Job', 'required');
		// $this -> form_validation -> set_rules('workplace', 'Name of Workplace', 'required');
		// $this -> form_validation -> set_rules('work_address', 'Address of Workplace', 'required');
		// $this -> form_validation -> set_rules('eng_name', 'English Name', 'required');
		// $this -> form_validation -> set_rules('work_position', 'Position in Workplace', 'required');

		$this -> form_validation -> set_rules('current_provice', 'Current Province', 'required');
		$this -> form_validation -> set_rules('group', 'Group', 'required');

		if ($this -> form_validation -> run() === FALSE) {
			$this->load->helper("my");
			$data['groups'] = $this -> Globals -> select_all('groups');
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['positions'] = $this -> Globals -> select_all('positions');
			$data['locations'] = $this -> Globals -> select_all('locations');
			$data['member_types'] = $this -> Globals -> select_all('member_types');
			$data['langauges'] = $this -> Globals -> select_all('languages');
			$data['days'] = $this -> Globals -> select_all('dayofweek');
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
									$error_upload = FALSE;
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
								'user_account' => $this -> input -> post('user_account', TRUE),
								'user_password' => sha1($this -> input -> post('user_password', TRUE)),
								'status' => 1,
								'created_at' => null,
								'eng_name' => $this->input->post("eng_name"),
								'nick_name' => $this->input->post("nick_name"),
								'grade' => $this->input->post("grade"),
								'maser' => $this->input->post("maser"),
								'jop_type' => $this->input->post("jop"),
								'job_position' => $this->input->post("work_position"),
								'company_name' => $this->input->post("workplace"),
								'company_address' => $this->input->post("work_address"),
								'distrinct_id' => $this->input->post("district_id"),
								'commune_id' => $this->input->post("commune_id"),
								'village_id' => $this->input->post("village_id"),
								'current_province' => $this->input->post("current_provice"),
								'current_district' => $this->input->post("current_district"),
								'current_commune' => $this->input->post("current_commune"),
								'current_village' => $this->input->post("current_commune"),
								'student_type' => $this->input->post("student_type"),
								'study_at' => $this->input->post("study_at"),
								'generation' => $this->input->post("generation"),
								'school_group' => $this->input->post("school_group"),
								'school_address' => $this->input->post("school_address"),
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
								$language_name = $this->input->post("language");
								$read = $this->input->post("read");
								$writing = $this->input->post("writing");
								$listening = $this->input->post("listening");
								$speaking = $this->input->post("speaking");
								for($i=0;$i<count($language_name);$i++){
										if($language_name[$i] !=""){
											$data_lanauge = array(
												'lang_id' => $language_name[$i],
												'monk_id' => $is_last_id,
												'reading' => $read[$i],
												'listening' => $listening[$i],
												'speaking' => $speaking[$i],
												'writing' => $writing[$i]
											);
											$this -> Globals -> insert('monk_languages', $data_lanauge);
										}
								}

								//insert data into timeworkingday
								$fdw_stu = $this->input->post("fromdayworking_study");
								$tdw_stu = $this->input->post("todayworking_study");
								$ftw_stu = $this->input->post("from_timeworking_study");
								$ttw_stu = $this->input->post("to_timeworking_study");
								for($i=0;$i<count($fdw_stu);$i++){
										if($fdw_stu[$i] !=""){
											$data_stu = array(
												'monk_id'=>$is_last_id,
												'from_day' => $fdw_stu[$i],
												'to_day' => $tdw_stu[$i],
												'from_time' => $ftw_stu[$i],
												'to_time' =>$ttw_stu[$i],
												'type_job' =>1
											);
											$this->Globals->insert('workingday', $data_stu);
										}
								}

								$fdw_w = $this->input->post("fromdayworking_working");
								$tdw_w = $this->input->post("todayworking_working");
								$ftw_w = $this->input->post("from_timeworking_working");
								$ttw_w = $this->input->post("to_timeworking_working");
								for($i=0;$i<count($fdw_w);$i++){
										if($fdw_w[$i] !=""){
												$data_work = array(
													'monk_id'=>$is_last_id,
													'from_day' => $fdw_w[$i],
													'to_day' => $tdw_w[$i],
													'from_time' => $ftw_w[$i],
													'to_time' =>$ttw_w[$i],
													'type_job' =>2
												);
												$this->Globals->insert('workingday', $data_work);
										}
								}

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
		$this->load->helper("my");
		$data['title'] = "Update monk";

		$this -> form_validation -> set_rules('username', 'username', 'required');
		// $this -> form_validation -> set_rules('nick_name', 'NickName', 'required');
		$this -> form_validation -> set_rules('nation', 'nation', 'required');
		$this -> form_validation -> set_rules('nationality', 'nationality', 'required');
		$this -> form_validation -> set_rules('date_of_birth', 'date of birth', 'required');
		$this -> form_validation -> set_rules('use_position_id', 'position', 'required');

		$this -> form_validation -> set_rules('place_of_birth', 'place of birth', 'required');
		$this -> form_validation -> set_rules('current_address', 'current_address', 'required');
		// $this -> form_validation -> set_rules('phone_number', 'phone number', 'required');

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
		$this -> form_validation -> set_rules('child_level', 'child level', 'required');

		$this -> form_validation -> set_rules('use_house_id', 'house', '');
		$this -> form_validation -> set_rules('use_location_id', 'location', 'required');
		$this -> form_validation -> set_rules('father_name', 'father name', 'required');
		$this -> form_validation -> set_rules('father_occupation', 'father occupation', 'required');
		$this -> form_validation -> set_rules('father_address', 'father address', 'required');
		$this -> form_validation -> set_rules('mother_name', 'mother name', 'required');
		$this -> form_validation -> set_rules('mother_occupation', 'mother occupation', 'required');
		$this -> form_validation -> set_rules('mother_address', 'mother address', 'required');
		$this -> form_validation -> set_rules('stay_date', 'stay date', 'required');
		$this -> form_validation -> set_rules('user_account', 'user account', 'required');
		// $this -> form_validation -> set_rules('user_password', 'user password', 'required');
		// $this -> form_validation -> set_rules('jop', 'Current Job', 'required');
		// $this -> form_validation -> set_rules('workplace', 'Name of Workplace', 'required');
		// $this -> form_validation -> set_rules('work_address', 'Address of Workplace', 'required');
		// $this -> form_validation -> set_rules('work_position', 'Position in Workplace', 'required');
		// $this -> form_validation -> set_rules('eng_name', 'English Name', 'required');
		$this -> form_validation -> set_rules('current_provice', 'Current Province', 'required');
		$this -> form_validation -> set_rules('group', 'Group', 'required');


		if ($this -> form_validation -> run() === FALSE) {
			$data['groups'] = $this -> Globals -> select_all('groups');
			$data['monks'] = $this -> Globals -> select_all('monks');
			$data['houses'] = $this -> Globals -> select_all('houses');
			$data['positions'] = $this -> Globals -> select_all('positions');
			$data['locations'] = $this -> Globals -> select_all('locations');
			$data['member_types'] = $this -> Globals -> select_all('member_types');
			$data['monk'] = $this -> Globals -> select_where('monks',array('id'=>$monk_id));
			$data['monk_group_info'] = $this -> Globals -> select_where('monk_groups',array('use_monk_id'=>$monk_id));
			$data['langauges'] = $this -> Globals -> select_all('languages');
			$data['monk_lang'] = $this->Globals->get_language_by_monk($monk_id);
			$data['current_district'] = $this -> Globals -> select_where('districts',array('location_id'=>$data['monk']->row()->current_province));
			$data['current_communes'] = $this -> Globals -> select_where('communes',array('district_id'=>$data['monk']->row()->current_district));
			$data['current_villages'] = $this -> Globals -> select_where('villages',array('commune_id'=>$data['monk']->row()->current_commune));
			$data['from_district'] = $this -> Globals -> select_where('districts',array('location_id'=>$data['monk']->row()->use_location_id));
			$data['from_communes'] = $this -> Globals -> select_where('communes',array('district_id'=>$data['monk']->row()->distrinct_id));
			$data['from_villages'] = $this -> Globals -> select_where('villages',array('commune_id'=>$data['monk']->row()->commune_id));
			$data['get_daytime_stu'] = $this->Globals->get_dayworking(1,$monk_id,'monk_id');
			$data['get_daytime_working'] = $this->Globals->get_dayworking(2,$monk_id,'monk_id');
			$data['days'] = $this -> Globals -> select_all('dayofweek');
			$data['monk_id'] =$monk_id;
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


			if($error_upload !=TRUE ){
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
							'user_account' => $this -> input -> post('user_account', TRUE),
							'user_password' => (sha1($this -> input -> post('user_password', TRUE)) !=""?sha1($this -> input -> post('user_password', TRUE)):$this->input->post("old_password")),
							'status' => 1,
							'created_at' => null,
							'eng_name' => $this->input->post("eng_name"),
							'nick_name' => $this->input->post("nick_name"),
							'grade' => $this->input->post("grade"),
							'maser' => $this->input->post("maser"),
							'jop_type' => $this->input->post("jop"),
							'job_position' => $this->input->post("work_position"),
							'company_name' => $this->input->post("workplace"),
							'company_address' => $this->input->post("work_address"),
							'distrinct_id' => $this->input->post("district_id"),
							'commune_id' => $this->input->post("commune_id"),
							'village_id' => $this->input->post("village_id"),
							'current_province' => $this->input->post("current_provice"),
							'current_district' => $this->input->post("current_district"),
							'current_commune' => $this->input->post("current_commune"),
							'current_village' => $this->input->post("current_commune"),
							'student_type' => $this->input->post("student_type"),
							'study_at' => $this->input->post("study_at"),
							'generation' => $this->input->post("generation"),
							'school_group' => $this->input->post("school_group"),
							'school_address' => $this->input->post("school_address"),
						);
				if($this -> input -> post('user_password', TRUE) !=""){
					$data['user_password'] = sha1($this -> input -> post('user_password', TRUE));
				}
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

					$language_name = $this->input->post("language");
					$read = $this->input->post("read");
					$writing = $this->input->post("writing");
					$listening = $this->input->post("listening");
					$speaking = $this->input->post("speaking");
					$this->Globals->delete("monk_languages",array("monk_id"=>$monk_id));

					for($i=0;$i<count($language_name);$i++){
							if($language_name[$i] !=""){
								$data_lanauge = array(
									'lang_id' => $language_name[$i],
									'monk_id' => $monk_id,
									'reading' => $read[$i],
									'listening' => $listening[$i],
									'speaking' => $speaking[$i],
									'writing' => $writing[$i]
								);
								$this -> Globals -> insert('monk_languages', $data_lanauge);
							}
					}

					//insert data into timeworkingday
					$fdw_stu = $this->input->post("fromdayworking_study");
					$tdw_stu = $this->input->post("todayworking_study");
					$ftw_stu = $this->input->post("from_timeworking_study");
					$ttw_stu = $this->input->post("to_timeworking_study");
					$this->Globals->delete("workingday",array('monk_id' => $monk_id,"type_job"=>1));
					for($i=0;$i<count($fdw_stu);$i++){
							if($fdw_stu[$i] !=""){
								$data_stu = array(
									'monk_id' => $monk_id,
									'from_day' => $fdw_stu[$i],
									'to_day' => $tdw_stu[$i],
									'from_time' => $ftw_stu[$i],
									'to_time' =>$ttw_stu[$i],
									'type_job' =>1
								);
								$this->Globals->insert('workingday', $data_stu);
							}
					}

					$fdw_w = $this->input->post("fromdayworking_working");
					$tdw_w = $this->input->post("todayworking_working");
					$ftw_w = $this->input->post("from_timeworking_working");
					$ttw_w = $this->input->post("to_timeworking_working");
					$this->Globals->delete("workingday",array('monk_id' => $monk_id,"type_job"=>2));
					for($i=0;$i<count($fdw_w);$i++){
							if($fdw_w[$i] !=""){
									$data_work = array(
										'monk_id' => $monk_id,
										'from_day' => $fdw_w[$i],
										'to_day' => $tdw_w[$i],
										'from_time' => $ftw_w[$i],
										'to_time' =>$ttw_w[$i],
										'type_job' =>2
									);
									$this->Globals->insert('workingday', $data_work);
							}
					}

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

	//function for getting data of district, commune and village
	public function get_location_data(){
		$location_id = $this->input->post("location_id");
		$data_district = $this->Globals->select_where('districts',array('location_id'=>$location_id));
		$data_commune = $this->Globals->select_where('communes',array('location_id'=>$location_id));
		$data_village = $this->Globals->select_where('villages',array('location_id'=>$location_id));
		echo json_encode(
			array(
				'district'=> $data_district->result(),
				'commune'=> $data_commune->result(),
				'village'=> $data_village->result(),
			)
		);
	}

	//function for getting data of commune and village
	public function get_commune(){
		$dinstrict_id = $this->input->post("dinstrict_id");
		$data_commune = $this->Globals->select_where('communes',array('district_id'=>$dinstrict_id));
		$data_village = $this->Globals->select_where('villages',array('district_id'=>$dinstrict_id));
		echo json_encode(
			array(
				'commune'=> $data_commune->result(),
				'village'=> $data_village->result(),
			)
		);
	}

	//function for getting data of villages
	public function get_village(){
		$commune_id = $this->input->post("commune_id");
		$data_village = $this->Globals->select_where('villages',array('commune_id'=>$commune_id));
		echo json_encode(
			array(
				'village'=> $data_village->result(),
			)
		);
	}

	public function get_more_language(){
		$this->load->helper("my");
		$data['langauges'] = $this -> Globals -> select_all('languages');
		$result = $this->load->view("backend/manage_monks/more_language",$data);
		echo json_encode($result);
	}

	public function view_monk($id =FALSE)
	{
		$data['title'] = "View monk";
		$data['monk_view'] = $this->Globals->get_monk_view($id);
		$data['monk_lang'] = $this->Globals->get_language_by_monk($id);
		$data['monk_id'] = $id;
		$this -> load -> view('backend/index', $data);
	}

	public function remove_lang(){
		$monk_id = $this->input->post("monk_id");
		$member_id = $this->input->post("member_id");
		$lang_id = $this->input->post("lang_id");
		$id = $this->input->post("id");
		if($monk_id !=""){
			$this->Globals->delete("monk_languages",array("monk_id"=>$monk_id,"lang_id"=>$lang_id,"id"=>$id));
		}else{
			$this->Globals->delete("monk_languages",array("member_id"=>$member_id,"lang_id"=>$lang_id,"id"=>$id));
		}

		echo json_encode("come true");
	}

}
