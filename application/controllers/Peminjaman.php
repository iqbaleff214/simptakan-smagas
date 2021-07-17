<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Peminjaman_model::class, 'peminjaman');
        $this->load->model(PeminjamanDetail_model::class, 'detail');
        $this->load->model(Siswa_model::class, 'siswa');
        $this->load->model(Buku_model::class, 'buku');
    }

	public function index()
	{
		$this->form_validation->set_rules('tanggal_tenggat', 'Pinjam', 'required');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Peminjaman',
            'sidebar' => ['peminjaman'],
            'siswa' => $this->siswa->getAll(),
            'buku' => $this->buku->getAllAvailable(),
            'dipinjam' => $this->detail->getAllDipinjam(),
        ];

		view('peminjaman/index', $data);
	}

    public function history()
    {
        $data = [
            'title' => 'Riwayat Peminjaman',
            'sidebar' => ['peminjaman'],
            'items' => $this->detail->getAllDetail(),
        ];

		view('peminjaman/history', $data);
    }

    public function pengembalian($id)
    {
        $no = $this->detail->getDetail($id);
        $denda = round((time() - strtotime($no['tanggal_tenggat'])) / 60 / 60 / 24) * 500;
        $data = [
            'tanggal_kembali' => date('Y-m-d H:i:s'),
            'denda' => $denda < 0 ? 0 : $denda,
        ];
		$message = 'Buku ' . ($this->detail->update($data, $id) ? 'berhasil' : 'gagal') . ' dikembalikan!';
		setMessage($message);
		redirect('/peminjaman');
    }

    public function perpanjang()
    {
        $no = $this->input->post('no_peminjaman');
        $tenggat = $this->input->post('tanggal_tenggat');

		$message = 'Peminjaman buku ' . ($this->peminjaman->update(['tanggal_tenggat' => $tenggat], $no) ? 'berhasil' : 'gagal') . ' diperpanjang!';
		setMessage($message);
		redirect('/peminjaman');
    }

    private function _store() {
        $data = $this->input->post();

        if (array_count_values($data['id_buku'])['-'] == 3) return redirect('/peminjaman');

        $peminjaman = [
            'nis' => $data['nis'],
            'tanggal_tenggat' => $data['tanggal_tenggat'],
            'keterangan' => $data['keterangan'],
        ];

        $no = $this->peminjaman->insert($peminjaman);

        foreach ($data['id_buku'] as $id_buku) {
            if ($id_buku == '-') continue;
            $this->detail->insert([
                'no_peminjaman' => $no,
                'id_buku' => $id_buku,
                'tanggal_kembali' => null,
            ]);
        }

        $message = 'Berhasil meminjamkan buku!';
		setMessage($message);
		redirect('/peminjaman');

    }
}
