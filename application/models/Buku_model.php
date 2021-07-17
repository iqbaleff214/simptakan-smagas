<?php
defined('BASEPATH') or exit;

class Buku_model extends MY_Model
{
	protected $table = 'buku';
	protected $id = 'id_buku';

	public function getAllAvailable()
	{
		$this->db->where('jumlah >', 0);
		return $this->getAll();
	}

	public function getAllData()
	{
		$this->db->select("{$this->table}.*, rak.rak as rak, penerbit.penerbit, kategori.kategori, klasifikasi.klasifikasi");
		$this->db->join('rak', 'buku.id_rak=rak.id_rak');
		$this->db->join('kategori', 'buku.id_kategori=kategori.id_kategori');
		$this->db->join('penerbit', 'buku.id_penerbit=penerbit.id_penerbit');
		$this->db->join('klasifikasi', 'buku.kode_klasifikasi=klasifikasi.kode_klasifikasi');
		return $this->db->get($this->table)->result_array();
	}

	public function getAllDataLike($key)
	{
		$this->db->like('buku.judul', $key);
		return $this->getAllData();
	}

	public function getData($id)
	{
		$this->db->select("{$this->table}.*, rak.rak as rak, penerbit.penerbit, kategori.kategori, klasifikasi.klasifikasi");
		$this->db->join('rak', 'buku.id_rak=rak.id_rak');
		$this->db->join('kategori', 'buku.id_kategori=kategori.id_kategori');
		$this->db->join('penerbit', 'buku.id_penerbit=penerbit.id_penerbit');
		$this->db->join('klasifikasi', 'buku.kode_klasifikasi=klasifikasi.kode_klasifikasi');
		$this->db->where('buku.id_buku', $id);
		return $this->db->get($this->table)->row_array();
	}
}