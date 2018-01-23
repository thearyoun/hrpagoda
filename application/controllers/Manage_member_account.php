<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//include 'Security.php';
class Manage_member_account extends CI_Controller {

	public function index($member_id=null) {
		$this->load->model("Custom_model");
		$data['title'] = "Manage monks";
		$arr_where = array('members.status1'=>1);
		if($member_id==""){
			$member_id = $this -> session -> userdata("member_id");
		}

		$data['id'] = $member_id;
		$data['members'] = $this -> Custom_model -> get_data_member($member_id);
		$data['lanuage'] = $this -> Custom_model -> get_language($member_id,'member_id');
		$data['timeworking'] = $this -> Custom_model -> get_timeworing($member_id,'member_id');
		// $data['time_work'] = $this -> Custom_model -> get_timeworing($member_id,'member_id',2);
		$this -> load -> view('backend/index', $data);
	}
	public function attendant() {

		$data['title'] = "Manage Attendants";
		$this->load->model('Custom_model');

		$member_id = $this -> session -> userdata("member_id");
        $type=2;

		$data['attendants'] = $this -> Custom_model -> get_all_result_attendants($type,null,$member_id);
		$this -> load -> view('backend/index', $data);
	}

}
