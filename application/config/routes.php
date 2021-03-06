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
|	https://codeigniter.coapplication/config/routes.php:22m/user_guide/general/routing.html
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
$route['default_controller'] = 'login';
//routes utilisateurs
$route['list_user'] = 'authentification/utilisateur/list_utilisateur';
$route['login'] = '/authentification/utilisateur/login';
$route['chgstate_user/(:num)/(:num)'] = 'authentification/utilisateur/change_state_signup/$1/$2';
$route['check_login'] = 'authentification/utilisateur/check_login';
$route['inscription'] = 'authentification/utilisateur/inscription';
//fin route utilisateur
//
//routes groupe ou type utilisateur
$route['list_group'] = 'authentification/groupe/list_group';
$route['new_group'] = 'authentification/groupe/new_group';
$route['update_group'] = 'authentification/groupe/update_group';
$route['edit_group/(:num)'] = 'authentification/groupe/edit_group/$1';
$route['delete_group/(:num)'] = 'authentification/groupe/delete_group/$1';
//fin route grupe ou type utilisateur
//routes tableau de bord
$route['dashboard'] = 'dashboard/dashboard/view_dashboard';
// fin routes tableau de bord
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['profile'] = 'authentification/utilisateur/profil';
