<?php
class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$result = [];

		if ($data = $this->users->login($email, $password)) {
			$this->session->set_userdata($data);
			$result['success'] = true;
		} else {
			$result['success'] = false;
		}

		echo json_encode($result);
	}

	public function cek_login() {
		$this->user = $this->session->userdata();
		if ($this->user['status'] == 'login') {
			return true;
		}
		return false;
	}

	public function users()
	{
		$this->load->library('datatables');
		$this->datatables->select('id,email,nama,photo');
		$this->datatables->from('users');
		$this->datatables->add_column('aksi', '
			<a class="btn btn-sm btn-primary" href="'.site_url('users/').'$1">EDIT</a>
			<a class="btn btn-sm btn-danger" href="'.site_url('users/').'$1">DELETE</a>
		', 'id');
		return print_r($this->datatables->generate());
	}

}
