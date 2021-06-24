<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Rak_model::class, 'rak');
    }

	public function index()
	{
        $data = [
            'title' => 'Rak',
            'sidebar' => ['rak', 'karakteristik'],
            'items' => $this->rak->getAll(),
        ];
		view('rak/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Rak',
            'sidebar' => ['rak', 'karakteristik'],
        ];
		view('rak/create', $data);
	}

	public function edit($id)
	{
        $item = $this->rak->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Rak',
            'sidebar' => ['rak', 'karakteristik'],
            'item' => $item
        ];
		view('rak/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data rak ' . ($this->rak->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/rak');
    }

	private function _store()
	{
		$data = $this->input->post();
		$message = 'Data rak ' . ($this->rak->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/rak');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data rak ' . ($this->rak->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/rak');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('rak', 'Rak', 'required');
	}
}


