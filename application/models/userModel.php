<?php 

class UserModel extends CI_Model{
	function getRandom() {
		$this->db->select('r.nama, s.a, s.b, s.ab, s.o')
          ->from('rspmi AS r, statdarah AS s')
          ->where('r.id_rspmi = s.id_rspmi')
          ->order_by('rand()')
          ->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
}