<?php
namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\User;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function login(Request $request)
    {
      if ($request->getMethod() === 'post') {
        $params = $request->getBody();
        $user = User::findOne(['email' => $params['email']]);
        if (!$user) {
            return $this->render('login', [
              'status' => 400,
              'message' => 'User does not exist with this email address'
            ]);
        }
        if (!password_verify($params['password'], $user->password)) {
            return $this->render('login', [
              'status' => 400,
              'message' => 'Password is incorrect'
            ]);
        }
        Application::$app->login($user);
        return Application::$app->response->redirect('/dashboard');
      }
      return $this->render('login');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}
