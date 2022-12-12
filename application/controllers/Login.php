<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		if ($this->session->log) {
			if ($this->session->role == 'admin') {
				redirect('admin');
			} else {
				redirect('user');
			}
		}
		$this->load->view('vlogin');
	}
	public function proses()
	{
		$this->load->library('session');
		$this->load->model('User_Model');


		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$query = $this->User_Model->get_where('users', array('email' => $email, 'password' => md5($password)));
		if ($query->num_rows() == 1) {
			$log = $query->result();
			$this->session->log = true;
			$this->session->role = $log[0]->user_type;
			$this->session->name = $log[0]->name;
			$this->session->email = $log[0]->email;
			$this->session->uid = $log[0]->id;
			if ($log[0]->user_type == 'admin') {
				redirect('admin');
			} else {
				redirect('user');
			}
		} else {
			$data['message'][] = 'incorrect email or password!';
			$this->load->view('vlogin', $data);
		}
	}
	public function register()
	{
		$this->load->view('vregister');
	}

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function reg_proses()
	{
		$this->load->library('session');
		$this->load->model('User_Model');

		$name =  $this->input->post('name');
		$email =  $this->input->post('email');
		$user_type =  $this->input->post('user_type');
		$pass =  md5($this->input->post('password'));
		$cpass =  md5($this->input->post('cpassword'));
		$query = $this->User_Model->get_where('users', array('email' => $email, 'password' => md5($pass)));
		if ($query->num_rows() == 1) {
			$data['message'][] = 'user already exist';
			$this->load->view('vregister', $data);
		} else {
			if ($pass != $cpass) {
				$data['message'][] = 'confirm password not matched!';
				$this->load->view('vregister', $data);
			} else {
				$data = array(
					'name' => $name,
					'email' => $email,
					'password' => $pass,
					'user_type' => $user_type
				);
				$this->User_Model->insert('users', $data);
				redirect(base_url().'/login');
			}
		}
	}
}
