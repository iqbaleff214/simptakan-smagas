<?php
defined('BASEPATH') or exit;

class Petugas_model extends MY_Model
{
	protected $table = 'petugas';
	protected $id = 'id_petugas';

    public function getByAkun($id)
    {
        return $this->db->get_where($this->table, ['id_akun' => $id])->row_array();
    }
}