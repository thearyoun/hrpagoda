<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//include 'Security.php';
class Manage_member_account extends CI_Controller {

	public function index() {
		$data['title'] = "Manage monks";
		$arr_where = array('members.status1'=>1);
		$member_id = $this -> session -> userdata("member_id");
		$data['members'] = $this -> Globals -> select_join_get_only_fields('members', $arr_fields = array('members.*','houses.name as house_name','monks.username as monk_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'monks'=>array('monk_response_id'=>'id')), $join_type = 'INNER', $arr_where = array('members.id'=>$member_id), $limit = 1,$sort=NULL)->row();
		$this -> load -> view('backend/index', $data);
	}
	public function attendant() {
		
		$data['title'] = "Manage Attendants";
		$this->load->model('Custom_model');
		$member_id = $this -> session -> userdata("member_id");
		$data['attendants'] = $this -> Custom_model -> get_attendant_where_member($member_id);
		//$data['attendants'] = $this -> Globals -> select_all('attendants');
		$this -> load -> view('backend/index', $data);
	}

}
