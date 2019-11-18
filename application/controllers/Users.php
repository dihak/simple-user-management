<?php
class Users extends CI_Controller {
	private $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = $this->session->userdata();
		if ($this->user['status'] != 'login') {
			redirect('login');
		}
	}

	public function index()
	{
		$css = ['plugins/datatables-bs4/css/dataTables.bootstrap4.css'];
		$scripts = ['plugins/datatables/jquery.dataTables.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'dist/js/pages/users.js'];
		$this->load->view('templates/header', ['user' => $this->user, 'css' => $css]);
		$this->load->view('users');
		$this->load->view('templates/footer', ['scripts' => $scripts]);
	}
}

