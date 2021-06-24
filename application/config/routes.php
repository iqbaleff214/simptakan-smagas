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

$route['rak/baru'] = 'rak/create';
$route['rak/(:num)/edit'] = 'rak/edit/$1';
$route['rak/(:num)/hapus'] = 'rak/delete/$1';

$route['kategori/baru'] = 'kategori/create';
$route['kategori/(:num)/edit'] = 'kategori/edit/$1';
$route['kategori/(:num)/hapus'] = 'kategori/delete/$1';

$route['penerbit/baru'] = 'penerbit/create';
$route['penerbit/(:num)/edit'] = 'penerbit/edit/$1';
$route['penerbit/(:num)/hapus'] = 'penerbit/delete/$1';

$route['buku/baru'] = 'buku/create';
$route['buku/(:num)/edit'] = 'buku/edit/$1';
$route['buku/(:num)/hapus'] = 'buku/delete/$1';

$route['admin/baru'] = 'admin/create';
$route['admin/(:num)/edit'] = 'admin/edit/$1';
$route['admin/(:num)/hapus'] = 'admin/delete/$1';
$route['admin/(:num)/reset'] = 'admin/reset/$1';

$route['siswa/baru'] = 'siswa/create';
$route['siswa/(:num)'] = 'siswa/show/$1';
$route['siswa/(:num)/edit'] = 'siswa/edit/$1';
$route['siswa/(:num)/hapus'] = 'siswa/delete/$1';
