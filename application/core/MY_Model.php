<?php
defined('BASEPATH') or exit;

class MY_Model extends CI_Model
{
	protected $table = 'table';
	protected $id = 'id';

	public function get($id)
	{
		return $this->db->get_where($this->table, [$this->id => $id])->row_array();
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result_array();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($data, $id)
	{
		$this->db->where($this->id, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, [$this->id => $id]);
	}

	public function count()
	{
		return $this->db->get($this->table)->num_rows();
	}
}
