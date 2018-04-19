<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['login'] = 'user/login';
$route['register'] = 'user/register';
$route['logout'] = 'user/logout';

$route['admin'] = 'admin/index';

$route['default_controller'] = 'artikel';
$route['tambah'] = 'artikel/tambah';
$route['hapus/(:any)'] = 'artikel/hapus/$1';
$route['edit/(:any)'] = 'artikel/edit/$1';
$route['home'] = 'artikel';
$route['(:any)'] = 'artikel/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
