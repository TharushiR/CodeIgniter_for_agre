<?php

class site extends CI_Controller {
	
	function index()
	{
 		$data = array(); 
		if($query = $this->site_model->get_records())
		{
			$data['records'] = $query;
		}

		$this->load->view('options_view', $data);

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

	function delete()
	{
		$this->site_model->delete_row();
		$this->index();
	}

	function update(){
		$data = array(
			'title'    => 'My first Update he he he',
			'contents' => 'Content should go here; it is updated'
		);
		$this->site_model->update_record($data);
	}
}
?>