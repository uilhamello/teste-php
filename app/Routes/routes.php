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
	'produto' => [
		'controller' => 'ProdutoController',
		'method' => 'index',
		'view' => 'produto/index.html'
	],
    'produto_update' => [
        'controller' => 'ProdutoController',
        'method' => 'update',
        'view' => 'produto/update.html'
    ],
    'produto_alter' => [
        'controller' => 'ProdutoController',
        'method' => 'alter',
        'view' => ''
    ],
    'produto_create' => [
        'controller' => 'ProdutoController',
        'method' => 'create',
        'view' => 'produto/create.html'
    ],
    'produto_store' => [
        'controller' => 'ProdutoController',
        'method' => 'store',
        'view' => ''
    ],
    'produto_delete' => [
        'controller' => 'ProdutoController',
        'method' => 'delete',
        'view' => ''
    ],
    'produto_reduzir' => [
        'controller' => 'ProdutoController',
        'method' => 'reduzir',
        'view' => ''
    ],
    'produto_aumentar' => [
        'controller' => 'ProdutoController',
        'method' => 'aumentar',
        'view' => ''
    ],
    'produto_falta' => [
        'controller' => 'ProdutoController',
        'method' => 'movimento',
        'view' => ''
    ],
    'produto_movimento' => [
        'controller' => 'ProdutoController',
        'method' => 'falta',
        'view' => ''
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