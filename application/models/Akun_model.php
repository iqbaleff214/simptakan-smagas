<?php
defined('BASEPATH') or exit;

class Akun_model extends MY_Model
{
	protected $table = 'akun';
	protected $id = 'id_akun';

	public function getByUsername($username)
	{
		return $this->db->get_where($this->table, ['username' => $username])->row_array();
	}

	public function getAllWithAnggota()
	{
		$this->db->select('akun.*, siswa.nis, siswa.nama, siswa.kelas');
		$this->db->join('siswa', 'siswa.id_akun=akun.id_akun');
		$this->db->where('akun.peran', 'anggota');
		return $this->db->get($this->table)->result_array();
	}
}