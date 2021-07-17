<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Buku_model::class, 'buku');

        $this->load->model(Rak_model::class, 'rak');
        $this->load->model(Kategori_model::class, 'kategori');
        $this->load->model(Klasifikasi_model::class, 'klasifikasi');
        $this->load->model(Penerbit_model::class, 'penerbit');
    }

	public function index()
	{
        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'items' => $this->buku->getAll(),
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
                'klasifikasi' => $this->klasifikasi->getAll(),
                'kategori' => $this->kategori->getAll(),
            ]
        ];
		view('buku/create', $data);
	}

	public function edit($id)
	{
        $item = $this->buku->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id, $item);

        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'item' => $item,
            'data' => [
                'rak' => $this->rak->getAll(),
                'penerbit' => $this->penerbit->getAll(),
                'klasifikasi' => $this->klasifikasi->getAll(),
                'kategori' => $this->kategori->getAll(),
            ]
        ];
		view('buku/edit', $data);
	}

	public function show($id)
	{
        $item = $this->buku->getData($id);

        $data = [
            'title' => 'Buku',
            'sidebar' => ['buku'],
            'item' => $item,
        ];

        // var_dump($item);die;

		view('buku/show', $data);
	}

    public function delete($id)
    {
        $old = $this->buku->get($id);
        if ($old['foto']) unlink("./public/uploads/{$old['foto']}");
		$message = 'Data buku ' . ($this->buku->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/buku');
    }

	private function _store()
	{
		$data = $this->input->post();
        $data['isbn'] = str_replace('-', '', $data['isbn']);
        $data['isbn'] = str_replace(' ', '', $data['isbn']);
        if ($_FILES['foto']['size'] > 0) $data['foto'] = $this->_upload();
		$message = 'Data buku ' . ($this->buku->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/buku');
	}

	private function _update($id, $old)
	{
		$data = $this->input->post();
        $data['isbn'] = str_replace('-', '', $data['isbn']);
        $data['isbn'] = str_replace(' ', '', $data['isbn']);

		if ($_FILES['foto']['size'] > 0) {
			unlink("./public/uploads/{$old['foto']}");
			$data['foto'] = $this->_upload();
		}

		$message = 'Data buku ' . ($this->buku->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/buku');
	}

	private function _upload()
	{
		$file_ext = explode('.', $_FILES['foto']['name']);
		$config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";
		$config['max_size'] = 2048;
		$config['file_name'] = uniqid('buku_', true) .'.' . end($file_ext);
		$config['overwrite'] = true;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')) return $this->upload->data('file_name');
		var_dump($this->upload->display_errors());die;
		return null;
	}

	private function _rules()
	{
		$this->form_validation->set_rules('judul', 'Buku', 'required');
	}
}


