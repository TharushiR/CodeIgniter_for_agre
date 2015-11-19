<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->login();
	}

	public function login() 
	{
		$this->load->view('Home');
	}

	public function members(){
		$this->load->view('members');
	}

	public function login_validation(){
		 //$this->output->append_output("Here:");
		$this->load->library('form_validation');

		 $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentails');
		 $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
	
		 if($this->form_validation->run()){
		 	redirect('main/members');
		 }else{
		 	$this->load->view('home');
		 }

		 echo $this->input->post('email');
	}
}
