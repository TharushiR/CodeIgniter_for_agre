<?php

class site extends CI_Controller {
	
	function index()
	{
 
		$this->load->view('options_view');

	}

	function create()
	{
 
		$data = array(
			'title' => $this->input->post('title'),
			'contents' => $this->input->post('contents')
		);

		$this->site_model->add_record($data);
		$this->index();
	}
}

?>