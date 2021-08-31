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

        if ($this->form_validation->run()) {
            return filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL) ? $this->_sendEmail() : $this->_forgot();
        }

        $data = [
            'title' => 'Pengunjung',
        ];
		authView('auth/forgot', $data);
	}

    public function reset()
    {
        if (isLogin()) return redirect('/dashboard');
		$this->form_validation->set_rules('password', 'Login', 'required');
		$this->form_validation->set_rules('password_confirm', 'Login', 'required|matches[password]');

        if ($this->form_validation->run()) $this->_reset();

        $data = $this->input->get();
        $data = [
            'title' => 'Password Reset',
            'data' => $this->akun->checkToken($data['token'], $data['email'])
        ];
        if (!$data['data']) {
            setMessage('Token atau Email tidak sesuai');
            return redirect('/login');
        }
		authView('auth/reset', $data);
    }

    public function logout()
    {
        if (isLogin()) logout();
        redirect('/');
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
    
    private function _reset() {
        $dataPost = $this->input->post();
        $dataGet = $this->input->get();
        if ($this->akun->deleteToken($dataGet['token'])) {
            if ($this->akun->update(['password' => password_hash($dataPost['password'], PASSWORD_DEFAULT)], $dataPost['id_akun']))
             setMessage('Berhasil mereset password! Silakan login');
            else
             setMessage('Gagal mereset password!');
        } else {
            setMessage('Gagal menghapus token!');
        }
        redirect('/login');
    }

    private function _sendEmail() {
        $email = $this->input->post('username');
        $data = $this->siswa->getByemail($email);
        $idAkun = $data['id_akun'];
        if ($data) {
            $token = bin2hex(random_bytes(64));
            if ($this->akun->createToken($idAkun, $token)) {
                $config = [
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => 'email@gmail.com',  // Email gmail
                    'smtp_pass'   => 'passwordgmail',  // Password gmail
                    'smtp_crypto' => 'ssl',
                    'smtp_port'   => 465,
                    'crlf'    => "\r\n",
                    'newline' => "\r\n"
                ];
    
                $this->load->library('email', $config);
                $this->email->from('no-reply@simptakan-smagasbjm.com', 'SIMPTAKAN');
                $this->email->to($email);
                $this->email->subject('Link Reset Password - SIMPTAKAN');
                $this->email->message("Email ini berisi link untuk mereset password akun siswa di SIMPTAKAN.<br><br> Klik <strong><a href='" . base_url('reset') . "?token=" . $token . "&email=" . $email . "' target='_blank' rel='noopener'>disini</a></strong> untuk mereset password.");
                if ($this->email->send()) {
                    setMessage("Silakan periksa email Anda!");
                } else {
                    setMessage("Gagal mengirim via email!");
                }
            }
		    redirect('/lupa-password');
        } else {
            setMessage("email tidak terdaftar!");
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
