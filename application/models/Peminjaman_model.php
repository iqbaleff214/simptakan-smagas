<?php
defined('BASEPATH') or exit;

class Peminjaman_model extends MY_Model
{
	protected $table = 'peminjaman';
	protected $id = 'no_peminjaman';

	public function countToday()
	{
		$this->db->where('DATE(peminjaman.tanggal_pinjam) = CURDATE()');
		return $this->count();
	}
}