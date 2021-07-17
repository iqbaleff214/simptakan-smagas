<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Akun_model::class, 'akun');
    }

	public function index()
	{
        $data = [
            'title' => 'Akun Anggota',
            'sidebar' => ['akun'],
            'items' => $this->akun->getAllWithAnggota(),
        ];
		view('akun/index', $data);
	}

	public function create()
	{
        $this->_rules();
		$this->form_validation->set_rules('password_again', 'Akun', 'required|matches[password]');
		$this->form_validation->set_rules('password', 'Akun', 'required|matches[password_again]');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Akun',
            'sidebar' => ['akun'],
        ];
		view('akun/create', $data);
	}

	public function edit($id)
	{
        $item = $this->akun->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Akun',
            'sidebar' => ['akun'],
            'item' => $item
        ];
		view('akun/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data akun ' . ($this->akun->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/akun');
    }

    public function reset($id)
    {
        $data = [ 'password' => password_hash('simptakan', PASSWORD_DEFAULT), 'status' => 1 ];
		$message = 'Password ' . ($this->akun->update($data, $id) ? 'berhasil' : 'gagal') . ' direset!';
		setMessage($message);
		redirect('/akun');
    }

	private function _store()
	{
		$data = $this->input->post();
        $data['id_user_role'] = 1;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		unset($data['password_again']);
		$message = 'Data akun ' . ($this->akun->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/akun');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data akun ' . ($this->akun->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/akun');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nama', 'Akun', 'required');
		$this->form_validation->set_rules('email', 'Akun', 'required|valid_email');
	}
}


