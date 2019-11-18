<?php
class Users extends CI_Controller {
	public function index()
	{
		$this->load->view('list_users');
	}
}

