<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth';
$route['logout'] = 'auth/logout';
$route['lupa-password'] = 'auth/forgot';
$route['reset'] = 'auth/reset';
$route['logbook'] = 'auth/logbook';

$route['katalog'] = 'katalog';
$route['katalog/(:num)'] = 'katalog/show/$1';
$route['katalog-ebook'] = 'katalog/ebook';
$route['katalog-ebook/(:num)'] = 'katalog/show_ebook/$1';
$route['pinjam-buku'] = 'katalog/pinjam';
$route['riwayat-pinjam-buku'] = 'katalog/history';

$route['bukti-pinjam-buku/(:num)'] = 'cetak/peminjaman/$1';
$route['cetak-kartu-anggota'] = 'cetak/anggota';

$route['dashboard'] = 'page/dashboard';
$route['peminjaman'] = 'peminjaman';
$route['riwayat-peminjaman'] = 'peminjaman/history';
$route['pengadaan'] = 'pengadaan';
$route['riwayat-pengadaan'] = 'pengadaan/history';
$route['pengeluaran'] = 'pengeluaran';
$route['riwayat-pengeluaran'] = 'pengeluaran/history';
$route['perpanjang'] = 'peminjaman/perpanjang';
$route['pengembalian/(:num)'] = 'peminjaman/pengembalian/$1';
$route['pengeluaran'] = 'pengeluaran';

$route['laporan-pengunjung'] = 'page/pengunjung';
$route['laporan-pengunjung-hari-ini'] = 'page/pengunjung_today';
$route['laporan-peminjaman'] = 'page/peminjaman';
$route['laporan-peminjaman-hari-ini'] = 'page/peminjaman_today';
$route['laporan-pengadaan'] = 'page/pengadaan';
$route['laporan-pengeluaran'] = 'page/pengeluaran';

$route['rak/baru'] = 'rak/create';
$route['rak/(:num)/edit'] = 'rak/edit/$1';
$route['rak/(:num)/hapus'] = 'rak/delete/$1';

$route['kategori/baru'] = 'kategori/create';
$route['kategori/(:num)/edit'] = 'kategori/edit/$1';
$route['kategori/(:num)/hapus'] = 'kategori/delete/$1';

$route['klasifikasi/baru'] = 'klasifikasi/create';
$route['klasifikasi/(:num)/edit'] = 'klasifikasi/edit/$1';
$route['klasifikasi/(:num)/hapus'] = 'klasifikasi/delete/$1';

$route['penerbit/baru'] = 'penerbit/create';
$route['penerbit/(:num)/edit'] = 'penerbit/edit/$1';
$route['penerbit/(:num)/hapus'] = 'penerbit/delete/$1';

$route['buku/baru'] = 'buku/create';
$route['buku/(:num)'] = 'buku/show/$1';
$route['buku/(:num)/edit'] = 'buku/edit/$1';
$route['buku/(:num)/hapus'] = 'buku/delete/$1';

$route['ebook/baru'] = 'ebook/create';
$route['ebook/(:num)'] = 'ebook/show/$1';
$route['ebook/(:num)/edit'] = 'ebook/edit/$1';
$route['ebook/(:num)/hapus'] = 'ebook/delete/$1';

$route['akun/baru'] = 'akun/create';
$route['akun/(:num)/edit'] = 'akun/edit/$1';
$route['akun/(:num)/hapus'] = 'akun/delete/$1';
$route['akun/(:num)/reset'] = 'akun/reset/$1';

$route['siswa/baru'] = 'siswa/create';
$route['siswa/(:any)'] = 'siswa/show/$1';
$route['siswa/(:any)/edit'] = 'siswa/edit/$1';
$route['siswa/(:any)/hapus'] = 'siswa/delete/$1';
$route['siswa/(:any)/cetak'] = 'cetak/anggota/$1';

$route['petugas/baru'] = 'petugas/create';
$route['petugas/(:num)'] = 'petugas/show/$1';
$route['petugas/(:num)/edit'] = 'petugas/edit/$1';
$route['petugas/(:num)/hapus'] = 'petugas/delete/$1';
