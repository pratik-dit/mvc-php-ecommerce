<?php
namespace app\controllers;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\Controller;
use thecodeholic\phpmvc\Request;
use thecodeholic\phpmvc\Response;
use app\models\Category;
use app\models\Product;
use app\models\ProductCategory;

class ProductController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $products = Product::getAll();

      return $this->render('product/product_list', [
          'products' => $products
      ]);
    }

    public function delete(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getRouteParams();
      
      Product::delete($params['id']);

      $response->redirect('/product');
    }

    public function create(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      
      $categories = Category::getAll();
      
      return $this->render('product/product_create', [
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
      
      $duplicate = Product::findOne(['slug' => $slug]);
      if ($duplicate) {
          $categories = Category::getAll();
          return $this->render('product/product_create', [
            'categories' => $categories,
            'status' => 400,
            'message' => 'Product name exist. Please choose another'
          ]);
      }
      
      Product::create($params);
      $response->redirect('/product');
    }

    public function edit(Request $request, Response $response)
    {
      if (Application::isGuest()){
        $response->redirect('/');
      }
      $params = $request->getRouteParams();
      
      $product = Product::findOne(['slug' => $params['slug']]);
      $categories = Category::getAll();
      if (!$product) {
          return $this->render('product/product_create', [
            'categories' => $categories,
            'status' => 400,
            'message' => 'Product does not exist.'
          ]);
      }

      return $this->render('product/product_edit', [
        'product' => $product,
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
        $duplicate = Product::findOne(['slug' => $slug]);
        if ($duplicate) {
            $products = Product::getAll();
            return $this->render('product/product_list', [
              'products' => $products,
              'status' => 400,
              'message' => 'Product name exist. Please choose another'
            ]);
        }
      }

      Product::update($params);
      $response->redirect('/product');
    }
}
