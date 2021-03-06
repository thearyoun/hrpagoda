<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_monk_take_leaves extends Security {

	public function index() {

		$data['title'] = "Manage Monk take leaves";
		$this->load->model('Custom_model');
		$data["message"] ="ទម្រង់សុំច្បាប់ត្រូវបានបិទ។ សូមទាក់ទងទៅអ្នកគ្រប់គ្រងប្រព័ន្ធនេះ: Nhem Bora, TEL : 098 426 187.";
		$data['monk_take_leaves'] = $this -> Custom_model -> get_monk_take_leaves();
    $data['status_type'] = $this->Globals->select_where("take_leave_type",array("status"=>1));
		$this -> load -> view('backend/index', $data);
	}

	public function create_monk_take_leave() {
		if(($this->session->userdata("monk_allow")==1) || ($this->session->userdata("user_type")=="admin")){
			$data['title'] = "Create Monk Take Leave";

			$this -> form_validation -> set_rules('use_monk_id', 'monk', 'required');
			$this -> form_validation -> set_rules('use_handle_by_id', 'handle by', 'required');
			$this -> form_validation -> set_rules('use_leave_type_id', 'leave type', 'required');
			$this -> form_validation -> set_rules('request_date', 'request date', 'required');
			$this -> form_validation -> set_rules('from_date', 'from date', 'required');
			$this -> form_validation -> set_rules('to_date', 'to date', 'required');
			$this -> form_validation -> set_rules('reason', 'reason', '');
			$this -> form_validation -> set_rules('notes', 'notes', '');


			if ($this -> form_validation -> run() === FALSE) {

				$data['monks'] = $this -> Globals -> select_where('monks', array('status'=>1));
				$data['leave_types'] = $this -> Globals -> select_all('leave_types');
	      $data['status_type'] = $this->Globals->select_where("take_leave_type",array("status"=>1));
				$this -> load -> view('backend/index', $data);
			} else {

				$from_date = date("Y-m-d", strtotime($this -> input -> post('from_date')));
				$to_date = date("Y-m-d", strtotime($this -> input -> post('to_date')));
				$request_date = date("Y-m-d", strtotime($this -> input -> post('request_date')));

				$data = array(
					'use_monk_id' => $this -> input -> post('use_monk_id', TRUE),
					'use_handle_by_id' =>  $this -> input -> post('use_handle_by_id', TRUE),
					'use_leave_type_id' => $this -> input -> post('use_leave_type_id', TRUE),
					'from_date' => $from_date,
					'to_date' => $to_date,
					'reason' => $this -> input -> post('reason', TRUE),
					'notes' => $this -> input -> post('notes', TRUE),
					'request_date' => $request_date,
					'status' => ($this->input->post("status_type")?$this->input->post("status_type"):'មិនទាន់អនុញ្ញាត'),
					'created_at' => date("Y-m-d H:i:s")
				);

				$isInserted = $this -> Globals -> insert('monk_take_leaves', $data);
				if ($isInserted) {

					$this -> session -> set_flashdata('success', "Monk take leave was created successfully.");
					redirect('manage_monk_take_leaves/create_monk_take_leave');
				} else {

					$this -> session -> set_flashdata('error', 'Monk take leave  was created fail.');
					redirect('manage_monk_take_leaves/create_monk_take_leave');
				}
			}
		}else{
			redirect('manage_monk_take_leaves');
		}
	}

	public function update_monk_take_leave($take_leave_id = 0) {
		if(($this->session->userdata("monk_allow")==1) || ($this->session->userdata("user_type")=="admin")){
			$data['title'] = "Update Monk Take Leave";

			$this -> form_validation -> set_rules('use_monk_id', ',monk', 'required');
			$this -> form_validation -> set_rules('use_handle_by_id', 'handle by', 'required');
			$this -> form_validation -> set_rules('use_leave_type_id', 'leave type', 'required');
			$this -> form_validation -> set_rules('request_date', 'request date', 'required');
			$this -> form_validation -> set_rules('from_date', 'from date', 'required');
			$this -> form_validation -> set_rules('to_date', 'to date', 'required');
			$this -> form_validation -> set_rules('reason', 'reason', '');
			$this -> form_validation -> set_rules('notes', 'notes', '');


			if ($this -> form_validation -> run() === FALSE) {

				$data['monks'] = $this -> Globals -> select_where('monks', array('status'=>1));
				$data['leave_types'] = $this -> Globals -> select_all('leave_types');
				$data['monk_take_leave'] = $this -> Globals -> select_where('monk_take_leaves',array('id'=> $take_leave_id));
	      $data['status_type'] = $this->Globals->select_where("take_leave_type",array("status"=>1));
				$this -> load -> view('backend/index', $data);
			} else {

				$from_date = date("Y-m-d", strtotime($this -> input -> post('from_date')));
				$to_date = date("Y-m-d", strtotime($this -> input -> post('to_date')));
				$request_date = date("Y-m-d", strtotime($this -> input -> post('request_date')));

				$data = array(
					'use_monk_id' => $this -> input -> post('use_monk_id', TRUE),
					'use_handle_by_id' =>  $this -> input -> post('use_handle_by_id', TRUE),
					'use_leave_type_id' => $this -> input -> post('use_leave_type_id', TRUE),
					'from_date' => $from_date,
					'to_date' => $to_date,
					'reason' => $this -> input -> post('reason', TRUE),
					'notes' => $this -> input -> post('notes', TRUE),
					'request_date' => $request_date,
	        "status"=>($this->input->post("status_type")?$this->input->post("status_type"):'មិនទាន់អនុញ្ញាត')
				);

				$isUpdated = $this -> Globals -> update('monk_take_leaves', $data, array('id'=> $take_leave_id));
				if ($isUpdated) {

					$this -> session -> set_flashdata('success', "Monk take leave was updated successfully.");
					redirect('manage_monk_take_leaves');
				} else {

					$this -> session -> set_flashdata('error', 'Monk take leave  was updated fail.');
					redirect('manage_monk_take_leaves');
				}
			}
		}else{
			redirect('manage_monk_take_leaves');
		}
	}

	public function delete_monk_take_leave($take_leave_id = 0) {
		$isDeleted = $this -> Globals -> delete('monk_take_leaves', array('id' => $take_leave_id));
		if ($isDeleted) {

			$this -> session -> set_flashdata('success', 'Monk take leave  was deleted success !.');
			redirect('manage_monk_take_leaves');

		} else {
			$this -> session -> set_flashdata('error', 'Monk take leave  was deleted fail !.');
			redirect('manage_monk_take_leaves');
		}
	}

	function update_member_status()
		{
			$this->Globals->update("monk_take_leaves",array("status"=>$this->input->post("status")),array("id"=>$this->input->post("id")));
		}

	public function update_form_monk_take_leave()
	{
		$value = $this->input->post("value",true);
		$name = $this->input->post("name",true);
		$data = array(
			'monk_allow'=>$value
		);
		$this->session->set_userdata("monk_allow",$value);

		$isUpdated = $this -> Globals -> update('permissions_take_leave', $data,array("id"=>1));
		if($isUpdated){
			echo json_encode("update success");
		}
	}

}
