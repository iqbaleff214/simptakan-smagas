<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Ebook_model::class, 'ebook');
    }

	public function index()
	{
        $data = [
            'title' => 'Ebook',
            'sidebar' => ['ebook'],
            'items' => $this->ebook->getAll(),
        ];
		view('ebook/index', $data);
	}

	public function create()
	{
        $this->_rules();

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Ebook',
            'sidebar' => ['ebook'],
        ];
		view('ebook/create', $data);
	}

	public function edit($id)
	{
        $item = $this->ebook->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id, $item);

        $data = [
            'title' => 'Ebook',
            'sidebar' => ['ebook'],
            'item' => $item,
        ];
		view('ebook/edit', $data);
	}

	public function show($id)
	{
        $data = [
            'title' => 'Ebook',
            'sidebar' => ['ebook'],
            'item' => $this->ebook->get($id),
        ];

		view('ebook/show', $data);
	}

    public function delete($id)
    {
        $old = $this->ebook->get($id);
        if ($old['foto']) unlink("./public/uploads/{$old['foto']}");
        if ($old['berkas']) unlink("./public/uploads/{$old['berkas']}");
		$message = 'Data ebook ' . ($this->ebook->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/ebook');
    }

	private function _store()
	{
		$data = $this->input->post();
        $data['isbn'] = str_replace('-', '', $data['isbn']);
        $data['isbn'] = str_replace(' ', '', $data['isbn']);
        if ($_FILES['foto']['size'] > 0) $data['foto'] = $this->_upload('foto');
        if ($_FILES['berkas']['size'] > 0) $data['berkas'] = $this->_upload('berkas');
		$message = 'Data ebook ' . ($this->ebook->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/ebook');
	}

	private function _update($id, $old)
	{
		$data = $this->input->post();
        $data['isbn'] = str_replace('-', '', $data['isbn']);
        $data['isbn'] = str_replace(' ', '', $data['isbn']);

		if ($_FILES['foto']['size'] > 0) {
			unlink("./public/uploads/{$old['foto']}");
			$data['foto'] = $this->_upload('foto');
		}

		if ($_FILES['berkas']['size'] > 0) {
			unlink("./public/uploads/{$old['berkas']}");
			$data['berkas'] = $this->_upload('berkas');
		}

		$message = 'Data ebook ' . ($this->ebook->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/ebook');
	}

	private function _upload($name)
	{
		$file_ext = explode('.', $_FILES[$name]['name']);
		$config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = $name == 'foto' ? "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF" : 'pdf';
		$config['max_size'] = 2048;
		$config['file_name'] = uniqid('ebook_', true) .'.' . end($file_ext);
		$config['overwrite'] = true;

		$this->upload->initialize($config);

		if ($this->upload->do_upload($name)) return $this->upload->data('file_name');
		var_dump($this->upload->display_errors());die;
		return null;
	}

	private function _rules()
	{
		$this->form_validation->set_rules('judul', 'Ebook', 'required');
	}
}


