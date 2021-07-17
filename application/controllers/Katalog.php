<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(Buku_model::class, 'buku');
        $this->load->model(Ebook_model::class, 'ebook');

        $this->load->model(Rak_model::class, 'rak');
        $this->load->model(Kategori_model::class, 'kategori');
        $this->load->model(Klasifikasi_model::class, 'klasifikasi');
        $this->load->model(Penerbit_model::class, 'penerbit');

        $this->load->model(Peminjaman_model::class, 'peminjaman');
        $this->load->model(PeminjamanDetail_model::class, 'detail');
    }

	public function index()
	{
        if (!isset($_SESSION['nama'])) return redirect('logbook');
        $data = [
            'title' => 'Katalog Buku',
            'sidebar' => ['buku'],
            'items' => isset($_GET['q']) ? $this->buku->getAllDataLike($_GET['q']) : $this->buku->getAllData(),
        ];
		// view('buku/index', $data);
        guestView('katalog/index', $data);
	}

	public function show($id)
	{
        if (!isset($_SESSION['nama'])) return redirect('logbook');
        $data = [
            'title' => 'Katalog Buku',
            'sidebar' => ['buku'],
            'item' => $this->buku->getData($id),
        ];
		// view('buku/index', $data);
        guestView('katalog/show', $data);
	}

    public function pinjam()
    {
        if (!isset($_SESSION['nis'])) return redirect('logbook');
		$this->form_validation->set_rules('tanggal_tenggat', 'Pinjam', 'required');

        if ($this->form_validation->run()) {
            $data = $this->input->post();
            
            if (array_count_values($data['id_buku'])['-'] == 3) return redirect('/pinjam-buku');
    
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

            $message = 'Berhasil meminjam buku!';

            setMessage($message);
            redirect('/riwayat-pinjam-buku');
        };

        $data = [
            'title' => 'Peminjaman',
            'sidebar' => ['peminjaman'],
            'buku' => $this->buku->getAllAvailable(),
            'dipinjam' => $this->detail->getAllDipinjamNis($_SESSION['nis']),
        ];

		guestView('katalog/create', $data);
    }

    public function history()
    {
        if (!isset($_SESSION['nis'])) return redirect('logbook');

        $data = [
            'title' => 'Riwayat Peminjaman',
            'sidebar' => ['riwayat'],
            'items' => $this->detail->getAllDipinjamNis($_SESSION['nis']),
        ];

		guestView('katalog/history', $data);
    }

	public function ebook()
	{
        if (!isset($_SESSION['nama'])) return redirect('logbook');
        $data = [
            'title' => 'Katalog E-Book',
            'sidebar' => ['ebook'],
            'items' => isset($_GET['q']) ? $this->ebook->getLike($_GET['q']) : $this->ebook->getAll(),
        ];
		// view('buku/index', $data);
        guestView('katalog/index', $data);
	}

	public function show_ebook($id)
	{
        if (!isset($_SESSION['nama'])) return redirect('logbook');
        $data = [
            'title' => 'Katalog E-Book',
            'sidebar' => ['ebook'],
            'item' => $this->ebook->get($id),
        ];
		// view('buku/index', $data);
        guestView('katalog/show', $data);
	}
}


