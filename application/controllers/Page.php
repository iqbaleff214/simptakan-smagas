<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!isLogin()) return redirect('/login');
    }

	public function index()
	{
        $data = [
            'title' => 'Dashboard',
            'sidebar' => ['dashboard'],
        ];
		view('dashboard', $data);
	}
}
