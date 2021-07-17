<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(Akun_model::class, 'akun');
        $this->load->model(Petugas_model::class, 'petugas');
        $this->load->model(Siswa_model::class, 'siswa');
        $this->load->model(Pengunjung_model::class, 'pengunjung');
    }

	public function index()
	{
        if (isLogin()) return redirect('/dashboard');
		$this->form_validation->set_rules('username', 'Login', 'required');
		$this->form_validation->set_rules('password', 'Login', 'required');

        if ($this->form_validation->run()) return $this->_login();

        $data = [
            'title' => 'Login',
        ];
		authView('auth/login', $data);
	}

	public function logbook()
	{
        if (isLogin()) return redirect('/dashboard');
		$this->form_validation->set_rules('nis', 'Login', 'required');
		$this->form_validation->set_rules('nama', 'Login', 'required');
		$this->form_validation->set_rules('kelas', 'Login', 'required');

        if ($this->form_validation->run()) return $this->_logbook();

        $data = [
            'title' => 'Pengunjung',
        ];
		authView('auth/logbook', $data);
	}

	public function forgot()
	{
        if (isLogin()) return redirect('/dashboard');
		$this->form_validation->set_rules('username', 'Login', 'required');

        if ($this->form_validation->run()) return $this->_forgot();

        $data = [
            'title' => 'Pengunjung',
        ];
		authView('auth/forgot', $data);
	}

    public function logout()
    {
        if (isLogin()) logout();
        redirect('/login');
    }

    private function _forgot() {
        $username = $this->input->post('username');
        $data = $this->akun->getByUsername($username);
        if ($data) {
            $this->akun->update(['status' => 2], $data['id_akun']);
            setMessage("Lupa password telah disampaikan! Akan diproses oleh Admin");
		    redirect('/lupa-password');
        } else {
            setMessage("Username tidak terdaftar!");
		    redirect('/lupa-password');
        }
    }

    private function _login()
    {
        $user = $this->akun->getByUsername($this->input->post('username'));
        if ($user) {
            if (password_verify($this->input->post('password'), $user['password'])) {
                if ($user['peran'] == 'anggota') {
                    $siswa = $this->siswa->getByAkun($user['id_akun']);
                    $this->pengunjung->insert([
                        'nis' => $siswa['nis'],
                        'nama' => $siswa['nama'],
                        'kelas' => $siswa['kelas'],
                        'keperluan' => 'Masuk sebagai Anggota'
                    ]);
                    setSession('nis', $siswa['nis']);
                    setSession('nama', $siswa['nama']);
                    setSession('jabatan', 'Anggota');
                    setSession('foto', $siswa['foto']);
                    setSession('username', $user['username']);
                    redirect('/katalog');
                } else {
                    $petugas = $this->petugas->getByAkun($user['id_akun']);
                    setSession('id', $petugas['id']);
                    setSession('nama', $petugas['nama']);
                    setSession('jabatan', $petugas['jabatan']);
                    setSession('foto', $petugas['foto']);
                    setSession('username', $user['username']);
                    setMessage("Berhasil login!");
                    redirect('/dashboard');
                }
            } else {
                setMessage("Password tidak sesuai!");
                redirect('/login');
            }
        } else {
            setMessage("username tidak terdaftar!");
		    redirect('/login');
        }
    }

    private function _logbook() {
        $data = $this->input->post();
        $this->pengunjung->insert([
            'nis' => $data['nis'],
            'nama' => $data['nama'],
            'kelas' => $data['kelas'],
            'keperluan' => $data['keperluan'],
        ]);
        setSession('nis', $data['nis']);
        setSession('nama', $data['nama']);
        setSession('kelas', $data['kelas']);
        setSession('jabatan', 'Pengunjung');
        redirect('/katalog');
    }
}
