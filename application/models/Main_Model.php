<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Model extends CI_Model
{
	public function getall($table)
	{
		$this->db->from($table);
		return $this->db->get();
	}
	public function get_where($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	public function insert($table,$data)
	{
		$this->db->insert($table, $data);
	}
	public function select_sum($table,$field,$where){
		$this->db->select_sum($field);
		$this->db->where('payment_status', $where);
		$this->db->from($table);
		return $this->db->get()->result();
	}
}
