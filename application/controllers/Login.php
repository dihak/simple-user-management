<?php
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') == 'login') {
			redirect('users');
		}
	}

	public function index()
	{
		$data = [];
		$data['success'] = $this->input->get('success') !== null;
		$this->load->view('login', $data);
	}
}
