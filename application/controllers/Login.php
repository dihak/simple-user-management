<?php
class Login extends CI_Controller {
	public function index()
	{
		$data = [];
		$data['success'] = $this->input->get('success') !== null;
		$this->load->view('login', $data);
	}
}
