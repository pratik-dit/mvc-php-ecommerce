<?php
namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request, Response $response)
    {
      if (!Application::isGuest()){
        $response->redirect('/dashboard');
      }
      return $this->render('home', [
          'name' => 'E-commerce Admin'
      ]);
    }

    public function dashboard(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      return $this->render('dashboard', [
          'name' => 'Dashboard'
      ]);
    }
}
