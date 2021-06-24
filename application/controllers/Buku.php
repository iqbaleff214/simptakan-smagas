<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Buku_model::class, 'buku');
        $this->load->model(Rak_model::class, 'rak');
        $this->load->model(Penerbit_model::class, 'penerbit');
    }

	public function index()
	{
        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'items' => $this->buku->getAllData(),
        ];
		view('buku/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'data' => [
                'rak' => $this->rak->getAll(),
                'penerbit' => $this->penerbit->getAll(),
            ]
        ];
		view('buku/create', $data);
	}

	public function edit($id)
	{
        $item = $this->buku->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'item' => $item,
            'data' => [
                'rak' => $this->rak->getAll(),
                'penerbit' => $this->penerbit->getAll(),
            ]
        ];
		view('buku/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data buku ' . ($this->buku->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/buku');
    }

	private function _store()
	{
		$data = $this->input->post();
		$message = 'Data buku ' . ($this->buku->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/buku');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data buku ' . ($this->buku->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/buku');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('kode_buku', 'Buku', 'required');
		$this->form_validation->set_rules('rak', 'Buku', 'required');
		$this->form_validation->set_rules('id_penerbit', 'Buku', 'required');
	}
}


