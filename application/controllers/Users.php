<?php
class Users extends CI_Controller {
	private $user;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
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

	public function edit($id) {
		$data = [];
		$data['user'] = $this->users_model->get($id);

		// Input data
		$nama = $data['user']->nama;
		$email = $data['user']->email;

		$data['input_nama'] = [
			'name' => 'nama',
			'class' => 'form-control',
			'placeholder' => 'Full name',
			'value' => $nama
		];
		$data['input_email'] = [
			'name' => 'email',
			'class' => 'form-control',
			'placeholder' => 'Email',
			'disabled' => true,
			'value' => $email
		];

		$scripts = ['plugins/bs-custom-file-input/bs-custom-file-input.min.js', 'dist/js/pages/users.js'];
		$this->load->view('templates/header', ['user' => $this->user]);
		$this->load->view('user_edit', $data);
		$this->load->view('templates/footer', ['scripts' => $scripts]);
	}
}

