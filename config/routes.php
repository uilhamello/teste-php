<?php
/**
 * [$ACCESS_WITHOUT_LOGGIN description]
 * @var [type]
 */
$ACCESS_WITHOUT_LOGGIN = [
    'checklogin' => [
        'controller' => 'LoginController',
        'method' => 'login',
        'view' => 'CheckLogin',
    ],
    'init_config' => [
        'controller' => 'IniConfigController',
        'method' => 'index',
        'view' => 'iniconfig',
    ],
	'register_view' => [
		'controller' => 'LoginController',
		'method' => 'register_view',
		'view' => 'register.html',
	],
	'register' => [
		'controller' => 'LoginController',
		'method' => 'register',
		'view' => '',
	],
];

/**
 * [$ACCESS_WITHOUT_LOGGIN description]
 * @var [type]
 */
$ROUTE_MODULES = [
	'dashboard' => [
		'controller' => 'DashboardController',
		'method' => 'index',
		'view' => '',
	],
	'user' => [
		'controller' => 'User',
		'method' => 'index',
		'view' => 'index.html',
	],
	'logout' => [
		'controller' => 'LoginController',
		'method' => 'logout',
		'view' => 'login.html'
	],
	'helloworld' => [
		'controller' => 'HelloWorldController',
		'method' => 'index',
		'view' => 'helloworld.html'
	],
	'logout' => [
		'controller' => 'LoginController',
		'method' => 'logout',
		'view' => 'login.html'
	],
	'logout' => [
		'controller' => 'LoginController',
		'method' => 'logout',
		'view' => 'login.html'
	],
];

/**
 * [$LOGIN description]
 * @var [type]
 */
$LOGIN =[
    'controller' => 'LoginController',
    'method' => 'index',
    'view' => 'login.html',
];

$INI_CONFIG =[
    'controller' => 'IniConfigController',
    'method' => 'index',
    'view' => 'index.html',
];

/**
 * Keeps the database configuration at a session avoiding to open this file more than once
 */
$_SESSION['LIB_XX_ROUTE_MODULES'] =  $ROUTE_MODULES;
$_SESSION['LIB_XX_ACCESS_LOGGIN'] =  $LOGIN;
$_SESSION['LIB_XX_ACCESS_INICONFIG'] =  $LOGIN;
$_SESSION['LIB_XX_ACCESS_WITHOUT_LOGGIN'] = $ACCESS_WITHOUT_LOGGIN;