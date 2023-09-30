<?php
namespace app\models;

use thecodeholic\phpmvc\Model;
use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\db\DbModel;

class Product extends DbModel
{
    public int $id = 0;
    public string $title = '';
    public string $slug = '';
    public int $active = 0;

    public static function tableName(): string
    {
        return 'products';
    }

    public function attributes(): array
    {
        return ['title', 'slug', 'active', 'category_id'];
    }

    public static function getAll()
    {
      $tableName = static::tableName();
      $db = Application::$app->db;
      //$statement = $db->prepare("SELECT * FROM $tableName where deleted_at IS NULL");
      $statement = $db->prepare("SELECT products.*, categories.title as category_name FROM $tableName LEFT JOIN categories ON categories.id = products.category_id where products.deleted_at IS NULL");
      $statement->execute();
      return $statement->fetchAll();
    }

    public static function delete($id)
    {
      $currentDate = date("Y-m-d h:m:s");
      $tableName = static::tableName();
      $db = Application::$app->db;
      $statement = $db->prepare("UPDATE $tableName SET deleted_at = ? WHERE id = ?");
      $statement->bindValue(1, $currentDate);
      $statement->bindValue(2, $id);
      $statement->execute();
    }

    public static function create($params)
    {
      $currentDate = date("Y-m-d h:m:s");
      $tableName = static::tableName();
      $db = Application::$app->db;
      $statement = $db->prepare("INSERT INTO $tableName (title, slug, category_id, active) VALUES (?, ?, ?, ?)");
      $statement->bindValue(1, $params['title']);
      $statement->bindValue(2, $params['slug']);
      $statement->bindValue(3, $params['category_id']);
      $statement->bindValue(4, $params['active']);
      $statement->execute();
    }

    public static function update($params)
    {
      $currentDate = date("Y-m-d h:m:s");
      $tableName = static::tableName();
      $db = Application::$app->db;
      $statement = $db->prepare("UPDATE $tableName SET title = ?, slug = ?, category_id = ?, active = ? WHERE id = ?");
      $statement->bindValue(1, $params['title']);
      $statement->bindValue(2, $params['slug']);
      $statement->bindValue(3, $params['category_id']);
      $statement->bindValue(4, $params['active']);
      $statement->bindValue(5, $params['id']);
      $statement->execute();
    }
}