<?php 

class Loginmodel extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function insert_user($data)
    {
    	return $this->db->insert('usertable', $data);
	}
}