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


