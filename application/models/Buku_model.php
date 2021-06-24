<?php
defined('BASEPATH') or exit;

class Buku_model extends MY_Model
{
	protected $table = 'buku';
	protected $id = 'id_buku';

	public function getAllData()
	{
		$this->db->select("{$this->table}.*, rak.rak as rak_buku, penerbit.penerbit");
		$this->db->join('rak', 'buku.rak=rak.id_rak');
		$this->db->join('penerbit', 'buku.id_penerbit=penerbit.id_penerbit');
		return $this->db->get($this->table)->result_array();
	}
}