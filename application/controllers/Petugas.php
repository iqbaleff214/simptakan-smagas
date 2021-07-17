<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        isNotKepala();
        $this->load->model(Petugas_model::class, 'petugas');
        $this->load->model(Akun_model::class, 'akun');
    }

	public function index()
	{
        $data = [
            'title' => 'Petugas',
            'sidebar' => ['petugas'],
            'items' => $this->petugas->getAll(),
        ];
		view('petugas/index', $data);
	}

	public function create()
	{
        $this->_rules();
		$this->form_validation->set_rules('password_again', 'Petugas', 'required|matches[password]');
		$this->form_validation->set_rules('password', 'Petugas', 'required|matches[password_again]');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Petugas',
            'sidebar' => ['petugas'],
        ];
		view('petugas/create', $data);
	}

	public function edit($id)
	{
        $item = $this->petugas->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id, $item);

        $data = [
            'title' => 'Petugas',
            'sidebar' => ['petugas'],
            'item' => $item
        ];
		view('petugas/edit', $data);
	}

	public function show($id)
	{
        $item = $this->petugas->get($id);

        $data = [
            'title' => 'Petugas',
            'sidebar' => ['petugas'],
            'item' => $item
        ];
		view('petugas/show', $data);
	}

    public function delete($id)
    {
        $old = $this->petugas->get($id);
        if ($old['foto']) unlink("./public/uploads/{$old['foto']}");
		$message = 'Data petugas ' . ($this->akun->delete($old['id_akun']) and $this->petugas->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/petugas');
    }

	private function _store()
	{
        $data = $this->input->post();
        // var_dump($data);die;
		$akun = [
			'username' => $this->input->post('username') ?: $this->input->post('nip'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'peran' => 'petugas',
		];
		$petugas = [
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'jabatan' => 'Petugas',
			'id_akun' => $this->akun->insert($akun),
		];
        if ($_FILES['foto']['size'] > 0) $petugas['foto'] = $this->_upload();
		$message = 'Data petugas ' . ($this->petugas->insert($petugas) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/petugas');
	}
    
	private function _update($id, $old)
	{
        $data = $this->input->post();

		if ($_FILES['foto']['size'] > 0) {
			unlink("./public/uploads/{$old['foto']}");
			$data['foto'] = $this->_upload();
		}
		
		$message = 'Data petugas ' . ($this->petugas->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/petugas');
	}

	private function _upload()
	{
		$file_ext = explode('.', $_FILES['foto']['name']);
		$config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";
		$config['max_size'] = 2048;
		$config['file_name'] = uniqid('petugas_', true) .'.' . end($file_ext);
		$config['overwrite'] = true;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')) return $this->upload->data('file_name');
		var_dump($this->upload->display_errors());die;
		return null;
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nama', 'Petugas', 'required');
	}
}


