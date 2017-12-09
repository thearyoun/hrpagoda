<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Iwallet extends CI_Model {
	public function getIwalletTransferList($from_date=null,$to_date=null,$from_member=null,$to_member=null) {
		$use_branch_id=$this->session->userdata('use_branch_id');
		
		$this -> db -> select('i.*,f.full_name as f_name,f.member_code as f_code,t.full_name as t_name,t.member_code as t_code');
		$this -> db -> from('iwallet_transfer AS i');
		$this -> db -> join('members AS f', 'f.member_id = i.use_from_member_id');
		$this -> db -> join('members AS t', 't.member_id = i.use_to_member_id');
		if($from_date!=null && $to_date!=null){
			$this->db->where('transfer_date >=',$from_date);
			$this->db->where('transfer_date <=',$to_date);
		}
		if($from_member !=null || $from_member!=""){
			$this->db->where('use_from_member_id ',$from_member);
		}
		if($to_member !=null || $to_member!=""){
			$this->db->where('use_to_member_id ',$to_member);
		}
		
		if($use_branch_id==='1'){
			$this->db->where('f.status ',1);
			
		}else{
			$this->db->where('f.status ',1);
			$this->db->where('f.use_branch_id ',$use_branch_id);			
			
		}
		$this -> db -> order_by('iwallet_transfer_id DESC');
		$query = $this -> db -> get();
		return $query;
	}	

}
