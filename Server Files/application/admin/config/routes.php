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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'user/index';


/**
 * Admin Panel
 */
$route['login'] = 'user/index';
$route['logout'] = 'user/logout';
$route['login/validate_credentials'] = 'user/validate_credentials';

$route['articles'] = 'admin_articles/index';
$route['articles/edit/(:num)'] = 'admin_articles/edit/$1';
$route['articles/save/(:num)'] = 'admin_articles/save/$1';
$route['articles/view/(:num)'] = 'admin_articles/view/$1';
$route['articles/delete/(:num)'] = 'admin_articles/delete/$1';
$route['articles/publish/(:num)'] = 'admin_articles/publish/$1';
$route['articles/unpublish/(:num)'] = 'admin_articles/unpublish/$1';
$route['articles/feature/(:num)'] = 'admin_articles/feature/$1';
$route['articles/unfeature/(:num)'] = 'admin_articles/unfeature/$1';
$route['articles/(:any)'] = 'admin_articles/index/$1'; //$1 = page number

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
