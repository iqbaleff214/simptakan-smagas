<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
        
        $this->load->model(PeminjamanDetail_model::class, 'detail');
        $this->load->model(Siswa_model::class, 'siswa');
    }

    public function peminjaman($id)
    {
        $data = [
            'item' => $this->detail->getDetail($id),
        ];
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "bukti-peminjaman-". $_SESSION['nis'] .".pdf";
        $this->pdf->load_view('pages/cetak/bukti', $data);
    }

    public function anggota($nis=null)
    {
        $data = [
            'item' => $this->siswa->get($nis ?: $_SESSION['nis']),
            'foto' => $_SESSION['foto'] ? upload($_SESSION['foto']) : asset('img/avatar.png')
        ];
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "kartu-anggota-". ($nis ?: $_SESSION['nis']) .".pdf";
        $this->pdf->load_view('pages/cetak/kartu', $data);
    }
}
