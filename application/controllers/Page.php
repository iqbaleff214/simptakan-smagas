<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(Buku_model::class, 'buku');
        $this->load->model(Siswa_model::class, 'siswa');
        $this->load->model(Peminjaman_model::class, 'pinjam');
        $this->load->model(Pengunjung_model::class, 'kunjung');

        $this->load->model(PeminjamanDetail_model::class, 'peminjaman_detail');
        $this->load->model(PengadaanDetail_model::class, 'pengadaan_detail');
        $this->load->model(BukuKeluar_model::class, 'pengeluaran');
        $this->load->model(Pengunjung_model::class, 'pengunjung');

        $this->load->model(Petugas_model::class, 'petugas');
    }

	public function index()
	{
        $data = [
            'buku' => $this->buku->getAllPopular(),
            'petugas' => $this->petugas->getAll(),
        ];
        $this->load->view('pages/frontend', $data);
	}

	public function dashboard()
	{
		if (!isLogin()) return redirect('/login');
        if (isJabatan('Anggota') or isJabatan('Pengunjung')) return redirect('katalog');
        $data = [
            'title' => 'Dashboard',
            'sidebar' => ['dashboard'],
            'count' => [
                'buku' => $this->buku->count(),
                'siswa' => $this->siswa->count(),
                'pinjam' => $this->pinjam->countToday(),
                'kunjung' => $this->kunjung->countToday(),
            ],
            'populer' => $this->peminjaman_detail->getPopular()
        ];

		view('dashboard', $data);
	}

    public function peminjaman()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Peminjaman',
            'sidebar' => ['peminjaman'],
            'items' => $this->peminjaman_detail->getAllDetail(),
        ];

		view('peminjaman/history', $data);
    }

    public function peminjaman_today()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Peminjaman',
            'sidebar' => ['peminjaman'],
            'items' => $this->peminjaman_detail->getAllDetailToday(),
        ];

		view('peminjaman/history', $data);
    }

    public function pengadaan()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Pengadaan',
            'sidebar' => ['pengadaan'],
            'items' => $this->pengadaan_detail->getAllDetail(),
        ];

		view('pengadaan/history', $data);
    }

    public function pengeluaran()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Pengeluaran',
            'sidebar' => ['pengeluaran'],
            'items' => $this->pengeluaran->getAllDetail(),
        ];

		view('pengeluaran/history', $data);
    }

    public function pengunjung()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Kunjungan',
            'sidebar' => ['pengunjung'],
            'items' => $this->pengunjung->getAll(),
        ];

		view('pengunjung/index', $data);
    }

    public function pengunjung_today()
    {
		if (!isLogin()) return redirect('/login');
        $data = [
            'title' => 'Laporan Kunjungan',
            'sidebar' => ['pengunjung'],
            'items' => $this->pengunjung->getAllToday(),
        ];

		view('pengunjung/index', $data);
    }
}
