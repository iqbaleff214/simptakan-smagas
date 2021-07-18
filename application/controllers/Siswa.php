<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Siswa_model::class, 'siswa');
        $this->load->model(Akun_model::class, 'akun');
    }

	public function index()
	{
        $data = [
            'title' => 'Siswa',
            'sidebar' => ['siswa'],
            'items' => $this->siswa->getAll(),
        ];
		view('siswa/index', $data);
	}

	public function create()
	{
        $this->_rules();
		$this->form_validation->set_rules('password_again', 'Siswa', 'required|matches[password]');
		$this->form_validation->set_rules('password', 'Siswa', 'required|matches[password_again]');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Siswa',
            'sidebar' => ['siswa'],
        ];
		view('siswa/create', $data);
	}

	public function edit($id)
	{
        $item = $this->siswa->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id, $item);

        $data = [
            'title' => 'Siswa',
            'sidebar' => ['siswa'],
            'item' => $item
        ];
		view('siswa/edit', $data);
	}

	public function show($id)
	{
        $item = $this->siswa->get($id);

        $data = [
            'title' => 'Siswa',
            'sidebar' => ['siswa'],
            'item' => $item
        ];
		view('siswa/show', $data);
	}

    public function delete($id)
    {
        $old = $this->siswa->get($id);
        if ($old['foto']) unlink("./public/uploads/{$old['foto']}");
		$message = 'Data siswa ' . (($this->akun->delete($old['id_akun']) and $this->siswa->delete($id)) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/siswa');
    }

	private function _store()
	{
		$akun = [
			'username' => $this->input->post('username') ?: $this->input->post('nis'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'peran' => 'anggota',
		];
		$siswa = [
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'kelas' => $this->input->post('kelas'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'id_akun' => $this->akun->insert($akun),
		];
        if ($_FILES['foto']['size'] > 0) $siswa['foto'] = $this->_upload();
		$message = 'Data siswa ' . ($this->siswa->insert($siswa) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/siswa');
	}
    
	private function _update($id, $old)
	{
        $data = $this->input->post();

		if ($_FILES['foto']['size'] > 0) {
			unlink("./public/uploads/{$old['foto']}");
			$data['foto'] = $this->_upload();
		}
		
		$message = 'Data siswa ' . ($this->siswa->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/siswa');
	}

	private function _upload()
	{
		$file_ext = explode('.', $_FILES['foto']['name']);
		$config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF";
		$config['max_size'] = 2048;
		$config['file_name'] = uniqid('siswa_', true) .'.' . end($file_ext);
		$config['overwrite'] = true;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('foto')) return $this->upload->data('file_name');
		var_dump($this->upload->display_errors());die;
		return null;
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nis', 'Siswa', 'required');
		$this->form_validation->set_rules('nama', 'Siswa', 'required');
		$this->form_validation->set_rules('kelas', 'Siswa', 'required');
		$this->form_validation->set_rules('alamat', 'Siswa', 'required');
	}
}


