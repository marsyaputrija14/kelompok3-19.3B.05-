<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
	public function get_where($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	public function insert($table,$data)
	{
		$this->db->insert($table, $data);
	}
}
