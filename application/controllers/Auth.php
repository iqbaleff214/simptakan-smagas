<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(Admin_model::class, 'admin');
    }

	public function index()
	{
        if (isLogin()) return redirect('/');
		$this->form_validation->set_rules('email', 'Login', 'required');
		$this->form_validation->set_rules('password', 'Login', 'required');

        if ($this->form_validation->run()) return $this->_login();

        $data = [
            'title' => 'Login',
        ];
		authView('login', $data);
	}

    public function logout()
    {
        if (isLogin()) logout();
        redirect('/login');
    }

    private function _login()
    {
        $user = $this->admin->getByEmail($this->input->post('email'));
        if ($user) {
            if (password_verify($this->input->post('password'), $user['password'])) {
                setSession('nama', $user['nama']);
                setSession('email', $user['email']);
                setMessage("Berhasil login!");
                redirect('/');
            } else {
                setMessage("Password tidak sesuai!");
                redirect('/login');
            }
        } else {
            setMessage("Email tidak terdaftar!");
		    redirect('/login');
        }
        
    }
}
