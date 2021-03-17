<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// model super admin
class UserModel extends CI_Model {

	public function get_where_specific($select = '', $where = [], $table = '')
	{
		$this->db->select($select);
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	

}