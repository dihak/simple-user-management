<?php
class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [];

		// Input data
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$passconf = $this->input->post('passconf');

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
			'value' => $email
		];
		$data['input_password'] = [
			'name' => 'password',
			'class' => 'form-control',
			'placeholder' => 'Password',
			'type' => 'password',
			'value' => $password
		];
		$data['input_passconf'] = [
			'name' => 'passconf',
			'class' => 'form-control',
			'placeholder' => 'Retype password',
			'type' => 'password',
			'value' => $passconf
		];

		// Validation
		$this->form_validation->set_rules('nama', 'Full name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('terms', 'Terms', 'required');
		if ($this->form_validation->run() != false) {
			$this->users_model->create([
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
			]);
			redirect('/login?success');
		}

		$this->load->view('register', $data);
	}
}

