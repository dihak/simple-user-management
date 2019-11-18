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
}
?>
