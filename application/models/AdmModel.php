<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// model super admin
class AdmModel extends CI_Model {

	public function get_random_limit_one()
	{
		$this->db->select('id_adm');
		$this->db->order_by('id_adm', 'RANDOM');
		$this->db->limit(1);
		return $this->db->get('adm')->row_array();
	}

	

}