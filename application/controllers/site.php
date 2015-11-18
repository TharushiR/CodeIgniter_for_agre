<?php

class site extends CI_Controller {
	function index(){

		$this->load->model('site_model');
		$data['recodes'] = $this->site_model->getAll();
		$this->load->view('home', $data);
	}

 // function about(){
 // 	$this->load->view('about');
 // }
}
 ?>