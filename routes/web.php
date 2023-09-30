<?php
use app\controllers\LoginController;
use app\controllers\HomeController;
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

$app->run();