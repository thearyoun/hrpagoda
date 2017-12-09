<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
include 'Security.php';
class Manage_reports extends Security {
	
	public function users() {
		$data['title'] = "Manage Users";
		//$data['users']=$this->Globals->select_all('users');
		$this -> form_validation -> set_rules('from_date', 'From Date', 'required');
		$this -> form_validation -> set_rules('to_date', 'To Date', 'required');

		//$data['members'] = $this -> Globals -> select_all('members');
		$data['users'] = $this -> Globals -> select_all('users');
		if ($this -> form_validation -> run() === FALSE) {
			
			$data['user_list'] = $this -> Globals -> select_join_get_only_fields('user_roles', $arr_fields = array('users.user_id', 'users.username', 'users.email', 'users.phone', 'users.status', 'users.created_at', 'roles.name'), $arr_join = array('users' => array('using_user_id' => 'user_id'), 'roles' => array('using_role_id' => 'role_id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL, $sort = NULL);
			$this -> load -> view('backend/index', $data);
		} else {
			$from_date = $this->input->post('from_date',true);
			$to_date = $this->input->post('to_date',true);
			$emp_code = $this->input->post('emp_code',true);
			if($from_date!=""){
				$from_date=date("Y-m-d", strtotime($from_date));
			}
			if($to_date!=""){
				$to_date=date("Y-m-d", strtotime($to_date));	
			}
			$arr_where=array(
				'users.created_at >= ' => date("Y-m-d", strtotime($from_date)), 
				'users.created_at <=' => date("Y-m-d", strtotime($to_date)) ,				
				);
			if($emp_code !=""){
				$arr_where['users.user_id'] = $emp_code;
			}
			
			
			$data['user_list'] = $this -> Globals -> select_join_get_only_fields('user_roles', $arr_fields = array('users.user_id', 'users.username', 'users.email', 'users.phone', 'users.status', 'users.created_at', 'roles.name'), $arr_join = array('users' => array('using_user_id' => 'user_id'), 'roles' => array('using_role_id' => 'role_id')), $join_type = 'INNER', $arr_where, $limit = NULL, $sort = NULL);
			$this -> load -> view('backend/index', $data);
		}
		
	}
	
	public function members() {
		$data['title'] = "Manage members";
		$this -> form_validation -> set_rules('from_date', 'From Date', 'required');
		$this -> form_validation -> set_rules('to_date', 'To Date', 'required');

		$data['members'] = $this -> Globals -> select_all('members');
		$data['users'] = $this -> Globals -> select_all('users');
		if ($this -> form_validation -> run() === FALSE) {
			$use_branch_id=$this->session->userdata('use_branch_id');
			if($use_branch_id==='1'){
				$arr_where = array('members.status'=>1);
			}else{			
				$arr_where = array('members.status'=>1,'members.use_branch_id'=>$use_branch_id);
			}
			$data['member_list'] = $this -> Globals -> select_where('members',$arr_where);
			$this -> load -> view('backend/index', $data);
		} else {
			$from_date = $this->input->post('from_date',true);
			$to_date = $this->input->post('to_date',true);
			$member = $this->input->post('member',true);
			if($from_date!=""){
				$from_date=date("Y-m-d", strtotime($from_date));
			}
			if($to_date!=""){
				$to_date=date("Y-m-d", strtotime($to_date));	
			}
			
			$arr_where=array(
				'members.created_at >= ' => date("Y-m-d", strtotime($from_date)), 
				'members.created_at <=' => date("Y-m-d", strtotime($to_date)) ,				
				);
			if($member !=""){
				$arr_where['members.member_id'] = $member;
			}
			$use_branch_id=$this->session->userdata('use_branch_id');
			if($use_branch_id==='1'){
				$arr_where['members.status'] = 1;
				
			}else{
				$arr_where['members.status'] = 1;
				$arr_where['members.use_branch_id'] = $use_branch_id;			
				
			}
			$data['member_list'] = $this -> Globals -> select_where('members',$arr_where);
			$this -> load -> view('backend/index', $data);
		}
		
	}
	public function people_in_houses_by_member($house_number = NULL){
		$data['title'] = 'Monks';
		if($house_number != NULL){
			$arr_where = array('use_house_id'=> $house_number, 'members.status'=> 1);
		}else{
			$arr_where = array('members.status'=> 1);
		}

		$data['members'] = $this -> Globals -> select_join_get_only_fields('members', $arr_fields = array('members.*','houses.name as house_name'),$arr_join = array('houses'=>array('use_house_id'=>'id')), $join_type = 'INNER', $arr_where, $limit = NULL,$sort=NULL);
		$this -> load -> view('backend/index', $data);
	}
	public function monks(){
		$data['title'] = 'Monks';
		$data['members'] = $this -> Globals -> select_all('members');
		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where = NULL, $limit = NULL,$sort=NULL);
		$this -> load -> view('backend/index', $data);
	}
	public function people_in_houses_by_monk_level1($house_number = NULL){
		$data['title'] = 'Monks';
		$data['members'] = $this -> Globals -> select_all('members');
		if($house_number != NULL){
			$arr_where = array("use_house_id"=> $house_number, "vegetarian_types"=>1, "monks.status"=> 1);
		}else{
			$arr_where = array("vegetarian_types"=>1, "monks.status"=> 1);
		}
		

		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where, $limit = NULL,$sort=NULL);
		$this -> load -> view('backend/index', $data);
	}
	public function people_in_houses_by_monk_level2($house_number = NULL){
		$data['title'] = 'Monks';
		$data['members'] = $this -> Globals -> select_all('members');
		if($house_number != NULL){
			$arr_where = array("use_house_id"=> $house_number, "vegetarian_types"=>2,  "monks.status"=> 1);
		}else{
			$arr_where = array("vegetarian_types"=>2, "monks.status"=> 1);
		}
		$data['monks'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name,locations.name as location_name'),$arr_join = array('houses'=>array('use_house_id'=>'id'),'locations'=>array('use_location_id'=>'id')), $join_type = 'INNER', $arr_where, $limit = NULL,$sort=NULL);
		$this -> load -> view('backend/index', $data);
	}
	public function monk_book_forms(){
		$data['title'] = 'Monk Book Form';	
		
		$this -> form_validation -> set_rules('house', 'House Number', 'required');
		
		//$data['programmes'] = $this -> Globals -> select_all('programmes');
		$data['houses'] = $this -> Globals -> select_all('houses');
		if ($this -> form_validation -> run() === FALSE) {
			$this->load->model('Custom_model');	
			$data['monks'] = $this->Custom_model->get_monk_book_info();
		
			$this -> load -> view('backend/index', $data);
		}else{
			$this->load->model('Custom_model');	
			$house_id = $this->input->post("house",true);
			$data['monks'] = $this->Custom_model->get_monk_book_info_where($house_id);
		
			$this -> load -> view('backend/index', $data);
		}
		
		
	}
	//no 
	public function member_book_forms(){
		$data['title'] = 'Member Book Form';	
		$this->load->model('Custom_model');	
		$data['monks'] = $this->Custom_model->get_member_book_info();
		$this -> load -> view('backend/index', $data);
	}
	public function groups() {
		$data['title'] = "Groups";
		$this->load->model('Custom_model');
		$data['lines'] = $this -> Custom_model -> get_report_groups();
		$this -> load -> view('backend/index', $data);
	}
	public function people_in_houses() {
		$data['title'] = "People in house";
		$this->load->model('Custom_model');
		$data['people_in_houses'] = $this -> Custom_model -> get_people_in_house();
		$this -> load -> view('backend/index', $data);
	}
	public function group_member($group_id=0) {
		$data['title'] = "Group Member";		
		$data['group'] = $this->Globals->select_where('groups',array('id'=>$group_id));
		//$arr_where = array('monks.status'=>1,'monks.use_group_ids'=>$group_id);
		//$data['group_members'] = $this -> Globals -> select_join_get_only_fields('monks', $arr_fields = array('monks.*','houses.name as house_name'),$arr_join = array('houses'=>array('use_house_id'=>'id')), $join_type = 'INNER', $arr_where, $limit = NULL,$sort=NULL);
		$this->load->model('Custom_model');
		$data['group_members'] = $this -> Custom_model -> get_monk_group_member($group_id);
		$this -> load -> view('backend/index', $data);
	}
	public function monk_request_form($monk_id){
		$data['title'] = 'Monk Form';
		$this->load->model('Custom_model');
		$data['monk_info'] = $this->Custom_model->get_monk_info($monk_id);
		$this -> load -> view('backend/index', $data);
		
	}
	public function member_request_form($member_id){
		$data['title'] = 'Member Form';
		$this->load->model('Custom_model');
		$data['member_info'] = $this->Custom_model->get_member_info($member_id);
		$this -> load -> view('backend/index', $data);
		
	}
	//no do yet
	public function member_confirm_stay_form($member_id){
		$data['title'] = 'Member Stay Form';
		$this->load->model('Custom_model');
		$data['member_info'] = $this->Custom_model->get_member_info($member_id);
		$this -> load -> view('backend/index', $data);
		
	}
	public function monk_confirm_stay_form($monk_id){
		$data['title'] = 'Monk Stay Form';
		$this->load->model('Custom_model');
		$data['monk_info'] = $this->Custom_model->get_monk_info($monk_id);
		$this -> load -> view('backend/index', $data);
		
	}
	public function member_leave_form($member_id){
		$data['title'] = 'Member Leave Form';
		$this->load->model('Custom_model');
		$data['member_info'] = $this->Custom_model->get_member_info($member_id);
		$this -> load -> view('backend/index', $data);
		
	}
	public function monk_leave_form($monk_id){
		$data['title'] = 'Monk Leave Form';
		$this->load->model('Custom_model');
		$data['monk_info'] = $this->Custom_model->get_monk_info($monk_id);
		$this -> load -> view('backend/index', $data);
		
	}
	public function get_att_report($group_id = null) {
		$data['title'] = "Full Attendant Report";
		$this->load->model('Custom_model');
		$data['group'] = $this->Globals->select_where('groups',array('id'=>$group_id));
		
		$this -> form_validation -> set_rules('from_date', 'From Date', 'required');
		$this -> form_validation -> set_rules('to_date', 'To Date', 'required');
		
		//$data['programmes'] = $this -> Globals -> select_all('programmes');
		
		if ($this -> form_validation -> run() === FALSE) {
			$data['attendants'] = $this -> Custom_model -> get_att_report($group_id);
			$this -> load -> view('backend/index', $data);
		}else{
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			
			if($from_date!=""){
				$from_date=date("Y-m-d", strtotime($from_date));
			}
			if($to_date!=""){
				$to_date=date("Y-m-d", strtotime($to_date));	
			}
			
			$data['attendants'] = $this -> Custom_model -> get_att_report($group_id, $from_date,$to_date);
			$this -> load -> view('backend/index', $data);
		}
		
	}
	public function get_att_report_programme($group_id = null) {
		$data['title'] = "Full Attendant Report Programmes";
		$this->load->model('Custom_model');
		$data['group'] = $this->Globals->select_where('groups',array('id'=>$group_id));
		
		$this -> form_validation -> set_rules('from_date', 'From Date', 'required');
		$this -> form_validation -> set_rules('to_date', 'To Date', 'required');
		
		$data['programmes'] = $this -> Globals -> select_where('programmes',array('id !='=>1));
		
		if ($this -> form_validation -> run() === FALSE) {
			$data['programmes_title'] = "ឧបោសថកម្ម";
			$data['programme_id'] = 2;
			$data['from_date'] = "";
			$data['to_date'] = "";
			$data['attendants'] = $this -> Custom_model -> get_att_report_programme($group_id, 2);
			$this -> load -> view('backend/index', $data);
		}else{
			$from_date = $this->input->post('from_date');
			$to_date = $this->input->post('to_date');
			$use_programme_id = $this->input->post('use_programme_id');			
			if($from_date!=""){
				$from_date=date("Y-m-d", strtotime($from_date));
			}
			if($to_date!=""){
				$to_date=date("Y-m-d", strtotime($to_date));	
			}
			$programmes = $this -> Globals -> select_where('programmes',array('id'=>$use_programme_id));
			$data['programmes_title'] = $programmes->row()->name;
			$data['programme_id'] = $programmes->row()->id;
			$data['from_date'] = $from_date;
			$data['to_date'] = $to_date;

			$data['attendants'] = $this -> Custom_model -> get_att_report_programme($group_id, $use_programme_id, $from_date,$to_date);
			$this -> load -> view('backend/index', $data);
		}
		
	}
	public function get_att_report_programme_detail(){
		$data['title'] = "Attendant Report Detail";
		$id = $this->input->get('id');
		$type = $this->input->get('type');
		$from_date = $this->input->get('from_date');
		$to_date = $this->input->get('to_date');
		$programme_id = $this->input->get('programme_id');
		$this->load->model('Custom_model');
		$data['attendants'] = $this->Custom_model->get_att_report_programme_detail($id, $type, $programme_id, $from_date, $to_date);
		
		$this -> load -> view('backend/index', $data);
	}
	public function people_in_houses_by_id($house_id = NULL){
		$data['title'] = 'Person in house';
		$this->load->model('Custom_model');	
		if($house_id != NULL){
			$data['persons'] = $this -> Custom_model -> get_all_people_in_house_by($house_id);
		}else{
			$data['persons'] = $this -> Custom_model -> get_all_people_in_house();
		 }
		
		$this -> load -> view('backend/index', $data);
	}
}
