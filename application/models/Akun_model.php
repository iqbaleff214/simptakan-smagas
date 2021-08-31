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

	public function createToken($id, $token)
	{
		return $this->db->insert('password_reset', [
			'id_akun' => $id,
			'token' => $token,
			'created_at' => time(),
		]);
	}

	public function checkToken($token, $email)
	{
		$this->db->select('password_reset.*, siswa.email, akun.*');
		$this->db->join('akun', 'akun.id_akun=password_reset.id_akun');
		$this->db->join('siswa', 'siswa.id_akun=password_reset.id_akun');
		$this->db->where('siswa.email', $email);
		$this->db->where('password_reset.token', $token);
		return $this->db->get('password_reset')->row_array();
	}

	public function deleteToken($token)
	{
		return $this->db->delete('password_reset', ['token' => $token]);
	}
}