<?php
defined('BASEPATH') or exit;

class Pengunjung_model extends MY_Model
{
	protected $table = 'pengunjung';
	protected $id = 'id_pengunjung';

	public function countToday()
	{
		$this->db->where('DATE(pengunjung.tanggal)=CURDATE()');
		return $this->count();
	}
}