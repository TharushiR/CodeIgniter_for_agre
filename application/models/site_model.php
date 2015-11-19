<?php

class site_model extends Ci_Model{

	function get_records()
	{
		$query = $this->db->get('data');
		return $query->result();
	}

	function add_record($data)
	{
		$this->db->insert('data' , $data);
		return;
	}

	function update_record($data)
	{
		$this->db->where('id' , 2);
		$this->db->update('data', $data);
	}

	function delete_row($data)
	{
		$this->db->where('id', $this->url->segment(3));
		$this->db->delete('data');

		return;
	}
}
?>