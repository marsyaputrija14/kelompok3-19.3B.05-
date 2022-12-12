<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index()
	{
		$this->load->model('Main_Model');

		$data['products'] = $this->Main_Model->getall('products')->result();
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_home', $data);
		$this->load->view('user_footer');
	}
	public function about()
	{
		$this->load->model('Main_Model');
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_about');
		$this->load->view('user_footer');
	}
	public function shop()
	{
		$this->load->model('Main_Model');

		$data['products'] = $this->Main_Model->getall('products')->result();

		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_shop', $data);
		$this->load->view('user_footer');
	}
	public function cart_add()
	{
		$name =  $this->input->post('product_name');
		$price =  $this->input->post('product_price');
		$image =  $this->input->post('product_image');
		$uid =  $this->session->uid;
		$quantity =  $this->input->post('product_quantity');

		$this->db->insert('cart', array('user_id' => $uid, 'name' => $name, 'price' => $price, 'image' => $image, 'quantity' => $quantity));
		redirect(base_url('user/shop'));
	}
	public function contact()
	{
		$this->load->model('Main_Model');
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_contact', $data);
		$this->load->view('user_footer');
	}
	public function contact_add()
	{
		$name =  $this->input->post('name');
		$email =  $this->input->post('email');
		$number =  $this->input->post('number');
		$uid =  $this->session->uid;
		$message =  $this->input->post('message');
		$this->db->insert('message', array('user_id' => $uid, 'name' => $name, 'email' => $email, 'number' => $number, 'message' => $message));
		redirect(base_url('user/contact'));
	}

	public function orders()
	{
		$this->load->model('Main_Model');
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$data['orders'] = $this->Main_Model->get_where('orders',array('user_id' => $this->session->uid))->result();
		$this->load->view('user_header', $data);
		$this->load->view('user_order', $data);
		$this->load->view('user_footer');
	}
	public function search()
	{
		$this->load->model('Main_Model');
		$search =  $this->input->post('search');
		if ($search) {
			$this->db->like('name', $search);
			$this->db->from('products');
			$data['products'] =  $this->db->get()->result();
		} else {
			$data['products'] =  NULL;
		}
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_search', $data);
		$this->load->view('user_footer');
	}
	public function cart()
	{
		$this->load->model('Main_Model');
		$data['cart'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->result();
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_cart', $data);
		$this->load->view('user_footer');
	}
	public function cart_delete($id)
	{
		$this->db->delete('cart', array('id' => $id));
		redirect(base_url('user/cart'));
	}
	public function cart_update()
	{

		$this->db->set('quantity', $this->input->post('cart_quantity'));
		$this->db->update('cart');
		redirect(base_url('user/cart'));
	}
	public function cart_delete_all()
	{
		$this->db->delete('cart', array('user_id' => $this->session->uid));
		redirect(base_url('user/cart'));
	}
	public function checkout()
	{
		$this->load->model('Main_Model');
		$data['cart'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->result();
		$data['cart_row_number'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->num_rows();

		$this->load->view('user_header', $data);
		$this->load->view('user_checkout', $data);
		$this->load->view('user_footer');
	}
	public function checkout_add()
	{
		$this->load->model('Main_Model');
		$data['cart'] = $this->Main_Model->get_where('cart', array('user_id' => $this->session->uid))->result();

		$cart_total = 0;
		if ($data['cart']) {
			foreach ($data['cart'] as $key => $value) {
				$cart_products[] = $value->name . ' (' . $value->quantity . ')';
				$sub_total = $value->price * $value->quantity;
				$cart_total = $sub_total;
			}
		}
		$total_products = implode(', ',$cart_products);
		$name =  $this->input->post('name');
		$number =  $this->input->post('number');
		$email =  $this->input->post('email');
		$method =  $this->input->post('method');
		$alamat = $this->input->post('flat').' - '. $this->input->post('street').' - '. $this->input->post('city').' - '. $this->input->post('staet').' - '. $this->input->post('country').' - '. $this->input->post('pin_code');
		$uid =  $this->session->uid;
		$placed_on = date('d-M-Y');
		$this->db->insert('orders', array(
			'user_id' => $uid, 
			'name' => $name, 
			'email' => $email, 
			'number' => $number, 
			'method' => $method, 
			'address' => $alamat, 
			'total_products' => $total_products,
			'total_price' => $cart_total,
			'placed_on' => $placed_on
		));
		$this->db->delete('cart', array('user_id' => $uid));
		redirect(base_url('user/orders'));
	}
}
