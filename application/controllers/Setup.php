<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include 'Security.php';
class Setup extends Security {

	
	public function general_setting()
	{
		$data['title']="General Setting";
		$this->form_validation->set_rules('company', 'Company Name', 'required');
		
			
		if ($this -> form_validation -> run() === FALSE) {
			//$data['department_data']=$this->Globals->select_where('departments',array('department_id'=>$department_id));
			$data['general_setting']=$this->Globals->select_all('setting',null,'id ASC');
			$this->load->view('backend/index',$data);
		} else {
			
			$image_name="";
			$error_upload=FALSE;
			if (!empty($_FILES['userfile']['name'])){
				$config['upload_path'] = './dist/images/';
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
			
			if($error_upload!=TRUE && $image_name!=""){
				$batch_save_data=array(
					'company_name'=>$this->input->post('company'),
					'address'=>$this->input->post('address'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'fax'=>$this->input->post('fax'),
					'website'=>$this->input->post('website'),
					'currency'=>$this->input->post('currency'),
					'language'=>$this->input->post('language'),
					'schedule_note'=>$this->input->post('schedule_note'),
					//'timezone'=>$this->input->post('timezone'),
					'logo'=>$image_name					
				);
			}else{				
				
				$batch_save_data=array(
					'company_name'=>$this->input->post('company'),
					'address'=>$this->input->post('address'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'fax'=>$this->input->post('fax'),
					'website'=>$this->input->post('website'),
					'currency'=>$this->input->post('currency'),
					'language'=>$this->input->post('language'),
					'schedule_note'=>$this->input->post('schedule_note')					
					//'timezone'=>$this->input->post('timezone'),
				);
			}
			
			
			$is_updated= $this->Appconfig->batch_save( $batch_save_data );
			if($is_updated){
					//$activation_key=random_string('alnum', 12);
					//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'General setting was updated success !.');
				redirect('setup/general_setting');
					
			}else{
				$this -> session -> set_flashdata('error', 'General setting was updated fail !.');
				redirect('setup/general_setting');
			}
		}
	}

	public function currency()
	{
		$data['title']="Update Department";
		$this->form_validation->set_rules('name', 'Loan Name', 'required');
		
			
		if ($this -> form_validation -> run() === FALSE) {
			//$data['department_data']=$this->Globals->select_where('departments',array('department_id'=>$department_id));
			$this->load->view('backend/index',$data);
		} else {
			//$activation_key=random_string('alnum', 12);
			$data=array(
				'name'=>$this->input->post('name',TRUE),
				'description'=>$this->input->post('description',TRUE),
				//'password'=>sha1($this->input->post('password',TRUE)),
				'status'=>$this->input->post('status',TRUE)
			);
			
			$is_updated=$this->Globals->update('departments',$data,array('department_id'=>$department_id));
			if($is_updated){
					//$activation_key=random_string('alnum', 12);
					//$email=$this->input->post('email');
				$this -> session -> set_flashdata('success', 'Department selected was updated success !.');
				redirect('company/departments');
					
			}else{
				$this -> session -> set_flashdata('error', 'Department selected was updated fail !.');
				redirect('company/departments');
			}
		}
	}

}
