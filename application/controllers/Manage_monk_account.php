<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//include 'Security.php';
class Manage_monk_account extends CI_Controller {

	public function index() {
		$data['title'] = "Manage monks";
		$arr_where = array('monks.status'=>1);
		$monk_id = $this -> session -> userdata("monk_id");
		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name,groups.name as group_name,positions.name as pos_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id'),'groups'=>array('use_group_id'=>'id'),'positions'=>array('use_position_id'=>'id')), $join_type = 'INNER', $arr_where = array('monks.id'=>$monk_id), $limit = 1,$sort=NULL)->row();
		$this -> load -> view('backend/index', $data);
	}
	public function attendant() {
		
		$data['title'] = "Manage Attendants";
		$this->load->model('Custom_model');
		$monk_id = $this -> session -> userdata("monk_id");
		$data['attendants'] = $this -> Custom_model -> get_attendant_where($monk_id);
		//$data['attendants'] = $this -> Globals -> select_all('attendants');
		$this -> load -> view('backend/index', $data);
	}

}
