<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// DEFAULT (Pertama dibuka) 
$route['default_controller'] = 'pages/view'; // Controller -> Pages, Function -> View

$route['profile'] = 'profile/index';
$route['home'] = 'home/index';
$route['dashboard'] = 'dashboard/index';
$route['autocomplete'] = 'autocomplete/index';
$route['admin'] = 'admin/index';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
