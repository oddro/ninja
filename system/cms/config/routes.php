<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$admin_url										= 'admin';

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['login'] = 'users/login';

$route[$admin_url.'/login']						= 'users/login';
$route[$admin_url.'/login/action']				= 'users/login/action';
$route[$admin_url.'/login/(:any)']				= 'users/login/index/$1';
$route[$admin_url.'/logout']					= 'users/auth/logout';

$route[$admin_url.'/general/create/(:any)']			= 'general/admin/create/$1';
$route[$admin_url.'/general/update/(:any)/(:num)']	= 'general/admin/update/$1/$2';
$route[$admin_url.'/general/(:any)']				= 'general/admin/index/$1';

$route[$admin_url.'/([a-zA-Z0-9_-]+)']			= '$1/admin/index';
$route[$admin_url.'/([a-zA-Z0-9_-]+)/(:any)']	= '$1/admin/$2';


$route[$admin_url]								= 'admin';
$route[$admin_url.'/dashboard']					= 'admin';

/* End of file routes.php */
/* Location: ./application/config/routes.php */