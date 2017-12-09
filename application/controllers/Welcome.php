<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$data['title'] = 'Home';
		$data['sliders'] = $this -> Globals -> select_all('sliders', 3, 'slider_id ASC');
		$data['services'] = $this -> Globals -> select_all('services', 4, 'service_id ASC');
		$data['blogs'] = $this -> Globals -> select_all('blogs', 6, 'blog_id DESC');
		$data['testimonails'] = $this -> Globals -> select_all('testimonails', 3, 'testimonail_id DESC');
		$this -> load -> view('frontend/index', $data);
	}

}
