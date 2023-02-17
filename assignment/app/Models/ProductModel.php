<?php 
namespace App\Models;
use PDO;
class ProductModel extends BaseModel {
  protected $tableName = 'products';
  public static function getOne($id)
  {
      $model = new static;
      $model->sqlBuilder = "SELECT p.* ,c.name,b.name as b_name FROM products p JOIN categories c ON p.category_id = c.id join brands b on b.id = p.brand_id where p.id = $id";
      $stmt = $model->conn->prepare($model->sqlBuilder);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
      //Nếu có dữ liệu
      if ($result) {
          return $result[0];
      }
      return $model;
  }
  
}