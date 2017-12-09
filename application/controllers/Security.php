<?php
class Security extends CI_Controller {
	
	function __construct($module_id = null) {
		parent::__construct();
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		if (!$this -> User -> is_logged_in()) {
			redirect('login');
		}
		
		/*if (!$this -> User-> has_access_permission($module_id, $this -> model_authors -> get_logged_in_author_info() -> author_id)) {
			redirect('author-accessibility/no-permission-access/' .  $module_id);
		}*/

		//load up global data
		/*$logged_in_author_info = $this -> model_authors -> get_logged_in_author_info();
		$data['author_info'] = $logged_in_author_info;
		$this -> load -> vars($data);*/
		//$this->config->set_item('language', 'english' );
		//$this->lang->load(array('sidebar','table','form'), 'khmer');
		$lang= $this->session->userdata('language');

		if($lang != ''){
		    switch($lang){
		        case    'en'    :   
		            $this->lang->load(array('sidebar','table','form'), 'english');
		            break;
		        case    'kh'    :   
		            $this->lang->load(array('sidebar','table','form'), 'khmer');
		            break;
		    }
		}
		foreach( $this->Globals->select_all('setting')->result() as $config )
		    {
		        $this->config->set_item( $config->key, $config->value );
		    }
		
	}

}
