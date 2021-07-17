<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Pengadaan_model::class, 'pengadaan');
        $this->load->model(PengadaanDetail_model::class, 'detail');
        $this->load->model(Buku_model::class, 'buku');
    }

	public function index()
	{
		$this->form_validation->set_rules('sumber', 'Buku', 'required');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Pengadaan',
            'sidebar' => ['pengadaan'],
            'buku' => $this->buku->getAllAvailable(),
        ];

		view('pengadaan/index', $data);
	}

    public function history()
    {
        $data = [
            'title' => 'Riwayat Pengadaan',
            'sidebar' => ['pengadaan'],
            'items' => $this->detail->getAllDetail(),
        ];

		view('pengadaan/history', $data);
    }

    private function _store() {
        $data = $this->input->post();
        $pengadaan = [
            'sumber' => $data['sumber'],
            'pemasok' => $data['pemasok'],
            'keterangan' => $data['keterangan'],
        ];
        $id = $this->pengadaan->insert($pengadaan);
        $det = true;
        for ($i=0; $i < count($data['judul']); $i++) { 
            $buku = [
                'judul' => $data['judul'][$i],
                'isbn' => $data['isbn'][$i],
                'pengarang' => $data['pengarang'][$i],
                'tahun' => $data['tahun'][$i],
                'jumlah' => $data['jumlah'][$i],
            ];

            $detail = [
                'id_pengadaan' => $id,
                'id_buku' => $this->buku->insert($buku),
                'jumlah' => $data['jumlah'][$i],
                'harga' => $data['harga'][$i],
            ];

            $det = $det and $this->detail->insert($detail);
        }
		$message = $det ? 'Buku berhasil ditambahkan!' : 'Buku gagak ditambahkan!';
		setMessage($message);
		redirect('/buku');

    }
}
