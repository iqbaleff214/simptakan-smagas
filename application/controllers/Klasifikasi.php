<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Klasifikasi_model::class, 'klasifikasi');
    }

	public function index()
	{
        $data = [
            'title' => 'Klasifikasi',
            'sidebar' => ['klasifikasi', 'karakteristik'],
            'items' => $this->klasifikasi->getAll(),
        ];
		view('klasifikasi/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Klasifikasi',
            'sidebar' => ['klasifikasi', 'karakteristik'],
        ];
		view('klasifikasi/create', $data);
	}

	public function edit($id)
	{
        $item = $this->klasifikasi->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Klasifikasi',
            'sidebar' => ['klasifikasi', 'karakteristik'],
            'item' => $item
        ];
		view('klasifikasi/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data klasifikasi ' . ($this->klasifikasi->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/klasifikasi');
    }

	private function _store()
	{
		$data = $this->input->post();
		$message = 'Data klasifikasi ' . ($this->klasifikasi->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/klasifikasi');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data klasifikasi ' . ($this->klasifikasi->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/klasifikasi');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required');
	}
}


