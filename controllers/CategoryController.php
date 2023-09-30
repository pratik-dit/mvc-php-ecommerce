<?php
namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $categories = Category::getAll();
      
      return $this->render('category/category_list', [
          'categories' => $categories
      ]);
    }

    public function delete(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getRouteParams();
      
      Category::delete($params['id']);

      $response->redirect('/category');
    }

    public function create(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      
      $categories = Category::getAll();
      
      return $this->render('category/category_create', [
          'categories' => $categories
      ]);
    }

    public function store(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getBody();
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $params['title']));
      $params['slug'] = $slug;
      $duplicate = Category::findOne(['slug' => $slug]);
      if ($duplicate) {
          $categories = Category::getAll();
          return $this->render('category/category_create', [
            'categories' => $categories,
            'status' => 400,
            'message' => 'Category name exist. Please choose another'
          ]);
      }
      
      Category::create($params);
      $response->redirect('/category');
    }

    public function edit(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getRouteParams();
      
      $category = Category::findOne(['slug' => $params['slug']]);
      $categories = Category::getAll();
      if (!$category) {
          return $this->render('category/category_create', [
            'categories' => $categories,
            'status' => 400,
            'message' => 'Category does not exist.'
          ]);
      }

      return $this->render('category/category_edit', [
        'category' => $category,
        'categories' => $categories,
      ]);
    }

    public function update(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getBody();
      
      $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $params['title']));
      $params['slug'] = $slug;
      if($params['old_slug'] != $slug){
        $duplicate = Category::findOne(['slug' => $slug]);
        if ($duplicate) {
            $categories = Category::getAll();
            return $this->render('category/category_list', [
              'categories' => $categories,
              'status' => 400,
              'message' => 'Category name exist. Please choose another'
            ]);
        }
      }

      Category::update($params);
      $response->redirect('/category');
    }
}
