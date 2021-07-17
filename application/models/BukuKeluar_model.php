<?php
defined('BASEPATH') or exit;

class BukuKeluar_model extends MY_Model
{
	protected $table = 'buku_keluar';
	protected $id = 'id_pengeluaran';

	public function getAllDetail()
	{
		$this->db->select("buku_keluar.*, buku.judul, buku.jumlah as sisa");
		$this->db->join('buku', 'buku_keluar.id_buku=buku.id_buku');
		return $this->db->get($this->table)->result_array();
	}
}