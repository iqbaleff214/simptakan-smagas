<?php
defined('BASEPATH') or exit;

class PengadaanDetail_model extends MY_Model
{
	protected $table = 'pengadaan_detail';
	protected $id = 'id_pengadaan_detail';

	public function getAllDetail()
	{
		$this->db->select("pengadaan_detail.*, pengadaan.*, buku.judul");
		$this->db->join('pengadaan', 'pengadaan.id_pengadaan=pengadaan_detail.id_pengadaan');
		$this->db->join('buku', 'pengadaan_detail.id_buku=buku.id_buku');
		return $this->db->get($this->table)->result_array();
	}
}