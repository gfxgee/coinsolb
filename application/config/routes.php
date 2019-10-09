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
$route['default_controller'] 		= 'coin_solve';
$route['404_override'] 				= '';
$route['translate_uri_dashes'] 		= FALSE;

$route['play'] 						= 'coin_solve/play';
$route['dashboard'] 				= 'coin_solve/dashboard';
$route['account'] 					= 'coin_solve/account';
$route['withdraw'] 					= 'coin_solve/withdraw';
$route['stats'] 					= 'coin_solve/stats';
$route['points'] 					= 'coin_solve/points_history';
$route['withdrawals'] 				= 'coin_solve/withdrawals';
$route['referrals'] 				= 'coin_solve/referrals';
$route['about-us'] 					= 'coin_solve/about';
$route['contact'] 					= 'coin_solve/contact';
$route['faq'] 						= 'coin_solve/faq';
$route['privacy'] 					= 'coin_solve/privacy';
$route['cookies'] 					= 'coin_solve/cookies';
$route['terms-conditions'] 			= 'coin_solve/terms_conditions';
$route['choose'] 					= 'coin_solve/choose';
$route['discussions'] 				= 'coin_solve/discussions';
$route['discussions/(:any)'] 		= 'coin_solve/discussions/$1';
$route['login']						= 'auth/login';
$route['register']					= 'auth/create_user';
$route['register/(:any)']			= 'auth/create_user/$1';
$route['logout']					= 'auth/logout';
$route['change_password']			= 'auth/change_password';
$route['reset_password']			= 'auth/reset_password';
$route['create_group']				= 'auth/create_group';
$route['edit_user']					= 'auth/edit_user';
$route['edit_account']				= 'auth/edit_account';
$route['admin']						= 'auth/';
