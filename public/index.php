<?php
session_start();

// var_dump($_GET);
// exit;

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;

$router = new Router();

// PDO를 라우터에 주입
$router->setPDO($pdo);

// home
$router->get('', 'HomeController@index');

// user
// $router->get('login', 'UserController@loginForm');
$router->post('login', 'UserController@login');
$router->get('logout', 'UserController@logout');

// product
$router->get('product/list', 'ProductController@list');
$router->get('product/detail', 'ProductController@detail');

// 기타 라우팅 추가...

$router->dispatch();

/*

$url = $_GET['url'] ?? '';  // ex: "home/index/3"
$router = new Router();
$router->dispatch($url);

*/

/* 컴포저 반영 전 코드
require_once __DIR__.'/../config/config.php';
require_once __DIR__.'/../core/Router.php';

use Core\Router;

$router = new Router();

// 메인 페이지
$router->get('', 'HomeController@index');

// 사용자
$router->get('login', 'UserController@loginForm');
$router->post('login', 'UserController@login');
$router->get('register', 'UserController@registerForm');
$router->post('register', 'UserController@register');
$router->get('mypage', 'UserController@mypage');



// 장바구니
$router->get('cart/view', 'CartController@view');
$router->get('cart/add', 'CartController@add');

// 관리자
$router->get('admin/product', 'AdminController@list');
$router->get('admin/product/create', 'AdminController@createForm');
$router->post('admin/product/create', 'AdminController@create');
$router->get('admin/product/edit', 'AdminController@editForm');
$router->post('admin/product/edit', 'AdminController@edit');
$router->get('admin/product/delete', 'AdminController@delete');

$router->dispatch();

*/