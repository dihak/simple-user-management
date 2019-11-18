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

		if ($this->users->login($email, $password)) {
			$result['success'] = true;
		} else {
			$result['success'] = false;
		}

		echo json_encode($result);
	}
}
