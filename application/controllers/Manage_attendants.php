<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_attendants extends Security {

	public function index() {
		$this->load->model('Custom_model');
		$type=1;
		$house_no='';
		if($this->input->post("type")){
			$type = $this->input->post("type");
		}

		if($this->input->post("house_no")){
				$house_no = $this->input->post("house_no");
		}

		$data['title'] = "Manage Attendants";
		$data['attendants'] = $this -> Custom_model -> get_all_result_attendants($type,$house_no);
		$data['programmes'] = $this -> Globals -> select_all('programmes');
		$data['house'] = $this -> Globals -> select_all('houses');
		$data['type'] = $type;
		$data['house_no'] = $house_no;
		$this -> load -> view('backend/index', $data);
	}

	public function create_attendant() {
 		$this->load->model('Custom_model');
		$type = 1;

		$data['title'] = "Create Attendant";

		if($this->input->post("type")){
			$type = $this->input->post("type");
		}

		if($this->input->post("house_no")){
				$house_no = $this->input->post("house_no");
		}else{
			  $house_no ="";
		}

			$data['monks'] = $this -> Custom_model -> get_all_attendants($type,$house_no);
			$data['programmes'] = $this -> Globals -> select_all('programmes');
			$data['house'] = $this -> Globals -> select_all('houses');
			$data['type'] = $type;
			$data['house_no'] = $house_no;
			$this -> load -> view('backend/index', $data);
	}

	public function save_attendant()
	{
		$this -> form_validation -> set_rules('use_programme_id', 'programme', 'required');
		$this -> form_validation -> set_rules('times', 'times', 'required');
		$this -> form_validation -> set_rules('date', 'date', 'required');

		if ($this -> form_validation -> run() === FALSE) {

			redirect(base_url().'manage_attendants/create_attendant');

		} else {

			// $monks= $this -> Globals -> select_all('monks');
			$array_monks= array();

			$use_programme_id = $this->input->post('use_programme_id');
			$time = $this->input->post('times');
			$date = date("Y-m-d", strtotime($this -> input -> post('date')));
			$attendants = $this->input->post('attendants');
			$take_leaves = $this->input->post('take_leaves');
			$type = $this->input->post("type");
			$present = 0;
			$leave = 0;
			$isInserted=false;

			if($type==1){
				for($i=0;$i<count($attendants);$i++){
					if($attendants[$i] !=""){
						$data = array(
						'use_programme_id'=> $use_programme_id,
						'use_monk_id'=> $attendants[$i],
						'times'=> $time,
						'date'=> $date,
						'present'=> 1,
						'is_take_leave'=> $leave,
						'status' => 1,
						'type'=>$type,
						'created_at'=> date("Y-m-d H:i:s")
						);
						$isInserted = $this -> Globals -> insert('attendants', $data);
						}
					}

					for($i=0;$i<count($take_leaves);$i++){
						if($take_leaves[$i] !=""){
							$data = array(
							'use_programme_id'=> $use_programme_id,
							'use_monk_id'=> $take_leaves[$i],
							'times'=> $time,
							'date'=> $date,
							'present'=> $present,
							'is_take_leave'=> 1,
							'status' => 1,
							'type'=>$type,
							'created_at'=> date("Y-m-d H:i:s")
							);
							$isInserted = $this -> Globals -> insert('attendants', $data);
						}
				}

			}else if($type==2){

				for($i=0;$i<count($attendants);$i++){
					if($attendants[$i] !=""){
						$data = array(
						'use_programme_id'=> $use_programme_id,
						'use_member_id'=> $attendants[$i],
						'times'=> $time,
						'date'=> $date,
						'present'=> 1,
						'is_take_leave'=> $leave,
						'status' => 1,
						'type'=>$type,
						'created_at'=> date("Y-m-d H:i:s")
						);
						$isInserted = $this -> Globals -> insert('attendants', $data);
					}
				}

				for($i=0;$i<count($take_leaves);$i++){
					if($take_leaves[$i] !=""){
						$data = array(
						'use_programme_id'=> $use_programme_id,
						'use_member_id'=> $take_leaves[$i],
						'times'=> $time,
						'date'=> $date,
						'present'=> $present,
						'is_take_leave'=> 1,
						'status' => 1,
						'type'=>$type,
						'created_at'=> date("Y-m-d H:i:s")
						);
						$isInserted = $this -> Globals -> insert('attendants', $data);
					}
				}
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

	public function clear_create_search()
	{
		redirect(base_url().'manage_attendants/create_attendant');
	}

	public function clear_index_search()
	{
		redirect(base_url().'manage_attendants');
	}

	public function update_attendant($attendant_id = 0) {
		$data['title'] = "Update Attendant";
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
