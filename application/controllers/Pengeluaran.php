<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(BukuKeluar_model::class, 'keluar');
        $this->load->model(Buku_model::class, 'buku');
    }

	public function index()
	{
		$this->form_validation->set_rules('id_buku', 'Buku', 'required');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Pengeluaran',
            'sidebar' => ['pengeluaran'],
            'buku' => $this->buku->getAllAvailable(),
        ];

		view('pengeluaran/index', $data);
	}

    public function history()
    {
        $data = [
            'title' => 'Riwayat Pengeluaran',
            'sidebar' => ['pengeluaran'],
            'items' => $this->keluar->getAllDetail(),
        ];

		view('pengeluaran/history', $data);
    }

    private function _store() {
        $data = $this->input->post();
		$message = 'Buku ' . ($this->keluar->insert($data) ? 'berhasil' : 'gagal') . ' dikeluarkan!';
		setMessage($message);
		redirect('/pengeluaran');

    }
}
