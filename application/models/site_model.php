<?php

class site_model extends Ci_Model{
	function getAll(){
		$q = $this->db->get('test');

		if($q->num_rows() > 0){
			foreach ($q->result() as $row)
			{
			        $data[] = $row;
			}
		return $data;

		}else{
			echo 'error! geting data!';
		}

		
	}
}
?>