<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Penerbit_model::class, 'penerbit');
    }

	public function index()
	{
        $data = [
            'title' => 'Penerbit',
            'sidebar' => ['penerbit', 'karakteristik'],
            'items' => $this->penerbit->getAll(),
        ];
		view('penerbit/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Penerbit',
            'sidebar' => ['penerbit', 'karakteristik'],
        ];
		view('penerbit/create', $data);
	}

	public function edit($id)
	{
        $item = $this->penerbit->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Penerbit',
            'sidebar' => ['penerbit', 'karakteristik'],
            'item' => $item
        ];
		view('penerbit/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data penerbit ' . ($this->penerbit->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/penerbit');
    }

	private function _store()
	{
		$data = $this->input->post();
		$message = 'Data penerbit ' . ($this->penerbit->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/penerbit');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data penerbit ' . ($this->penerbit->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/penerbit');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
	}
}


