<?php
class Users extends CI_Model {
	private $name = 'users';

	public function create($data)
	{
		return $this->db->insert($this->name, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->name);
	}

	public function update($id, $data)
	{
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
				return true;
			}
		}
		return false;
	}
}
?>
