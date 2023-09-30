<?php
use app\controllers\LoginController;
use app\controllers\HomeController;
use app\controllers\CategoryController;
use app\controllers\ProductController;
use thecodeholic\phpmvc\Application;

$config = [
  'userClass' => \app\models\User::class,
  'db' => [
      'dsn' => $_ENV['DB_DSN'],
      'user' => $_ENV['DB_USER'],
      'password' => $_ENV['DB_PASSWORD'],
  ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function(){});

/* *********** Home Routes ************ */
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/dashboard', [HomeController::class, 'dashboard']);

/* *********** Login Routes ************ */
$app->router->get('/login', [LoginController::class, 'login']);
$app->router->post('/login', [LoginController::class, 'login']);
$app->router->get('/logout', [LoginController::class, 'logout']);

/* *********** Category Routes ************ */
$app->router->get('/category', [CategoryController::class, 'index']);
$app->router->post('/category', [CategoryController::class, 'store']);
$app->router->get('/category/create', [CategoryController::class, 'create']);
$app->router->get('/category/{slug}', [CategoryController::class, 'edit']);
$app->router->post('/category/{id}', [CategoryController::class, 'update']);
$app->router->get('/category/delete/{id}', [CategoryController::class, 'delete']);

/* *********** Product Routes ************ */
$app->router->get('/product', [ProductController::class, 'index']);
$app->router->post('/product', [ProductController::class, 'store']);
$app->router->get('/product/create', [ProductController::class, 'create']);
$app->router->get('/product/{slug}', [ProductController::class, 'edit']);
$app->router->post('/product/{id}', [ProductController::class, 'update']);
$app->router->get('/product/delete/{id}', [ProductController::class, 'delete']);

$app->run();