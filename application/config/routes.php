<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['files/newFile'] = 'files/newFile';
$route['files/update'] = 'files/update';
$route['files/(:any)'] = 'files/view/$1';
$route['files'] = 'files/index';

$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


