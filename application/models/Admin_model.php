<?php
defined('BASEPATH') or exit;

class Admin_model extends MY_Model
{
	protected $table = 'admin';
	protected $id = 'id_admin';

	public function getByEmail($email)
	{
		return $this->db->get_where($this->table, ['email' => $email])->row_array();
	}
}