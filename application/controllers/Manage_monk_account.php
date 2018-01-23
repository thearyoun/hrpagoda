<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//include 'Security.php';
class Manage_monk_account extends CI_Controller {

	public function index() {
		$this->load->model("Custom_model");
		$data['title'] = "Manage monks";
		$monk_id = $this -> session -> userdata("monk_id");
		$data['id'] = $monk_id;
		$data['monks'] = $this -> Custom_model ->get_data_monk_account($monk_id);
		$data['lanuage'] = $this -> Custom_model -> get_language($monk_id,'monk_id');
		$this -> load -> view('backend/index', $data);
	}
	public function attendant() {

		$data['title'] = "Manage Attendants";
		$this->load->model('Custom_model');

		$monk_id = $this -> session -> userdata("monk_id");
		$type=1;
		$data['attendants'] = $this -> Custom_model -> get_all_result_attendants($type,null,$monk_id);

		$this -> load -> view('backend/index', $data);

	}

}
