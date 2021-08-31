<?php
defined('BASEPATH') or exit;

class Siswa_model extends MY_Model
{
	protected $table = 'siswa';
	protected $id = 'nis';

    public function getByAkun($id)
    {
        return $this->db->get_where($this->table, ['id_akun' => $id])->row_array();
    }

    public function getByEmail($email)
    {
        return $this->db->get_where($this->table, ['email' => $email])->row_array();
    }
}