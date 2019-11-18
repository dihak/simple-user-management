<?php
class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$result = [];

		if ($data = $this->users_model->login($email, $password)) {
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
			<button class="btn btn-sm btn-danger" onclick="delete_user(this, $1)">DELETE</button>
		', 'id');
		return print_r($this->datatables->generate());
	}

	public function edit_user() {
		$result = [];
		$result['success'] = false;

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$passold = $this->input->post('passold');
		$passnew = $this->input->post('passnew');
		$passconf = $this->input->post('passconf');

		$user = $this->users_model->get($id);

		$new_data = [
			'nama' => $nama
		];

		// Validation
		if ($passold) {
			if ($passnew !== $passconf) {
				$result['error'] = 'New password not match';
				echo json_encode($result);
				return;
			}

			if (!password_verify($passold, $user->password)) {
				$result['error'] = 'Wrong password';
				echo json_encode($result);
				return;
			}
			$new_data['password'] = $passnew;
		}

		// File Upload
		if (!empty($_FILES['photo']['name'])) {
			$config['upload_path']          = './uploads/img/';
			$config['file_name']			= $id;
			$config['overwrite']			= true;
			$config['allowed_types']        = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('photo')) {
				$result['error'] = $this->upload->display_errors();
				echo json_encode($result);
				return;
			}
			$photo = $this->upload->data();
			$new_data['photo'] = $photo['file_name'];
		}

		$query = $this->users_model->update($id, $new_data);
		if ($query) {
			$result['success'] = true;
		}
		echo json_encode($result);
	}

	public function delete_user() {
		$result = [];
		$id = $this->input->post('id');
		$query = $this->users_model->delete($id);
		if ($query) {
			$result['success'] = true;
		} else {
			$result['success'] = false;
		}
		echo json_encode($result);
	}
}
