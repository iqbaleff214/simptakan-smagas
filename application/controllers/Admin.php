<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        $this->load->model(Admin_model::class, 'admin');
    }

	public function index()
	{
        $data = [
            'title' => 'Admin',
            'sidebar' => ['admin'],
            'items' => $this->admin->getAll(),
        ];
		view('admin/index', $data);
	}

	public function create()
	{
        $this->_rules();
		$this->form_validation->set_rules('password_again', 'Admin', 'required|matches[password]');
		$this->form_validation->set_rules('password', 'Admin', 'required|matches[password_again]');

        if ($this->form_validation->run()) return $this->_store();

        $data = [
            'title' => 'Admin',
            'sidebar' => ['admin'],
        ];
		view('admin/create', $data);
	}

	public function edit($id)
	{
        $item = $this->admin->get($id);

        $this->_rules();

        if ($this->form_validation->run()) return $this->_update($id);

        $data = [
            'title' => 'Admin',
            'sidebar' => ['admin'],
            'item' => $item
        ];
		view('admin/edit', $data);
	}

    public function delete($id)
    {
		$message = 'Data admin ' . ($this->admin->delete($id) ? 'berhasil' : 'gagal') . ' dihapus!';
		setMessage($message);
		redirect('/admin');
    }

    public function reset($id)
    {
        $data = [ 'password' => password_hash('admin', PASSWORD_DEFAULT), ];
		$message = 'Password admin ' . ($this->admin->update($data, $id) ? 'berhasil' : 'gagal') . ' direset!';
		setMessage($message);
		redirect('/admin');
    }

	private function _store()
	{
		$data = $this->input->post();
        $data['id_user_role'] = 1;
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		unset($data['password_again']);
		$message = 'Data admin ' . ($this->admin->insert($data) ? 'berhasil' : 'gagal') . ' ditambahkan!';
		setMessage($message);
		redirect('/admin');
	}

	private function _update($id)
	{
		$data = $this->input->post();
		$message = 'Data admin ' . ($this->admin->update($data, $id) ? 'berhasil' : 'gagal') . ' diedit!';
		setMessage($message);
		redirect('/admin');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nama', 'Admin', 'required');
		$this->form_validation->set_rules('email', 'Admin', 'required|valid_email');
	}
}


