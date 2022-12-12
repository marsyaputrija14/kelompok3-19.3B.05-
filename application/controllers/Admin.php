<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$this->load->model('Main_Model');
		$d = $this->Main_Model->select_sum('orders', 'total_price', 'pending');
		$data['pending'] = $d[0]->total_price ?? 0;

		$d = $this->Main_Model->select_sum('orders', 'total_price', 'completed');
		$data['completed'] = $d[0]->total_price ?? 0;

		$d = $this->Main_Model->getall('orders');
		$data['total_order'] = $d->num_rows();

		$d = $this->Main_Model->getall('products');
		$data['total_products'] = $d->num_rows();

		$d = $this->Main_Model->get_where('users', array('user_type' => 'user'));
		$data['total_user'] = $d->num_rows();

		$d = $this->Main_Model->get_where('users', array('user_type' => 'admin'));
		$data['total_admin'] = $d->num_rows();

		$d = $this->Main_Model->getall('users');
		$data['total_akun'] = $d->num_rows();

		$d = $this->Main_Model->getall('message');
		$data['total_pesan'] = $d->num_rows();

		$this->load->view('admin_header');
		$this->load->view('admin_page', $data);
	}
	public function products()
	{
		$this->load->model('Main_Model');

		$data['products'] = $this->Main_Model->getall('products');

		$this->load->view('admin_header');
		$this->load->view('admin_products', $data);
	}
	public function products_tambah()
	{
		$this->load->model('Main_Model');
		$image = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = 'assets/uploaded_img/' . $image;

		$name =  $this->input->post('name');
		$price =  $this->input->post('price');

		$cek = $this->db->get_where('products', array('name' => $name));
		if ($cek->num_rows > 0) {
			$data['message'][] = "Pruduk already exist";
		} else {
			$add_product_query = $this->db->insert('products', array('name' => $name, 'price' => $price, 'image' => $image));
			if ($add_product_query) {
				if ($image_size > 2000000) {
					$data['message'][] = 'image size is too large';
				} else {
					move_uploaded_file($image_tmp_name, $image_folder);
					$data['message'][] = 'product added successfully!';
				}
			} else {
				$data['message'][] = 'product could not be added!';
			}
		}
		$data['products'] = $this->Main_Model->getall('products');
		$this->load->view('admin_header');
		$this->load->view('admin_products', $data);
	}
	public function products_delete($id)
	{
		$this->load->model('Main_Model');
		$d = $this->Main_Model->get_where('products', array('id' => $id))->result();
		$this->db->delete('products', array('id' => $id));
		unlink('assets/uploaded_img/' . $d[0]->image);
		redirect(base_url('admin/products'));
	}
	public function products_update($id)
	{
		$this->load->model('Main_Model');

		$data['products'] = $this->Main_Model->getall('products');
		$data['update'] = $this->Main_Model->get_where('products', array('id' => $id))->result();

		$this->load->view('admin_header');
		$this->load->view('admin_products', $data);
	}
	public function products_up()
	{
		$this->load->model('Main_Model');

		$update_p_id = $this->input->post('update_p_id');
		$update_name = $this->input->post('update_name');
		$update_price = $this->input->post('update_price');

		$this->db->set('name', $update_name);
		$this->db->set('price', $update_price);
		$this->db->where('id', $update_p_id);
		$this->db->update('products');

		$update_image = $_FILES['update_image']['name'];
		$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
		$update_image_size = $_FILES['update_image']['size'];
		$update_folder = 'assets/uploaded_img/' . $update_image;
		$update_old_image = $_POST['update_old_image'];
		if (!empty($update_image)) {
			if ($update_image_size > 2000000) {
				$data['message'][] = 'image file size is too large';
			} else {
				$this->db->set('image', $update_image);
				$this->db->where('id', $update_p_id);
				$this->db->update('products');

				move_uploaded_file($update_image_tmp_name, $update_folder);
				unlink('assets/uploaded_img/' . $update_old_image);
			}
		}
		redirect(base_url('admin/products'));
	}
	public function orders()
	{
		$this->load->model('Main_Model');
		$data['orders'] = $this->Main_Model->getall('orders')->result();

		$this->load->view('admin_header');
		$this->load->view('admin_orders', $data);
	}
	public function orders_update()
	{
		$id = $this->input->post('order_id');
		$update_payment = $this->input->post('update_payment');

		$this->db->set('payment_status', $update_payment);
		$this->db->where('id', $id);
		$this->db->update('orders');

		redirect(base_url('admin/orders'));
	}
	public function orders_delete($id)
	{
		$this->db->delete('orders', array('id' => $id));
		redirect(base_url('admin/orders'));
	}
	public function users()
	{
		$this->load->model('Main_Model');
		$data['users'] = $this->Main_Model->getall('users')->result();

		$this->load->view('admin_header');
		$this->load->view('admin_users', $data);
	}
	public function users_delete($id)
	{
		$this->db->delete('users', array('id' => $id));
		redirect(base_url('admin/users'));
	}
	public function messages()
	{
		$this->load->model('Main_Model');
		$data['messages'] = $this->Main_Model->getall('message')->result();

		$this->load->view('admin_header');
		$this->load->view('admin_messages', $data);
	}
	public function messages_delete($id)
	{
		$this->db->delete('message', array('id' => $id));
		redirect(base_url('admin/messages'));
	}
}
