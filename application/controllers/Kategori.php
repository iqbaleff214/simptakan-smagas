<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Kategori_model::class, 'kategori');
    }

	public function index()
	{
        $data = [
            'title' => 'Kategori',
            'sidebar' => ['kategori', 'karakteristik'],
            'items' => $this->kategori->getAll(),
        ];
		view('kategori/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Kategori',
            'sidebar' => ['kategori', 'karakteristik'],
        ];
		view('kategori/create', $data);
	}

	public function edit($id)
	{
        $item = $this->kategori->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Kategori',
            'sidebar' => ['kategori', 'karakteristik'],
            'item' => $item
        ];
		view('kategori/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data kategori ' . ($this->kategori->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/kategori');
    }

	private function _store()
	{
		$data = $this->input->post();
		$message = 'Data kategori ' . ($this->kategori->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/kategori');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data kategori ' . ($this->kategori->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/kategori');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
	}
}


