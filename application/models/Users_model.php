<?php
class Users_model extends CI_Model {
	private $name = 'users';

	public function create($data)
	{
		if (isset($data['password'])) {
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		}

		return $this->db->insert($this->name, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->name);
	}

	public function get($id)
	{
		return $this->db->where('id', $id)->get($this->name)->row();
	}

	public function update($id, $data)
	{
		if (isset($data['password'])) {
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		}

		return $this->db->where('id', $id)->update($this->name, $data);
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete($this->name);
	}

	public function login($email, $password)
	{
		$query = $this->db->where('email', $email)->get('users');
		if ($query->num_rows() == 1) {
			$user = $query->row();
			if (password_verify($password, $user->password)) {
				return [
					'id' => $user->id,
					'nama' => $user->nama,
					'email' => $user->email,
					'photo' => $user->photo,
					'status' => 'login'
				];
			}
		}
		return false;
	}
}
?>
