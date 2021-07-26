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
$route['default_controller'] = 'home';

// Kategori
$route['c/(:any)'] = 'home';

// Produk
$route['add/cart/(:any)'] = 'home/add_cart/$1';
$route['clear/cart'] = 'home/clear_cart';
$route['order'] = 'home/order';

// Transaksi
$route['transaksi'] = 'home/transaksi';
$route['transaksi/detail/(:any)'] = 'home/detail_transaksi/$1';
$route['transaksi/upload_bukti'] = 'home/upload_bukti';

// User
$route['user'] = 'home/user';
$route['user/edit'] = 'home/user_edit';
$route['user/changepassword'] = 'home/changepassword';

// Login
$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// Admin
$route['admin'] = 'admin';
// Admin-Promo
$route['admin/promo/'] = 'admin/promo';
$route['admin/promo/add'] = 'admin/addPromo';
$route['admin/promo/del/(:any)'] = 'admin/delPromo/$1';
$route['admin/promo/edit/(:any)'] = 'admin/editPromo/$1';
// Admin-Produk
$route['admin/produk/'] = 'admin/produk';
$route['admin/produk/add'] = 'admin/addProduk';
$route['admin/produk/del/(:any)'] = 'admin/delProduk/$1';
$route['admin/produk/edit/(:any)'] = 'admin/editProduk/$1';

// Admin-Transaksi
$route['admin/transaksi'] = 'admin/transaksi';
$route['admin/transaksi/del/(:any)'] = 'admin/deleteTransaksi/$1';
$route['admin/transaksi/proses/(:any)'] = 'admin/proses_transaksi/$1';

// Admin-User
$route['admin/user'] = 'admin/user';
$route['admin/user/add'] = 'admin/addUser';
$route['admin/user/del/(:any)'] = 'admin/delUser/$1';
$route['admin/user/edit/(:any)'] = 'admin/editUser/$1';
$route['admin/user/changepassword/(:any)'] = 'admin/changepassword/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
